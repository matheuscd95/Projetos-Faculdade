<?php

  session_start();
  require_once("Facebook/lib/autoload.php");

  $fb = new \Facebook\Facebook([
    'app_id' => '1196010037189514',
    'app_secret' => '93db1a20c6f8369609068fbabc79e572',
    'default_graph_version' => 'v3.3',
  ]);

  $helper = $fb->getRedirectLoginHelper();
  $permissions = ['email']; 

  try {
      if(isset($_SESSION['face_acess_token'])){
        $accessToken = $_SESSION['face_acess_token'];
      }
      else{
        $accessToken = $helper->getAccessToken();
      }
      
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
  }


  if (! isset($accessToken)) {
    $url_login = "http://localhost/Desafio/facebook.php";
    $loginUrl = $helper->getLoginUrl($url_login, $permissions);
  }
  else{
    $url_login = "http://localhost/Desafio/facebook.php";
    $loginUrl = $helper->getLoginUrl($url_login, $permissions);
    
    //AUTENTICAÇÃO DO USUÁRIO
    if(isset($_SESSION['face_acess_token'])){
      $fb->setDefaultAccessToken($_SESSION['face_acess_token']);
    }
    else{
      $_SESSION['face_acess_token'] = (string) $accessToken;
      $oAuth2Client = $fb->getOAuth2Client();
      $_SESSION['face_acess_token'] = $oAuth2Client->getLongLivedAccessToken($accessToken);

      $fb->setDefaultAccessToken($_SESSION['face_acess_token']);
    }

    try {
      // Returns a `Facebook\FacebookResponse` object
        $response = $fb->get('/me?fields=name, picture, email');
        $user = $response->getGraphUser();

        include('conexao.php');
        $conexao = abrirConexao();

        $sqlFace = "INSERT INTO IF NOT EXISTS usuarios(nome, email) VALUES(".$user['nome'].",".$user['email'].")";
        $queryFace = mysqli_query($conexao, $sqlFace);

        $sql = "SELECT * FROM usuarios WHERE email='".$user['email']."' LIMIT 1";
        $query = mysqli_query($conexao, $sql);
        if($query){
          $linha = mysqli_fetch_assoc($query);
          
          $_SESSION['id'] = $linha['id'];
          $_SESSION['nome'] = $linha['nome'];
          $_SESSION['email'] = $linha['email'];

          header('Location: home.php');
        }

    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
  }
?>
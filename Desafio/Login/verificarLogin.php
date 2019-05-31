<?php

    include_once('../conexao.php');

    session_start();

    $login = $_POST['email'];
    $senha = $_POST['senha'];

    $conexao = abrirConexao();
    $sql = "SELECT * FROM usuarios WHERE email='$login'";
    $query = mysqli_query($conexao, $sql);

    $total = mysqli_num_rows($query);
    
    if($total){
        $pegarDados = mysqli_fetch_array($query);
        $senhaUsuario = $pegarDados['senha'];

        if(!strcmp($senha, $senhaUsuario)){
            $numLinha =  mysqli_num_rows($query);

            if($numLinha){
                $_SESSION['id'] = $pegarDados['id'];
                $_SESSION['nome'] = $pegarDados['nome'];
                $_SESSION['email'] = $pegarDados['email'];
                $_SESSION['senha'] = $pegarDados['senha'];
                header('Location: ../home.php');
            }
            else{
                unset($_SESSION['nome']);
                unset($_SESSION['email']);
                unset($_SESSION['senha']);
                header('Location: ../index.php');
            }
        }
        else{
            echo "<script type='text/javascript'>
                alert('Senha inválida!');
                window.location.replace('../index.php');
            </script>";
        }
    }    
    else{
        echo "<script type='text/javascript'>
        alert('Email inexistente!');
            window.location.replace('../index.php');
       </script>";
    }

?>
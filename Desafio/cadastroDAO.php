<?php

include('conexao.php');

function inserirCliente($nome, $telefone, $cep, $endereco, $numero, $cidade, $uf, $pais){
    $conexao = abrirConexao();

    $nome = trim(ucwords(strtolower(mysqli_real_escape_string($conexao, $nome))));
    $telefone = trim(mysqli_real_escape_string($conexao, $telefone));
    $cep = trim(mysqli_real_escape_string($conexao, $cep));
    $endereco = trim(mysqli_real_escape_string($conexao, $endereco));
    $numero = trim(mysqli_real_escape_string($conexao, $numero));
    $cidade = trim(ucwords(strtolower(mysqli_real_escape_string($conexao, $cidade))));
    $uf = trim(strtoupper(mysqli_real_escape_string($conexao, $uf)));
    $pais = trim(ucwords(strtolower(mysqli_real_escape_string($conexao, $pais))));

    $sqlVerificar = "SELECT nome FROM clientes WHERE nome='$nome'";
    $pegarNomes = mysqli_fetch_array(mysqli_query($conexao, $sqlVerificar));
    $pegarNome = $pegarNomes['nome'];


    if($nome == $pegarNome){
        echo "<script type='text/javascript'>
        alert('Aviso: Nome já cadastrado!');
            window.location.replace('cliente.php');
       </script>";
    }
    else{    
        $sql = "INSERT INTO clientes(nome, telefone, cep, endereco, numero, cidade, uf, pais) 
        VALUES ('$nome', '$telefone', '$cep', '$endereco', '$numero', '$cidade', '$uf', '$pais')";

        if(mysqli_query($conexao, $sql)){
            mysqli_close($conexao);
            return true;
        }else{
            mysqli_close($conexao);
            return false;
        }    
    }                  
}

function inserirUsuario($nome, $email, $senha){
    $conexao = abrirConexao();

    $nome = trim(ucwords(strtolower(mysqli_real_escape_string($conexao, $nome))));
    $email = trim(strtolower(mysqli_real_escape_string($conexao, $email)));
    $senha = mysqli_real_escape_string($conexao, $senha);

    $sqlVerificar = "SELECT email FROM usuarios WHERE email='$email'";
    $pegarDados =  mysqli_fetch_array((mysqli_query($conexao, $sqlVerificar)));

    $pegarEmail = $pegarDados['email'];

    if($email == $pegarEmail){
        echo "<script type='text/javascript'>
        			alert('Aviso: Email já cadastrado!');
       				 window.location.replace('cadastro.php');
   				</script>";
    }
    else{
        $sql = "INSERT INTO usuarios(nome, email, senha) VALUES ('$nome', '$email', '$senha')";

        if(mysqli_query($conexao, $sql)){
            mysqli_close($conexao);
            return true;
        }else{
            mysqli_close($conexao);
            return false;
        }
    }  
}

function listarCliente(){
    $conexao = abrirConexao();

    $sql = "SELECT * FROM clientes";

    $tabela = mysqli_query($conexao, $sql);
    return $tabela;   
}

?>
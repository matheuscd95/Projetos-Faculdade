<?php

    include('conexao.php');

    $conexao = abrirConexao();

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $sql = "DELETE FROM clientes WHERE id ='$id'";

    if(mysqli_query($conexao, $sql)){
        header("Location: home.php");
        mysqli_close($conexao);
        return true;
    }else{
        mysqli_close($conexao);
        return false;
    }

?>
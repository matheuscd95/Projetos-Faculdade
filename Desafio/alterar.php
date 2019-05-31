<?php

    include('conexao.php');

    $conexao = abrirConexao();

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $nome = trim(ucwords(strtolower(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING))));
    $telefone = trim(filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING));
    $cep = trim(filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING));
    $endereco = trim(filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING));
    $numero = trim(filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING));
    $cidade = trim(filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING));
    $uf = trim(strtoupper(filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING)));
    $pais = trim(filter_input(INPUT_POST, 'pais', FILTER_SANITIZE_STRING));

    $sql = "UPDATE clientes SET nome='$nome', telefone='$telefone', cep='$cep', endereco='$endereco',
                                numero='$numero', cidade='$cidade', uf='$uf', pais='$pais' WHERE id='$id'";

    $alterar = mysqli_query($conexao, $sql);

    if(mysqli_affected_rows($conexao)){
        echo "<script type='text/javascript'>
        alert('Alterado com sucesso!');
            window.location.replace('home.php');
    </script>";
    }
    else{
        header("Location: home.php");
    }

?>
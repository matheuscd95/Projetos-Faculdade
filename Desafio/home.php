<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css.css">
</head>
<body>
    
    <?php 
        include("cadastroDAO.php"); 
        
        // SESSION E LOGIN DO SISTEMA

		session_start();
        $logado = $_SESSION['nome']; 
        if((!isset ($_SESSION['email']) == true) && (!isset ($_SESSION['senha']) == true)){
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            session_destroy();
            header('location: ../');
		}

    ?>

    <nav>
        <h2>Bem Vindo, <?php echo $logado ?></h2>

        <a class="sair" href="Login/deslogar.php">Sair</a>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="cliente.php">Cadastrar Cliente</a></li>
        </ul>
    </nav>

    <section>        
        <table>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>CEP</th>
                <th>Endereço</th>
                <th>Número</th>
                <th>Cidade</th>
                <th>UF</th>
                <th>País</th>
                <th colspan="2">Editar</th>
            </tr>
            <?php
                $tabela = listarCliente();
                while($linha = mysqli_fetch_array($tabela)){ ?>
                    <tr>
                        <td><?php echo $linha["id"];?></td>
                        <td><?php echo $linha["nome"];?></td>
                        <td><?php echo $linha["telefone"];?></td>
                        <td><?php echo $linha["cep"];?></td>
                        <td><?php echo $linha["endereco"];?></td>
                        <td><?php echo $linha["numero"];?></td>
                        <td><?php echo $linha["cidade"];?></td>
                        <td><?php echo $linha["uf"];?></td>
                        <td><?php echo $linha["pais"];?></td>
                        <td><a href='alterarCliente.php?id="<?php echo $linha["id"]; ?>"' onClick="return confirm('Deseja alterar os dados do cliente <?php echo $linha['id']; ?>?')">Alterar</a></td>
                        <td><a href='deletarCliente.php?id="<?php echo $linha["id"]; ?>"' onClick="return confirm('Deseja remover o cliente <?php echo $linha['id']; ?>?')" >Remover</a></td>
                    </tr>
            <?php
                }
            ?>
        </table>
    </section>

</body>
</html>
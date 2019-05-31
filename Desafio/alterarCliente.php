<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8″ />
    <title>Alterar Dados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css.css">

</head>
<body>
    <?php

        include('conexao.php');

        // PEGANDO ID PARA PREENCHER OS CAMPOS AUTOMATICAMENTE
            
        $conexao = abrirConexao();
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); 
        $sql = "SELECT * FROM clientes WHERE id ='$id'";

        $tabela = mysqli_query($conexao, $sql);
        $linha_cliente = mysqli_fetch_assoc($tabela);

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
        <h2>Alterar Dados do Cliente</h2>       
    </nav>
	
    <div class="cliente">
        <form action="alterar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $linha_cliente['id']; ?>" >

            <label for="nome">Nome</label>
            <input id="nome" type="text" name="nome" value="<?php echo $linha_cliente['nome']; ?>" required />

            <label for="telefone">Telefone</label>
            <input id="telefone" type="tel" name="telefone" value="<?php echo $linha_cliente["telefone"]; ?>" minlength="11" maxlength="14" onblur="$(this).mask('(00)00000-0000');" pattern="[0-9()-]+$" required/>

            <label for="cep">CEP</label>
            <input id="cep" type="text" name="cep" value="<?php echo $linha_cliente['cep']; ?>" minlength="9" maxlength="9" onblur="$(this).mask('00000-000');" pattern="[0-9-]+$" required />

            <label for="endereco">Endereço</label>
            <input id="endereco" type="text" name="endereco" value="<?php echo $linha_cliente['endereco']; ?>" required />

            <label for="numero">Número</label>
            <input id="numero" type="text" name="numero" value="<?php echo $linha_cliente['numero']; ?>" maxlength="6" pattern="[0-9]+$" required />
    
            <label for="cidade">Cidade</label>
            <input id="cidade" type="text" name="cidade"  value="<?php echo $linha_cliente['cidade']; ?>" required/>
    
            <label for="uf">UF</label>
            <input id="uf" type="text" name="uf" value="<?php echo $linha_cliente['uf']; ?>" minlength="2" maxlength="2" pattern="[A-Z]+$" required />
            
            <label for="pais">País</label>
            <input id="pais" type="text" name="pais" value="<?php echo $linha_cliente['pais']; ?>" required/>

            <div class="input-form">
                <input type="submit" class="btn btn-success" value="Alterar" /> 
                <input type="button" class="btn btn-danger" value="Cancelar" onclick="winClose()" />
            </div>
        </form>
    </div>
	
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    <script type="text/javascript" src="javaScript.js"></script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Cadastro de Clientes</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css.css">
</head>
<body>
    
    <?php 
		include("cadastroDAO.php"); 
		
		//PASSANDO PARÂMETROS NA FUNÇÃO INSERIR QUANDO O FORMULÁRIO FOR ENVIADO "POST" 

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $cep = $_POST['cep'];
            $endereco = $_POST['endereco'];
            $numero = $_POST['numero'];
            $cidade = $_POST['cidade'];
            $uf = $_POST['uf'];
            $pais = $_POST['pais'];

			if(inserirCliente($nome, $telefone, $cep, $endereco, $numero, $cidade, $uf, $pais)){
                echo "<script type='text/javascript'>
                alert('Inserido com sucesso!');
                </script>";
            }
            else{
                echo "<script type='text/javascript'>
                alert('Erro ao tentar inserir!');
                </script>";
            }
		}
		
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
		<h2 class="cliente">Cadastro de Clientes</h2>

		<a class="sair" href="Login/deslogar.php">Sair</a>
		<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="cliente.php">Cadastrar Cliente</a></li>
		</ul>
	</nav>

	<div class="cliente">
		<form action="cliente.php" method="POST">
			<label for="nome">Nome</label>
			<input id="nome" type="text" name="nome" placeholder="Nome Completo" required />

			<label for="telefone">Telefone</label>
			<input id="telefone" type="text" name="telefone" minlength="11" maxlength="14" onblur="$(this).mask('(00)00000-0000');" pattern="[0-9()-]+$" required />

			<label for="cep">CEP</label>
			<input id="cep" type="text" name="cep" minlength="9" maxlength="9" onblur="$(this).mask('00000-000');" pattern="[0-9-]+$" required />

			<label for="endereco">Endereço</label>
			<input id="endereco" type="text" name="endereco" required />

			<label for="numero">Número</label>
			<input id="numero" type="text" name="numero" maxlength="6" pattern="[0-9]+$" required />

			<label for="cidade">Cidade</label>
			<input id="cidade" type="text" name="cidade" required />

			<label for="uf">UF</label>
			<select id="uf"  name="uf">
				<option value="estado">Selecione seu estado</option>
				<option value="AC">Acre</option>
				<option value="AL">Alagoas</option>
				<option value="AP">Amapá</option>
				<option value="AM">Amazonas</option>
				<option value="BA">Bahia</option>
				<option value="CE">Ceará</option>
				<option value="DF">Distrito Federal</option>
				<option value="ES">Espírito Santo</option>
				<option value="GO">Goiás</option>
				<option value="MA">Maranhão</option>
				<option value="MT">Mato Grosso</option>
				<option value="MS">Mato Grosso do Sul</option>
				<option value="MG">Minas Gerais</option>
				<option value="PA">Pará</option>
				<option value="PB">Paraíba</option>
				<option value="PR">Paraná</option>
				<option value="PE">Pernambuco</option>
				<option value="PI">Piauí</option>
				<option value="RJ">Rio de Janeiro</option>
				<option value="RN">Rio Grande do Norte</option>
				<option value="RS">Rio Grande do Sul</option>
				<option value="RO">Rondônia</option>
				<option value="RR">Roraima</option>
				<option value="SC">Santa Catarina</option>
				<option value="SP">São Paulo</option>
				<option value="SE">Sergipe</option>
				<option value="TO">Tocantins</option>
			</select>

			<label for="pais">Pais</label>
			<input id="pais" type="text" name="pais" required /> 
			<div class="input-form">
				<input type="submit" class="btn btn-success" value="Enviar" />
				<input type="reset" class="btn btn-light" value="Limpar" />
			</div>
		</form>
	</div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

	<script type="text/javascript" src="javaScript.js"></script>
	
</body>
</html>
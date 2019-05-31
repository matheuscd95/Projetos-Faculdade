<?php include_once('facebook.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Index</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css.css">
</head>

<body>
	<div class='login'>
		<h3>Login e Cadastro</h3>

		<form action="Login/verificarLogin.php" method="POST"> 
			<input id="email" name="email" type="text" placeholder="Digite seu email" />
			<input id="senha" name="senha" type="password" placeholder="Digite sua senha" />
			<input type="submit" class="btn btn-info" value="Login" />
		</form>

		<div>
			<label id="cadastro">Criar sua conta?</label>
			<a href="cadastro.php"><input type="button" class="btn btn-secondary" value="Cadastrar-se"></a><br>
		</div>
		<a href="<?php echo $loginUrl ?>"><input type="button" class="btn btn-primary" value="Facebook"></a>
	</div>
</body>
</html>
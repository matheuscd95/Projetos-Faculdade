<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cadastrar-se</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css.css">
</head>
<body>
    
    <?php 
        include("cadastroDAO.php"); 

        //PASSANDO PARÂMETROS NA FUNÇÃO INSERIR QUANDO O FORMULÁRIO FOR ENVIADO "POST" 

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            if(inserirUsuario($nome, $email, $senha)){
                echo "<script type='text/javascript'>
				alert('Inserido com sucesso!');
				window.location.replace('index.php');
                </script>";
            }
            else{
                echo "<script type='text/javascript'>
                alert('Erro ao tentar inserir!');
                </script>";
            }
        }

    ?>

    <div class='login cadastro'>
        <form action="cadastro.php" method="POST">
            <label for="nome">Nome</label>
            <input id="nome" type="text" name="nome" placeholder="Nome Completo" required />

            <label for="email">Email</label>
            <input id="email" type="email" name="email" placeholder="exemplo@email.com" pattern="[a-z0-9._&+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required />

            <label for="senha">Senha</label>
            <input id="senha" type="password" name="senha" placeholder="Letras e/ou Números" pattern="[A-Za-z0-9]+$" required />

            <input type="submit" class="btn btn-success" value="Cadastrar" />
            <input type="reset" class="btn btn-light" value="Limpar" />
            <a href="index.php"><input type="button" class="btn btn-outline-dark" value="Voltar" /></a>
        </form>
    </div>
</body>
</html>
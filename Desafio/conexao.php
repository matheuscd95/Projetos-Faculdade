<?php 

	function abrirConexao(){
		$servidor = "127.0.0.1";
		$login = "root";
		$senha = "";
		$banco = "desafio";
		$porta = "3306";

		$conexao = mysqli_connect($servidor, $login, $senha, $banco, $porta);

		if(mysqli_connect_error()){
			echo "Erro ao tentar se conectar com o banco: " . mysqli_connect_error();
			return null;
		}

		return $conexao;
	}

?>
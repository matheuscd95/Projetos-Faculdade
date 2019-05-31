# Desafio

Sistema básico para efetuar login e cadastro de clientes

Configuração localhost:
	- banco: desafio
	- porta: 3306
	- login: root
	- senha: ""
	- servidor: apache v2.4 "127.0.0.1"
	
Execução do desafio:
	- como padrão o sistema inicia em index.php (página principal)
	- se caso, o usuário não tenha cadastro no sistema, clicar em "Cadastrar-se" e preencher o formulário
	- se caso, o usuário já tenha efetuado o cadastro, fazer o login
	- login: 
		> cadastro no sistema
		> facebook
		
	- quando o usuário fizer o login, entrará na pagina home.php (administrador), que tem por padrão
a visualização da tabela de clientes, podendo fazer operações de alterar/remover direto da tabela

	- Links da tabela:
		> alterar: assim que o usuário clicar no link "alterar" na tabela, exibirá um 'confirm dialog', clicando em "OK",
será redirecionado para a página de alterar os dados do cliente.
		>remover: quando o usuário clicar no link "remover" na tabela, exibirá um 'confirm dialog', clicando em "OK",
o cliente será removido do banco de dados.
		
	- no link "Cadastrar Cliente" o usuário poderá inserir o cliente preenchendo os campos: nome e telefone, ao digitar o CEP
o sistema irá preencher automaticamente: endereço, bairro, cidade, estado e país, depois o campo número estará em foco
para o usuário preencher.


obs: 
	- As máscaras de CEP e TELEFONE estão implementadas
	- preencher campos automaticamente usando o CEP através do viacep.com.br
	- login com o facebook
	- não consegui implementar a parte da API do google maps exibindo a localização


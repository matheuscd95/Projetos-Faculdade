CREATE DATABASE desafio  /*!40100 DEFAULT CHARACTER SET utf8 */;
USE desafio;

CREATE TABLE clientes(
		id int(20) NOT NULL AUTO_INCREMENT,
		nome varchar(100) NOT NULL,
        telefone varchar(20) NOT NULL,
        cep varchar(20) NOT NULL,
        endereco varchar(200) NOT NULL,
        numero varchar(20) NOT NULL,
        cidade varchar(100) NOT NULL,
        uf varchar(50) NOT NULL,
        pais varchar(50) NOT NULL,
        
        PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE usuarios(
		id int(20) NOT NULL AUTO_INCREMENT,
        nome varchar(100) NOT NULL,
        email varchar(100) NOT NULL,
        senha varchar(50) DEFAULT NULL,
        
        PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
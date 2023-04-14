CREATE DATABASE `dbphp8` 
DEFAULT CHARACTER SET utf8 ;


use dbphp8;


CREATE TABLE tb_usuario(
idUsuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
desLogin VARCHAR(64) NOT NULL,
desSenha VARCHAR(256) NOT NULL,
dtCadastro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
);



SELECT * FROM tb_usuario;





/*
UPDATE tb_usuario SET desSenha = '12345' WHERE idUsuario = '1';

DELETE FROM	 tb_usuario WHERE idUsuario = '1' ;

Numca fazer
TRUNCATE TABLE tb_usuario;
Numca fazer*/


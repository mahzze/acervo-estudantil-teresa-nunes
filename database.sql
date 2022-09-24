CREATE DATABASE acervo_teresa_nunes;

USE acervo_teresa_nunes;

CREATE TABLE usuarios (
	uid INT AUTO_INCREMENT PRIMARY KEY,
    curso VARCHAR(30),
    nome VARCHAR(25),
    senha VARCHAR(72)
);

CREATE TABLE livros (
	nome VARCHAR(40),
	arquivo MEDIUMBLOB,
	descricao VARCHAR(256)
);

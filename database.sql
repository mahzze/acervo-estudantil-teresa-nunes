CREATE DATABASE acervo_teresa_nunes;

USE acervo_teresa_nunes;

CREATE TABLE usuarios (
  	uid INT AUTO_INCREMENT PRIMARY KEY,
    curso VARCHAR(30),
    nome VARCHAR(45),
    email VARCHAR(45),
    senha VARCHAR(72)
);

CREATE TABLE livros (
	nome VARCHAR(40),
	arquivo LONGBLOB,
	descricao VARCHAR(300)
);

INSERT INTO usuarios (
  uid,
  nome,
  senha
) VALUES (0, "admin", "$2y$10$Ocv2ZmDnjf3s6i8hfMPk9.RFP2qlEAjqMyboW5yYg2SKXH1Qu59iy" );

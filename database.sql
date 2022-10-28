CREATE TABLE usuarios (
  	uid INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(45) NOT NULL,
    curso VARCHAR(20) NOT NULL,
    email VARCHAR(45) NOT NULL,
    senha VARCHAR(72) NOT NULL
);

CREATE TABLE livros (
  lid INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(40) NOT NULL,
  tipo VARCHAR(30) NOT NULL,
  path VARCHAR(250) NOT NULL,
  categoria VARCHAR(30) NOT NULL,
	descricao VARCHAR(300)
);

INSERT INTO usuarios (
  uid,
  nome,
  email,
  curso,
  senha
) VALUES (1, "admin", "admin@etec.sp.gov.br", "administracao","$2y$10$IW6YdjAZBV6gfbWC4mr64uivJlV1BAN1ODix0yK213Osq4Lw6a0Qy");


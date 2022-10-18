CREATE TABLE usuarios (
  	uid INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(45) NOT NULL,
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
  senha
) VALUES (1, "admin", "admin@etec.sp.gov.br", "$2y$10$Ocv2ZmDnjf3s6i8hfMPk9.RFP2qlEAjqMyboW5yYg2SKXH1Qu59iy" );

CREATE DATABASE IF NOT EXISTS acervo CHARACTER SET utf8
  COLLATE utf8_general_ci;

USE acervo;

CREATE TABLE cursos (
  curso VARCHAR(10) NOT NULL
);

CREATE TABLE usuarios (
  uid INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(45) NOT NULL,
  curso VARCHAR(10) NOT NULL,
  email VARCHAR(45) NOT NULL,
  senha VARCHAR(72) NOT NULL
);

CREATE TABLE livros (
  lid INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(60) NOT NULL,
  tipo VARCHAR(30) DEFAULT "application/pdf",
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
) VALUES (1, "admin", "admin@etec.sp.gov.br", "SEC","$2y$10$IW6YdjAZBV6gfbWC4mr64uivJlV1BAN1ODix0yK213Osq4Lw6a0Qy");

INSERT INTO cursos VALUES
("RH"),
("AI"),
("ETT"),
("ELT"),
("SEC"),
("ADM");

INSERT INTO livros (nome, path, categoria, descricao) VALUES 
('Biologia', 'livros/biologia.pdf', 'Humanas', ''),
('Português', 'livros/portugues.pdf', 'Humanas', ''),
('Historia', 'livros/historia.pdf', 'Humanas', ''),
('Geografia', 'livros/geografia.pdf', 'Humanas', ''),
('Filosofia', 'livros/filosofia.pdf', 'Humanas', ''),
('Sociologia', 'livros/sociologia.pdf', 'Humanas', ''),
('Matematica', 'livros/matematica.pdf', 'Exatas', ''),
('Fisica', 'livros/fisica.pdf', 'Exatas', ''),
('Quimica', 'livros/quimica.pdf', 'Exatas', ''),
('eletronica para leigos', 'livros/eletronica para leigos.pdf', 'ELT', ''),
('eletronica para leigos', 'livros/eletronica para leigos.pdf', 'ETT', ''),
('Fundamentos de instalações elétricas', 'livros/fundamentos_de_Instalacoes_eletricas.pdf', 'ELT', ''),
('Quincas Borba', 'livros/quincas borba.pdf', 'Diversos', ''),
('Nove Noites', 'livros/Nove noites romance (Bernardo Carvalho).pdf', 'Diversos', ''),
('Mensagem - Fernando Pessoa', 'livros/Mensagem - Fernando Pessoa.pdf', 'Diversos', ''),
('Terra Sonambula', 'livros/Terra-sonambula.pdf', 'Diversos', ''),
('Poemas escolhidos de Gregório de Matos', 'livros/poemas escolhidos gregorio de matos.pdf', 'Diversos', ''),
('Romanceiro da Inconfidência', 'livros/romanceiro da inconfidencia.pdf', 'Diversos', ''),
('Campo Geral Guimarães Rosa', 'livros/Campo-Geral-Guimarães-Rosa.pdf', 'Diversos', ''),
('Alguma Poesia Carlos Drummond de Andrade', 'livros/alguma poesia.pdf', 'Diversos', ''),
('Angustia', 'livros/angustia.pdf', 'Diversos', '');

CREATE DATABASE IF NOT EXISTS acervo ;

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
  nome VARCHAR(100) NOT NULL,
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
("ADM"),
("AI"),
("ETT"),
("ELT"),
("RH"),
("SEC");

INSERT INTO livros (nome, path, categoria, descricao) VALUES 
('Biologia', 'livros/biologia.pdf', 'Biologicas', ''),
('Genetica Mendeliana', 'livros/genetica mendeliana.pdf', 'Biologicas', ''),
('Todas Artes - edição de professor', 'livros/Todas_Artes_0028P18063_VU_MP_PNLD18.pdf', 'Humanas', ''),
('Português', 'livros/portugues.pdf', 'Humanas', ''),
('Historia', 'livros/historia.pdf', 'Humanas', ''),
('Geografia', 'livros/geografia.pdf', 'Humanas', ''),
('Filosofia', 'livros/filosofia.pdf', 'Humanas', ''),
('Sociologia', 'livros/sociologia.pdf', 'Humanas', ''),
('Matematica', 'livros/matematica.pdf', 'Exatas', ''),
('Física', 'livros/fisica.pdf', 'Exatas', ''),
('Quimica', 'livros/quimica.pdf', 'Exatas', ''),
('Os elementos de Euclides', 'livros/OsElementos-Euclides.pdf', 'Exatas', ''),
('Termologia em questão', 'livros/Termologia em Questão - Ebook.pdf', 'Exatas', ''),
('Eletrodinamica', 'livros/eletricidade2.pdf', 'Exatas', ''),
('Cinemática', 'livros/cinedin.pdf', 'Exatas', ''),
('Quincas Borba', 'livros/quincas borba.pdf', 'Diversos', ''),
('Nove Noites', 'livros/Nove noites romance (Bernardo Carvalho).pdf', 'Diversos', ''),
('Mensagem - Fernando Pessoa', 'livros/Mensagem - Fernando Pessoa.pdf', 'Diversos', ''),
('Terra Sonambula', 'livros/Terra-sonambula.pdf', 'Diversos', ''),
('Poemas escolhidos de Gregório de Matos', 'livros/poemas escolhidos gregorio de matos.pdf', 'Diversos', ''),
('Romanceiro da Inconfidência', 'livros/romanceiro da inconfidencia.pdf', 'Diversos', ''),
('Campo Geral Guimarães Rosa', 'livros/Campo-Geral-Guimarães-Rosa.pdf', 'Diversos', ''),
('Alguma Poesia Carlos Drummond de Andrade', 'livros/alguma poesia.pdf', 'Diversos', ''),
('Angustia', 'livros/angustia.pdf', 'Diversos', ''),
('Eletrônica e automação industrial', 'livros/AUTOMACAO_INDUSTRIAL.pdf', 'ELT', ''),
('Eletronica para leigos', 'livros/eletronica para leigos.pdf', 'ELT', ''),
('Fundamentos de instalações elétricas', 'livros/fundamentos_de_Instalacoes_eletricas.pdf', 'ELT', ''),
('Eletrônica Digital autor Escola Técnica Sandra Silva', 'livros/Eletrônica Digital autor Escola Técnica Sandra Silva.pdf', 'ELT', ''),
('Curso básico de eletrônica analógica autor Gerson R. Luqueta', 'livros/Curso básico de eletrônica analógica autor Gerson R. Luqueta.pdf', 'ELT', ''),
('Eletrotécnica - SENAI', 'livros/Eletrotécnica - SENAI.pdf', 'ELT', ''),
('Conceitos básicos da Eletrônica teoria e prática autor Claudio José Magon', 'livros/Conceitos básicos da Eletrônica teoria e prática autor Claudio José Magon.pdf', 'ELT', ''),
('Eletrotécnica - SENAI', 'livros/Eletrotécnica - SENAI.pdf', 'ETT', ''),
('Curso de Eletrotécnica', 'livros/Curso de Eletrotécnica.pdf', 'ETT', ''),
('Eletronica para leigos', 'livros/eletronica para leigos.pdf', 'ETT', ''),
('Práticas de secretariado', 'livros/Práticas de Secretariado.pdf', 'SEC', ''),
('Secretariado_II modulo', 'livros/secretariado_II.pdf', 'SEC', ''),
('Secretariado_III modulo', 'livros/secretariado_III.pdf', 'SEC', ''),
('SCRUM - A arte de fazer o dobro em metade do tempo', 'livros/Scrum - a arte de fazer o dobro - Jeff Sutherland.pdf', 'ADM',''),
('Teoria geral da administração', 'livros/teoria-geral-da-administracao-chiavenato.pdf', 'ADM', ''),
('A startup enxuta', 'livros/a-startup-enxuta-eric-ries-livro-completo.pdf', 'ADM', ''),
('Automação industrial', 'livros/automacao industrial.pdf', 'AI', ''),
('Eletrônica e automação industrial', 'livros/AUTOMACAO_INDUSTRIAL.pdf', 'AI', ''),
('Automação de processos com Python', 'livros/Livro de Python (Automatize tarefas maçantes).pdf', 'AI', ''),
('Reinvente sua empresa', 'livros/Reinvente sua empresa - Jason Fried.pdf', 'RH', ''),
('A startup enxuta', 'livros/a-startup-enxuta-eric-ries-livro-completo.pdf', 'RH', ''),
('SCRUM - A arte de fazer o dobro em metade do tempo', 'livros/Scrum - a arte de fazer o dobro - Jeff Sutherland.pdf', 'RH','');


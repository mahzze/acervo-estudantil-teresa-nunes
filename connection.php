<?php
require "vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$host     = $_ENV['MYSQLHOST'];
$user     = $_ENV['MYSQLUSER'];
$password = $_ENV['MYSQLPASSWORD'];
$database = $_ENV['MYSQLDATABASE'];
$port     = $_ENV['MYSQLPORT'];

$connection = new mysqli($host, $user, $password, $database, $port);

if ($connection->connect_error) {
  die("ERRO NA CONEXAO COM O BANCO DE DADOS");
}

if (!($connection->query("SELECT * FROM livros;")->num_rows > 0)) {
  $connection->query(
    "
    INSERT INTO livros (nome, path, categoria, descricao)
    VALUES 
    ('Biologia', 'livros/biologia.pdf', 'Humanas', ''),
    ('Português', 'livros/portugues.pdf', 'Humanas', ''),
    ('Historia', 'livros/historia.pdf', 'Humanas', ''),
    ('Geografia', 'livros/geografia.pdf', 'Humanas', ''),
    ('Filosofia', 'livros/filosofia.pdf', 'Humanas', ''),
    ('Sociologia', 'livros/sociologia.pdf', 'Humanas', ''),
    ('Matematica', 'livros/matematica.pdf', 'Exatas', ''),
    ('Fisica', 'livros/fisica.pdf', 'Exatas', ''),
    ('Quimica', 'livros/quimica.pdf', 'Exatas', ''),
    ('Clean Code', 'livros/clean_code.pdf', 'DS', ''),
    ('Nove Noites', 'livros/Nove noites romance (Bernardo Carvalho).pdf', 'Diversos', ''),
    ('Fundamentos de instalações elétricas', 'livros/fundamentos_de_Instalacoes_eletricas.pdf', 'ELT', '');
    "
  );
}
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', ''),
//     ('', 'livros/', '', '');
//     "

<?php
require('./vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host     = $_ENV['MYSQLHOST'];
$user     = $_ENV['MYSQLUSER'];
$password = $_ENV['MYSQLPASSWORD'];
$database = $_ENV['MYSQLDATABASE'];
$port     = $_ENV['MYSQLPORT'];

$connection = new mysqli($host, $user, $password, $database, $port);

if ($connection->connect_error) {
  die("ERRO NA CONEXAO COM O BANCO DE DADOS");
}

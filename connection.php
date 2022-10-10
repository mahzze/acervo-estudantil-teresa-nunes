<?php

$host     = getenv('MYSQLHOST');
$user     = getenv('MYSQLUSER');
$password = getenv('MYSQLPASSWORD');
$database = getenv('MYSQLDATABASE');
$port     = getenv('MYSQLPORT');

$connection = new mysqli($host, $user, $password, $database, $port);

if ($connection->connect_error) {
  die("ERRO NA CONEXAO COM O BANCO DE DADOS");
}

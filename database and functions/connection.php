<?php
include("../env.php");

$host = $MYSQLHOST;
$user = $MYSQLUSER;
$password = $MYSQLPASSWORD;
$database = "acervo_teresa_nunes";
$port = $MYSQLPORT;

$connection = new mysqli($host, $user, $password, $database, $port);

if ($connection->connect_error) {
  die("ERRO NA CONEXAO COM O BANCO DE DADOS");
}

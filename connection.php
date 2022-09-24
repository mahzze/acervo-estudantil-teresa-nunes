<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "acervo_teresa_nunes";

$connection = new mysqli($host, $user, $password, $database);

if ($connection->connect_error) {
  die("ERRO NA CONEXAO COM O BANCO DE DADOS");
}

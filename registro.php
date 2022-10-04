<?php
require("./connection.php");

$nome  = $_POST["nome"];
$curso = $_POST["curso"];
$senha = $_POST["senha"];

$senha = password_hash($senha, PASSWORD_BCRYPT, array(PASSWORD_BCRYPT_DEFAULT_COST));

$query = $connection->prepare("INSERT INTO usuarios(curso, nome, senha) VALUES (?,?,?);");
$query->bind_param("sss", $curso, $nome, $senha);
$query->execute();

header("Location: ./index.php");

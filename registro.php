<?php
require("./connection.php");

$nome  = $_POST["nome"];
$email = $_POST["email"];
$curso = $_POST["curso"];
$senha = $_POST["senha"];

$senha = password_hash($senha, PASSWORD_BCRYPT, array(PASSWORD_BCRYPT_DEFAULT_COST));

$query = $connection->prepare("INSERT INTO usuarios( nome, email, curso , senha) VALUES (?,?,?,?);");
$query->bind_param("ssss", $nome, $email, $curso, $senha);
$query->execute();

header("Location: ./loginForm.html");

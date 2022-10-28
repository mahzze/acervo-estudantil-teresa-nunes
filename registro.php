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

// código para enviar emails, por algum motivo não funciona
// $query = $connection->prepare("SELECT uid FROM usuarios WHERE nome = ? AND curso = ? AND email = ?");
// $query->bind_param("sss", $nome, $curso, $email);
// $query->execute();

// if ($query->bind_result($id)) {
//   while ($query->fetch()) {
//     mail($email, "Acervo teresa nunes - ID", "Caro(a) $nome, seu registro foi confirmado, a sua id é $id");
//     echo $email . '  :  ' . $id;
//   }
// }

header("Location: ./index.php");

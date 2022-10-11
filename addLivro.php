<?php
require("./connection.php");

session_start();

if (!isset($_SESSION["admin"])) {
  header("Location: index.php");
}

if (!isset($connection)) {
  echo '<script type="text/javascript">window.alert("Há algo de errado na conexão com o banco de dados")</script>';
}

$arquivo = addslashes(file_get_contents($_FILES["arquivo"]["tmp_name"]));

$query = $connection->prepare("INSERT INTO livros (nome, descricao, arquivo, tipo) VALUES (? , ? , ?, ?);");
$query->bind_param("ssbs", $_POST["nome"], $_POST["desc"], $arquivo, $_FILES["arquivo"]["type"]);
$query->send_long_data(2, $arquivo);
$query->execute();

header("Location: ./admin.php");
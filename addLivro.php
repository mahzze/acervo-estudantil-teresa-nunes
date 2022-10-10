<?php
include("./connection.php");

if (!isset($connection)) {
  echo '<script type="text/javascript">window.alert("Há algo de errado na conexão com o banco de dados")</script>';
}

$_FILES[""];

$query = $connection->prepare("INSERT INTO livros (nome, descricao, arquivo) VALUES (? , ? , ?);");
$query->bind_param("ssb", $_POST["nome"], $_POST["desc"],);
$query->execute();

header("Location: ./admin.php");

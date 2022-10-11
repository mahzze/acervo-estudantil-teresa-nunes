<?php
require("./connection.php");

session_start();

if (!isset($_SESSION["admin"])) {
  header("Location: index.php");
}

if (!isset($connection)) {
  echo '<script type="text/javascript">window.alert("Há algo de errado na conexão com o banco de dados")</script>';
}

$query = $connection->prepare("DELETE FROM livros where nome = ? AND lid = ?;");
$query->bind_param("si", $_GET["arquivo"], $_GET["id"]);
$query->execute();

header("Location: ./admin.php");

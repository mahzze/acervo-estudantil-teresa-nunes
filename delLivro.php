<?php
require("./connection.php");

session_start();

if (!isset($_SESSION["admin"])) {
  header("Location: index.php");
}

if (!isset($connection)) {
  echo '<script type="text/javascript">window.alert("Há algo de errado na conexão com o banco de dados")</script>';
}
//query para receber o caminho do arquivo para poder apagar.
$query = $connection->prepare("SELECT path FROM livros WHERE lid = ?;");
$query->bind_param("i", $_GET["id"]);
$query->execute();
if ($query->bind_result($path)) {
  $query->fetch();

  chmod("livros/", 0777);

  if (unlink($path)) {
    $query->free_result();
    $query = $connection->prepare("DELETE FROM livros WHERE lid = ?;");
    $query->bind_param("i", $_GET["id"]);
    $query->execute();
  } else {
    echo '
  <script type="text/javascript">
    window.alert("Algo deu errado ao tentar deletar o arquivo")
  </script>
  ';
  }
}

header("Location: ./admin.php");

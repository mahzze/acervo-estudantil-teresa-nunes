<?php
require("./connection.php");

session_start();

if (!isset($_SESSION["admin"])) {
  header("Location: index.php");
}

if (!isset($connection)) {
  echo '<script type="text/javascript">window.alert("Há algo de errado na conexão com o banco de dados")</script>';
}

$res = $connection->query("SELECT path, categoria FROM livros WHERE lid = " . $_GET["id"]);
$resultado = $res->fetch_object();

if ($connection->query("SELECT categoria FROM livros WHERE path='" . $resultado->path . "';")->num_rows == 1) {

  $query = $connection->prepare("SELECT path FROM livros WHERE lid = ?;");
  $query->bind_param("i", $_GET["id"]);
  $query->execute();
  if ($query->bind_result($path)) {
    $query->fetch();

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
} else {
  $query = $connection->prepare("DELETE FROM livros WHERE lid = ?;");
  $query->bind_param("i", $_GET["id"]);
  $query->execute();
}

header("Location: ./admin.php");

<?php
require "./connection.php";

$op = $_POST["operacao"];
$curso = $_POST["cursoInput"];

function add($x)
{
  global $connection;
  $query = $connection->prepare("INSERT INTO cursos (curso) VALUES (?)");
  $query->bind_param("s", $x);
  $query->execute();
  $query->close();
}

function del($x)
{
  global $connection;
  $connection->query("DELETE FROM cursos WHERE curso = '$x'");
  $connection->query("DELETE FROM usuarios WHERE curso = '$x' AND uid > 1");
  $result = $connection->query("SELECT path FROM livros WHERE categoria = '$x'");

  while ($obj = $result->fetch_object()) {
    $path = $obj->path;
    $cursosPorLivro = $connection->query("SELECT DISTINCT(categoria) FROM livros WHERE path = '" . $path . "';")->num_rows;
    if ($cursosPorLivro == 1) {
      unlink("$path");
    }
  }
  $connection->query("DELETE FROM livros WHERE categoria = '$x';");
}

if ($op == "add") {
  add($curso);
}

if ($op == "del") {
  del($curso);
}

header("Location: ./admin.php");

<?php
require "./connection.php";

$op = $_GET["operacao"];

function add($x)
{
  global $connection;
  $query = $connection->prepare("INSERT INTO cursos (curso) VALUES (?)");
  $query->bind_param("s", $x);
  $query->execute();
}

function del($x)
{
  global $connection;
  $connection->query("DELETE * FROM cursos WHERE curso = " . $x);
}

if ($op == "add") {
  add($curso);
}

if ($op == "del") {
  del($curso);
}

header("Location: ./admin.php");

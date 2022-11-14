<?php
require("./connection.php");

$nome  = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$query = $connection->prepare("SELECT uid, senha, curso FROM usuarios WHERE email = ? AND nome = ?");
$query->bind_param("ss", $email, $nome);
$query->execute();

$query->bind_result($uid, $hash, $curso);
$query->fetch();

if (password_verify($senha, $hash)) {
  session_start();
  $_SESSION["logged"] = true;
  if ($uid == 1) {
    $_SESSION["admin"] = true;
  } else {
    $_SESSION["curso"] = $curso;
  }
  header("Location: ./index.php");
} else {
  echo '  
  <script type="text/javascript">
    window.alert("combinação inválida de usuario/ID/senha");
  </script>
  ';
  header("Location: ./loginForm.html");
}

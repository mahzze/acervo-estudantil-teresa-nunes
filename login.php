<?php
require("./connection.php");

$nome  = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$query = $connection->prepare("SELECT uid, senha FROM usuarios WHERE email = ? AND nome = ?");
$query->bind_param("ss", $email, $nome);
$query->execute();

if ($query->bind_result($uid, $resSenha)) {
  while ($query->fetch()) {
    $hash = $resSenha;
  }

  if (password_verify($senha, $hash)) {
    session_start();
    $_SESSION["logged"] = true;
    if ($uid == 1) {
      $_SESSION["admin"] = true;
    }
    echo '  
    <script type="text/javascript">
      window.alert("Conectado com sucesso!");
      window.location.href = "../index.php";
    </script>
    ';
  } else {
    echo '  
  <script type="text/javascript">
    window.alert("combinação inválida de usuario/ID/senha");
    window.location.href = "../index.php"; 
  </script>
  ';
  }
}

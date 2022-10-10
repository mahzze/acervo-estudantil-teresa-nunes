<?php
require("./connection.php");

$nome  = $_POST["nome"];
$uid   = $_POST["uid"];
$senha = $_POST["senha"];

$query = $connection->prepare("SELECT senha FROM usuarios WHERE uid = ? AND nome = ?");
$query->bind_param("ss", $uid, $nome);
$query->execute();

if ($query->bind_result($resSenha)) {
  while ($query->fetch()) {
    $hash = $resSenha;
  }
  echo '  
  <script type="text/javascript">
    window.alert("combinação inválida de usuario/ID/senha");
    window.location.href = "../index.php"; 
  </script>
  ';

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
  }
}

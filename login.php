<?php
require("./connection.php");

$nome  = $_POST["nome"];
$curso = $_POST["curso"];
$senha = $_POST["senha"];

$query = $connection->prepare("SELECT senha FROM usuarios WHERE curso = ? AND nome = ?");
$query->bind_param("ss", $curso, $nome);
$query->execute();

if ($query->bind_result($res)) {
  echo '  
    <script type="text/javascript">
      window.alert("Passo 1 feito!");
    </script>
  ';

  while ($query->fetch()) {
    $hash = $res;
  }
  if (password_verify($senha, $hash)) {
    session_start();
    $_SESSION["logged"] = true;
    echo '  
    <script type="text/javascript">
      window.alert("conectado com sucesso!");
      window.location.href = "./index.php";
    </script>
    ';
  }
} else {
  echo '  
  <script type="text/javascript">
    window.alert("combinação inválida de usuario/curso/senha");
    window.location.href = "./index.php"; 
  </script>
  ';
}

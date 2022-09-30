<?php
require("./connection.php");

$query = $connection->prepare("SELECT * FROM LIVROS");

if ($query->bind_result($nome, $arquivo, $descricao)) {
  while ($query->fetch()) {
    echo "
    <script type='text/javascript'>
      alert(nome: '$nome');
    </script>  
    ";
  }
}

<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acervo Digital TN</title>
  <link rel="stylesheet" href="./css/index.css">
  <link rel="stylesheet" href="./css/cards.css">
</head>

<body>
  <?php
  if (isset($_SESSION["logged"])) {
    if (isset($_SESSION["admin"])) {
      $admBtn = '<a href="./admin.php"><button class="hbtn">admin page</button></a>';
    }

    echo '
  <header>Logo</header>
  <main class="container">  
    <section class="button-holder">' . $admBtn . ' <a href="./logout.php"><button class="hbtn">Desconectar</button></a></section>
    <section class="cards-wrapper">
    ';

    if ($query = $connection->query("SELECT * FROM livros")) {
      if ($query->num_rows > 0) {
        while ($row = $query->fetch_object()) {

          echo "
    <section class='card'>
    <div class='image'>
    
    </div>
    <div class='nome'>
      $row->nome  
    </div>
    <div class='descricao'>
      $row->descricao 
    </div>
    <a href='./download.php?arquivo=$row->nome&id=$row->lid'>      
      <button class='downloadBtn'>
        Baixar
      </button>
    </a>
    </section>
        ";
        }
      } else {
        echo '
    <div id="fail">
      Não existem livros salvos no banco de dados
    </div>';
      }
    }
    echo '
  </section>
  </main>
  <footer>alpha</footer>
  ';
  } else {
    echo '
  <main class="loginMain">
    <form class="inputs" action="./login.php" method="post">
      <input type="text" name="nome" placeholder="nome" aria-placeholder="nome">
      <input type="number" name="uid" placeholder="ID de Usuário" aria-placeholder="ID de Usuário">
      <input type="password" name="senha" placeholder="senha" aria-placeholder="senha">
      <input type="submit" value="Conectar">
    </form>
    <div>
      <p class="textReg">Não possui um acesso? <a class="linkReg" href="./registroForm.html">Cadastre-se aqui</a></p>
    </div>
  </main>
  ';
  }
  ?>

</body>

</html>

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
      $admBtn = '<a href="./admin.php"><button>admin page</button></a>';
    }

    echo '
  <header class="header">Logo</header>
  <section>' . $admBtn . ' <br> <a href="./logout.php"><button>Desconectar</button></a></section>
  <main class="container">';

    if ($query = $connection->query("SELECT * FROM livros")) {
      if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {

          echo '
    <section class="card">
    <div class="image">
    
    </div>
    <div class="nome">
      ' . $row["nome"] . '  
    </div>
     <div class="descricao">
        ' . $row["descricao"] . '
    </div>
    <button 
    class="downloadBtn" 
    href="' . $row["arquivo"] . '" 
     download="' . $row["nome"] . '"
    >
      Baixar
     </button>
    </section>
        ';
        }
      } else {
        echo '
    <div id="fail">
      Não existem livros salvos no banco de dados
    </div>';
      }
    }
    echo '
  </main>
  <footer class="footer">Footer</footer>
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

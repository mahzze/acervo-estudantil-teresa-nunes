<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acervo Digital</title>
  <link rel="stylesheet" href="./css/index.css">
</head>

<body>
  <?php
  if (isset($_SESSION["logged"])) {
    $content = isset($_SESSION["admin"]) ? '<a href="./admin.php"><button>admin page</button></a>' : 'onde os livros devem aparecer para Download';
    echo '
    <header class="header">Logo</header>
    <main class="container">
      <section>Side A</section>
      <main>
        main: ' . $content . '  <br> <a href="./logout.php"><button>LOGOUT</button></a>
      </main>      
      <section>Side B</section>
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
      <p>Não possui um acesso? <a class="linkReg" href="./registroForm.html">Cadastre-se aqui</a></p>
    </div>
  </main>
    ';
  }
  ?>

</body>

</html>

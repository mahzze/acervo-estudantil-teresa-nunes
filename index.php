<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acervo Digital</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <?php
  session_start();
  if ($_SESSION["logged"] == true) {
    echo '
    <header class="header">Logo</header>
    <main class="container">
      <section>Side A</section>
  <main>
  main: onde os livros devem aparecer para Download <br> <a href="./logout.php"><button>LOGOUT</button></a>
      </main>      
      <section>Side B</section>
    </main>
    <footer class="footer">Footer</footer>
  ';
  } else {
    echo '
    <form action="login.php" method="post">
  
  <input type="text" name="nome" placeholder="nome" aria-placeholder="nome">
  
  <input type="text" name="curso" placeholder="curso" aria-placeholder="curso">
  
  <input type="password" name="senha" placeholder="senha" aria-placeholder="senha">
      <input type="submit" value="Conectar">
    </form>
  ';
  }
  ?>
</body>

</html>

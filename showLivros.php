<?php
require "./connection.php";
if (!isset($_GET["cat"])) header("Location: ./index.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/admin.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/cards.css">
</head>

<body>
  <div class="logo"></div>
  <main class="main">
    <a href="./index.php">
      <button class="botao">
        Retornar aos links
      </button>
    </a>

    <section class="wrapper">
      <?php
      $query = $connection->query("SELECT lid, path, nome, descricao FROM livros WHERE categoria = " . $_GET["cat"] . ";");
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
      <a href="./download.php?id=' . $row["lid"] . '">
        <button class="downloadBtn">
          Baixar
        </button>
      </a>
      <a href="./readLivro.php?livro=' . $row["path"] . '">
        <button class="readBtn">
          Ler
        </button>
      </a>
    </section>
    ';
        }
      }
      ?>
    </section>
  </main>
</body>

</html>

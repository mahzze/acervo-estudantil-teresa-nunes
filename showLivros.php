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
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="./css/cards.css">
</head>

<body>
  <section class="wrapper">

    <?php
    $query = $connection->query("SELECT lid, nome, descricao FROM livros WHERE categoria = " . $_GET["cat"] . ";");
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
    </section>
    ';
      }
    }
    ?>
  </section>
</body>

</html>

<?php
require "./connection.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
  <section class="wrapper">
    
<?php
$result = $connection->query("SELECT lid, nome, descricao, FROM livros");
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
      <a href="./delLivro.php?id=' . $row["lid"] . '">
        <button class="deleteBtn">
          Deletar
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

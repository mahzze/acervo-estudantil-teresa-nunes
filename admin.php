<?php
session_start();
include("./connection.php");
if (!isset($_SESSION["admin"])) {
  header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Página de ADMIN</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="./css/admin.css" rel="stylesheet">
  <link href="./css/cards.css" rel="stylesheet">
</head>

<body>
  <section class="logo">Logo</section>
  <main class="main">
    <div id="modal">
      <form action="./addLivro.php" method="post" enctype="multipart/form-data">
        <input class="inp" id="nome" name="nome" type="text" placeholder="Nome do arquivo" aria-placeholder="Nome do arquivo" required />
        <textarea class="inp" id="desc" name="desc" placeholder="Descrição do arquivo" aria-placeholder="Descrição do arquivo" required> </textarea>
        <input class="inp" id="arquivo" name="arquivo" type="file" placeholder="Arquivo a ser disponibilizado" aria-placeholder="Arquivo a ser disponibilizado" required />
        <input class="submit" id="submit" type="submit" placeholder="Adicionar ao acervo" aria-placeholder="Adicionar ao acervo" required />
      </form>
    </div>
    <section class="botoes">
      <button id="addModal" onclick="addModal()">
        Adicionar arquivo
      </button>
      <a href="./logout.php">
        <button>
          Desconectar
        </button>
      </a>
    </section>
    <section class="wrapper">
      <?php
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
    <a href="./download.php?arquivo=' . $row["nome"] . '&id=' . $row["lid"] . '">    
      <button class="downloadBtn">
        Baixar
      </button>
    </a>
    <a href="./delLivro.php?arquivo=' . $row["nome"] . '&id=' . $row["lid"] . '">    
      <button class="deleteBtn">
        Deletar livro
      </button>
    </a>
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

      ?>
    </section>
  </main>
  <footer>
    Projeto desenvolvido por: mahzze
  </footer>
  <script src="./modal.js"></script>
</body>

</html>

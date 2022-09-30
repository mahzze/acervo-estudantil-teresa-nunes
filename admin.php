<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="./css/admin.css" rel="stylesheet">
</head>

<body>
  <div id="inputModal"></div>
  <header class="header">
    <button id="add" onclick="add()">
      Adicionar arquivo
    </button>
  </header>
  <section class="main">

    <?php
    session_start();
    include("./database and functions/connection.php");

    $query = $connection->prepare("SELECT * FROM livros");
    if ($query->bind_result($nome, $arquivo, $descricao)) {
      while ($query->fetch()) {

        echo '
  <section class="card">
    <div class="image">
      
    </div>
    <div class="nome">
      ' . $nome . '  
    </div>
    <div class="descricao">
      ' . $descricao . '
    </div>
    <button 
      class="downloadBtn" 
      href="' . $arquivo . '" 
      download="' . $nome . '"
    >
      Baixar
    </button>
  </section>
      ';
      }
    } else {
      echo '
  <div class="failure">
    Não existem livros salvos no banco de dados
  </div>';
    }

    ?>
  </section>
  <footer>
    Projeto desenvolvido por: mahzze
    <a href="https://github.com/mahzze/acervo-estudantil-teresa-nunes.git">Código fonte aqui</a>
  </footer>
  <script src="./database and functions/modal.js"></script>
</body>

</html>

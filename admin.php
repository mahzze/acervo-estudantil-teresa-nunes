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
    <div class="modal" id="modalCursos">
      <button id="close" onclick="closeModalCursos()"></button>
    </div>

    <div class="modal" id="modalArquivo">
      <button id="close" onclick="closeModalArquivo()"></button>
      <form action="./addLivro.php" method="post" enctype="multipart/form-data">
        <input id="nome" name="nome" type="text" placeholder="Nome do arquivo" aria-placeholder="Nome do arquivo" onchange="verifySubmit()" required />

        <textarea id="desc" name="desc" placeholder="Descrição do arquivo" aria-placeholder="Descrição do arquivo" onchange="verifySubmit()" required> </textarea>

        <input id="arquivo" name="arquivo" class="inputfile" type="file" placeholder="Arquivo a ser disponibilizado" aria-placeholder="Arquivo a ser disponibilizado" onchange="verifySubmit()" required />
        <label for="arquivo">
          <img class="upload-icon" src="arrow-up-from-bracket-solid.svg"></img>
          <span id="inputText">Escolha um arquivo</span>
        </label>

        <select id="categoria" name="categoria" placeholder="Categoria" onchange="verifySubmit()" required>
          <option value="" selected disabled>Escolha a categoria do livro</option>
          <option value="Humanas">Humanas</option>
          <option value="Exatas">Exatas</option>
          <option value="Biológicas">Biológicas</option>
          <option value="Cursos">Cursos</option>
          <option value="Diversos">Diversos</option>
        </select>

        <!-- ADICIONAR OPÇÕES DE CURSOS NO BANCO DE DADOS E UM FORM PARA ADICIONAR E REMOVER CURSOS -->
        <select id="curso" name="curso" placeholder="curso" onchange="verifySubmit()">
          <option value="" selected disabled>Escolha o curso</option>
          <?php
          $query = $connection->query("SELECT * FROM cursos ORDER BY curso");
          if ($query->num_rows > 0) {
            while ($curso = $query->fetch_assoc()) {
              echo '<option value = ' . $curso["curso"] . '> ' . $curso["curso"] . '</option>';
            }
          }
          ?>
        </select>

        <input class="submit" id="submit" type="submit" value="Adicionar ao acervo" aria-label="Adicionar ao acervo" />

      </form>
    </div>
    <section class="botoes">
      <button id="addModalArquivos" onclick="addModalArquivo()">
        Adicionar Arquivo
      </button>

      <button id="addModalCursos" onclick="addModalCursos()">
        Manusear Cursos
      </button>

      <a href="./index.php">
        <button>
          Retornar aos links
        </button>
      </a>

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
                   ' . $row["categoria"] . ' 
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
    Projeto desenvolvido por:<a href="https://github.com/mahzze"> mahzze</a>
  </footer>
  <script src="./modalArquivo.js"></script>
  <script src="./modalCurso.js"></script>
</body>

</html>

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
  <header class="logo"></header>
  <main class="main">
    <div class="modal" id="modalCursos">
      <button id="close" onclick="closeModalCursos()"></button>
      <div class="botoes">
        <button onclick="addCursoInput()">adicionar curso</button>
        <button onclick="delCursoInput()">remover curso</button>
      </div>
      <form id="addForm" action="./funcoesCursos.php" method="post">
        <input id="operacao" name="operacao" type="hidden" value="add" />
        <input id="nomeCurso" name="cursoInput" type="text" placeholder="Nome do curso" aria-placeholder="Nome do curso" onchange="verifySubmitCurso()" required />
        <input class="submitCurso" id="submitCursoAdd" type="submit" value="Adicionar Curso" aria-label="Adicionar curso" />
      </form>

      <form id="delForm" action="./funcoesCursos.php" method="post">
        <input id="operacao" name="operacao" type="hidden" value="del" />
        <select class="curso" id="select" name="cursoInput" placeholder="curso" onchange="verifySubmitCurso()" required>
          <option value="" selected disabled>Escolha o curso a ser removido</option>
          <?php
          $query = $connection->query("SELECT * FROM cursos ORDER BY curso");
          if ($query->num_rows > 0) {
            while ($curso = $query->fetch_assoc()) {
              echo '<option value = ' . $curso["curso"] . '> ' . $curso["curso"] . '</option>';
            }
          }
          ?>
        </select>
        <input class="submit" id="submitCursoDel" type="submit" value="Remover Curso" aria-label="Remover curso" />
      </form>
    </div>

    <div class="modal" id="modalArquivo">
      <button id="close" onclick="closeModalArquivo()"></button>
      <form action="./addLivro.php" method="post" enctype="multipart/form-data">
        <input id="nome" class="nome" name="nome" type="text" placeholder="Nome do arquivo" aria-placeholder="Nome do arquivo" onchange="verifySubmitArquivo()" required />

        <textarea id="desc" name="desc" placeholder="Descrição do arquivo" aria-placeholder="Descrição do arquivo" onchange="verifySubmitArquivo()" required> </textarea>

        <input id="arquivo" name="arquivo" class="inputfile" type="file" placeholder="Arquivo a ser disponibilizado" aria-placeholder="Arquivo a ser disponibilizado" onchange="verifySubmitArquivo()" required />
        <label for="arquivo">
          <img class="upload-icon" src="arrow-up-from-bracket-solid.svg"></img>
          <span id="inputText">Escolha um arquivo</span>
        </label>

        <select id="categoria" name="categoria" placeholder="Categoria" onchange="verifySubmitArquivo()" required>
          <option value="" selected disabled>Escolha a categoria do livro</option>
          <option value="Humanas">Humanas</option>
          <option value="Exatas">Exatas</option>
          <option value="Biológicas">Biológicas</option>
          <option value="Cursos">Cursos</option>
          <option value="Diversos">Diversos</option>
        </select>

        <select id="curso" class="curso" name="curso" placeholder="curso" onchange="verifySubmitArquivo()">
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

        <input class="submit" id="submitArquivo" type="submit" value="Adicionar ao acervo" aria-label="Adicionar ao acervo" />

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
      if ($query = $connection->query("SELECT * FROM livros ORDER BY categoria")) {
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
  <script src="./modais.js"></script>
</body>

</html>

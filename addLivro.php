<?php
require("./connection.php");

session_start();

if (!isset($_SESSION["admin"])) {
  header("Location: index.php");
}

if (!isset($connection)) {
  echo '<script type="text/javascript">window.alert("Há algo de errado na conexão com o banco de dados")</script>';
}

$targetDIR = "livros/";
$arquivo = $_FILES["arquivo"]["name"];
$path = pathinfo($arquivo);
$arq_nome = addslashes($path["filename"]);
$arq_ext  = $path["extension"];
$path_arquivo_extensao = $targetDIR . $arq_nome . "." . $arq_ext;

// verifica se o arquivo já existe na pasta ./livros/ e impede o upload caso já exista
if (file_exists($path_arquivo_extensao)) {
  echo '
  <script type="text/javascript">
    window.alert("arquivo ' . $path_arquivo_extensao . ' já existe, upload cancelado");  
  </script>
  ';
} else {
  if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $path_arquivo_extensao)) {
    echo '
    <script type="text/javascript">
      window.alert("upload executado com sucesso, arquivo salvo em: \n' . $path_arquivo_extensao . '");  
    </script>
    ';
  } else {
    echo '
    <script type="text/javascript">
      window.alert("Algo deu errado com o seu Upload");
    </script>
    ';
  }
}

// adiciona as informações ao banco de dados
// originalmente, isso só era executado quando
// o livro é adicionado à pasta livros, mas foi
// trocada para que mais de um curso possa acessar o mesmo livro  

if (file_exists($path_arquivo_extensao)) {
  $query = $connection->prepare("INSERT INTO livros (nome, descricao, categoria, tipo, path) VALUES (? , ?, ?, ?, ?);");

  if ($_POST["categoria"] != "Cursos") {
    $query->bind_param("sssss", $_POST["nome"], $_POST["desc"], $_POST["categoria"], $_FILES["arquivo"]["type"], $path_arquivo_extensao);
  } else {
    $query->bind_param("sssss", $_POST["nome"], $_POST["desc"], $_POST["curso"], $_FILES["arquivo"]["type"], $path_arquivo_extensao);
  }

  $query->execute();
}

header("Location: ./admin.php");

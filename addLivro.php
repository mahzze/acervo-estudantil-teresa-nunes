<?php
require("./connection.php");

session_start();

if (!isset($_SESSION["admin"])) {
  header("Location: index.php");
}

if (!isset($connection)) {
  echo '<script type="text/javascript">window.alert("Há algo de errado na conexão com o banco de dados")</script>';
}

//onde o arquivo será salvo
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

    // adiciona informações sobre os livros no banco de dados
    $query = $connection->prepare("INSERT INTO livros (nome, descricao, tipo, path) VALUES (? , ?, ?, ?);");
    $query->bind_param("ssss", $_POST["nome"], $_POST["desc"], $_FILES["arquivo"]["type"], $path_arquivo_extensao);
    $query->execute();
  }
}
header("Location: ./admin.php");

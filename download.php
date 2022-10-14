<?php
require "./connection.php";

if (isset($_GET['arquivo']) && isset($_GET['id'])) {

  $filename = $_GET['arquivo'];
  $livro_id = $_GET['id'];

  $query = $connection->query("SELECT arquivo, tipo FROM livros WHERE nome = '" . $filename . "' and lid = " . $livro_id . ";");
  // if ($query->num_rows > 0) {
  // $row = $query->fetch_object();

  // método que faz uso do file system.
  //   header('Content-Description: File Transfer');
  //   header('Content-Type: application/' . $row->tipo);
  //   header("Cache-Control: no-cache, must-revalidate");
  //   header("Expires: 0");
  //   header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
  //   header('Content-Length: ' . filesize($filename));
  //   header('Pragma: public');

  //   flush();
  //   readfile($filename);
  // } else {
  //   echo "Arquivo requisitado não existe.";
  // }
} else {
  echo "Algo deu errado, essa pagina não deveria ser acessada sem as variaveis estarem setadas, volte à pagina anterior";
}

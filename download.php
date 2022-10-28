<?php
require "./connection.php";

if (isset($_GET['id'])) {

  $livro_id = $_GET['id'];

  $query = $connection->query("SELECT path, tipo FROM livros WHERE lid = " . $livro_id . ";");
  if ($query->num_rows > 0) {
    $row = $query->fetch_object();
    chmod("livros/", 0777);
    // método que faz uso do file system.
    header('Content-Description: File Transfer');
    header('Content-Type: ' . $row->tipo);
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: 0");
    header('Content-Disposition: attachment; filename="' . basename($row->path) . '"');
    header('Content-Length: ' . filesize($row->path));
    header('Pragma: public');

    flush();
    readfile($row->path);
  } else {
    echo "Arquivo requisitado não existe.";
  }
} else {
  echo "Algo deu errado, essa pagina não deveria ser acessada sem as variaveis estarem setadas, volte à pagina anterior";
}

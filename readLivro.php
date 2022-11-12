<?php
$filename = $_GET["livro"];

header("Content-type: application/pdf");

header("Content-Length: " . filesize($filename));

readfile($filename);

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acervo Digital TN</title>
  <link rel="stylesheet" href="./css/index.css">
</head>

<body>
  <?php
  if (isset($_SESSION["logged"])) {
    $content = ' <a href="./logout.php"><button>Desconectar</button></a>';
    if (isset($_SESSION["admin"])) {
      $content += '<a href="./admin.php"><button>admin page</button></a>';
    }
  } else {
    $content = '<a href="./loginForm.html"><button></button></a>';
  }

  echo $content;
?>
  
  <a href="./showLivros.php?cat='humanas'"><button>Humanas</button></a>
  <a href="./showLivros.php?cat='exatas'"><button>Exatas</button></a>
  <a href="./showLivros.php?cat='biologicas'"><button>Biologicas</button></a>
  <a href="./showLivros.php?cat='curso'"><button>Cursos</button></a>
  <a href="./showLivros.php?cat='diverso'"><button>Diversos</button></a>

  </body>

</html>

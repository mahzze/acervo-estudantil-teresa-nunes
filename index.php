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
      $content = $content . '<a href="./admin.php"><button>admin page</button></a>';
    }
  } else {
    $content = '<a href="./loginForm.html"><button>Login</button></a>';
  }

  echo $content;
  ?>

  <a href="./showLivros.php?cat='Humanas'"><button>Humanas</button></a>
  <a href="./showLivros.php?cat='Exatas'"><button>Exatas</button></a>
  <a href="./showLivros.php?cat='Biologicas'"><button>Biologicas</button></a>
  <a href="./showLivros.php?cat='Curso'"><button>Cursos</button></a>
  <a href="./showLivros.php?cat='Diversos'"><button>Diversos</button></a>

</body>

</html>

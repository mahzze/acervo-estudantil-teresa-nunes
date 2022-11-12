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
    if (isset($_SESSION["admin"])) {
      $content = '<a href="./admin.php"><button>admin page</button></a>';
    }
    $content = $content . ' <a href="./logout.php"><button>Desconectar</button></a>';
  } else {
    $content = '<a href="./loginForm.html"><button>Login</button></a>';
  }
  ?>

  <a href="./showLivros.php?cat='Humanas'"><button>Humanas</button></a>
  <a href="./showLivros.php?cat='Exatas'"><button>Exatas</button></a>
  <a href="./showLivros.php?cat='Biologicas'"><button>Biologicas</button></a>
  <?php
  if (isset($_SESSION["curso"])) {
    echo '
    <a href="./showLivros.php?cat=' . $_SESSION["curso"] . '"><button>Cursos</button></a>
    <a href="./showLivros.php?cat=' . "Diversos" . '"><button>Diversos</button></a>
  ';
  }
  echo $content;
  ?>
</body>

</html>

<?php
require "./connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acervo Digital</title>
  <link rel="stylesheet" href="./css/registro.css">
</head>

<body>
  <form action="./registro.php" method="post">
    <input class="input" type="text" name="nome" placeholder="nome" aria-placeholder="nome" maxlength="45" required aria-required="true">
    <input class="input" type="email" name="email" placeholder="email" aria-placeholder="email" maxlength="45" required aria-required="true">
    <div class="selectAndLabelWrapper">
      <label class="label" for="curso">Curso</label>
      <select class="select" id="curso" name="curso" placeholder="curso" onchange="verifySubmit()">
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
    </div>
    <input class="input" type="password" name="senha" placeholder="senha" aria-placeholder="senha" maxlength="60" required aria-required="true">
    <input class="submit" type="submit" value="Cadastrar">
  </form>
</body>

</html>

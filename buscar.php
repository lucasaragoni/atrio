<?php
session_start();
require("admin/connections/conn.php"); // Certifique-se de que este caminho está correto

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Busca | Atrío</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="icon" type="icon" href="img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a9ea9c7a68.js" crossorigin="anonymous"></script>
</head>

<body>

  <?php include("includes/menu.php") ?>

  <?php include("includes/header.php") ?>

    <div class="conteudo">
        <div class="container">
            <h2><a href="perfilusuario.php"><i class="fa-solid fa-arrow-left"></i></a> <b>Resultados</b> da Busca</h2>
            <?php
            if (isset($_GET['query']) && !empty($_GET['query'])) {
                $query = mysqli_real_escape_string($conn, $_GET['query']);
                $sql = "SELECT * FROM usuarios WHERE (tipoperfil = 2) AND (razaosocial LIKE '%$query%' OR resumo or cidade or nome LIKE '%$query%')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        echo "<div class='row'>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<div class='col-md-4'>";
                            echo "<div class='unidade'>";
                            echo "<img src='admin/uploads/avatar/" . htmlspecialchars($row['fotoperfil']) . "' alt=''>";
                            echo "<div class='texto-unidade'>";
                            echo "<h6>" . htmlspecialchars($row['razaosocial']) . "</h6>";
                            echo "<a href='querodoar.php?id=$row[id]'>Quero Doar</a>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                        echo "</div>";
                    } else {
                        echo "<p>Nenhum hemocentro encontrado para o termo '$query'.</p>";
                    }
                } else {
                    echo "<p>Erro na execução da consulta: " . mysqli_error($conn) . "</p>";
                }
            } else {
                echo "<p>Por favor, insira um termo de busca.</p>";
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/loading.js"></script>
</body>

</html>

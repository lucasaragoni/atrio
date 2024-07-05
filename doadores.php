<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atrío | Endereços Hemocenttro</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/hemocentro.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="icon" type="icon" href="img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a9ea9c7a68.js" crossorigin="anonymous"></script>

</head>

<body>



    <?php include("includes/menu.php") ?>
    <?php include("includes/header-home.php") ?>


    <div class="container">
        <div class="busca">
            <form method="GET" action="buscar.php">
                <input type="text" name="query" placeholder="Quer procurar um doador próximo a você ?">
                <div class="busca-botao">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                </div>
            </form>
        </div>
    </div>




    <div class="conteudo">



        <div class="container">
            <div class="pontuacao raking">
                <h2>Lista de Doadores</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Idade</th>
                            <th scope="col">Cidade</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        require("admin/connections/conn.php");
                        $sql = "select * from usuarios where tipoperfil = 1";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo"<tr>";
                            echo"<th scope='row'>$row[nome]</th>";
                            echo"<td>$row[idade]</td>";
                            echo"<td>$row[cidade] - $row[uf]</td>";
                        echo"</tr>";

                        }
                        ?>

                    </tbody>
                </table>
            </div>

        </div>




    </div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/loading.js"></script>
</body>

</html>
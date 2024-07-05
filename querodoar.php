<?php
session_start()

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atrío | Doação</title>
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

    <?php include("includes/header.php") ?>


    <div class="container p-10 destaque">


        <div class="row align-items-center">
            <div class="col-md-6">
                <?php
                require("admin/connections/conn.php");
                $doador = $_SESSION['usuarioId'];
                $nome = $_SESSION['usuarioNome'];
                $pegaid = (int)$_GET['id'];
                $sql = "select * from usuarios where id = $pegaid";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {

                    echo "<img src='admin/uploads/avatar/$row[fotoperfil]' alt=''>";
                    echo "</div>";
                    echo "<div class='col-md-6'>";
                    echo "<div class='destaque-hemo'>";
                    echo "<h1><b>$row[razaosocial]</b></h1>";
                    echo "<h3>$row[rua]</h3>";
                    echo "<h5>$row[cidade] - $row[uf]</h5>";
                    echo "<p>$row[resumo]</p>";


                    echo "<form class='card-body' action='admin/functions/doar.php' enctype='multipart/form-data' method='post'>";

                    echo "<div class='form-group row'>
                        <div class='col-sm-10'>";
                    echo "<input class='form-control' name='nome' value='$nome' type='hidden'  placeholder='Título' id='example-text-input'>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='form-group row'>
                    <div class='col-sm-10'>";
                    echo "<input class='form-control' name='hemocentro' value='$row[razaosocial]' type='hidden'  placeholder='Título' id='example-text-input'>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='form-group row'>
                    <div class='col-sm-10'>";
                    echo "<input class='form-control' name='doadopor' value='$doador' type='hidden'  placeholder='Título' id='example-text-input'>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='form-group row'>
                    <div class='col-sm-10'>";
                    echo "<input class='form-control' name='recebidopor' value='$pegaid' type='hidden'  placeholder='Título' id='example-text-input'>";
                    echo "</div>";
                    echo "</div>";









                    echo "<div class='form-group row'>";
                    echo "<div class='col-sm-12'>";
                    echo "<a href='admin/functions/doar.php'><button type='submit' class='prioridade'>Fazer doação</button></a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</form>";
                }
                ?>


            </div>


        </div>








        <div class="row l-2 mt-5 mb-5">


            <h2>Também pode realizar a doação <b>nesses hemocentros</b></h2>


            <?php
            require("admin/connections/conn.php");
            $sql = "select * from usuarios where tipoperfil = 2 limit 4";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {

                echo "<div class='col-md-3'>";
                echo "<div class='unidade'>";
                echo "<img src='admin/uploads/avatar/$row[fotoperfil]' alt=''>";
                echo "<div class='texto-unidade'>";
                echo "<h6>$row[razaosocial]</h6>";
                echo "<p>$row[cidade] - $row[uf]</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>


        </div>




        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="js/loading.js"></script>
</body>

</html>
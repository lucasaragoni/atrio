<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atrío | Perfil Usuário</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="icon" type="icon" href="img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a9ea9c7a68.js" crossorigin="anonymous"></script>

</head>

<body>


    <?php include("includes/menu.php") ?>

    <?php include("includes/header-home.php") ?>


    <div class="conteudo">






        <div class="hemocentros">

            <div class="container">
                <div class="row">

                    <div class='col-md-6'>
                        <a href='hemocentros.php'>
                            <div class='unidade'>
                                <img src='img/hemo-home.jpg' alt=''>
                                <div class='texto-unidade'>
                                    <h6>Hemocentros</h6>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class='col-md-6'>
                        <a href="pontuacaousuario.php">
                            <div class='unidade'>
                                <img src='img/pontuacao.jpg' alt=''>
                                <div class='texto-unidade'>
                                    <h6>Pontuação</h6>
                                </div>
                            </div>
                        </a>
                    </div>



                </div>
                <div class="row">

                    <div class='col-md-6'>
                        <a href="https://www.prosangue.sp.gov.br/home/" target="_blank">
                            <div class='unidade'>
                                <img src='img/institucional.jpg' alt=''>
                                <div class='texto-unidade'>
                                    <h6>Institucional</h6>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class='col-md-6'>

                        <a href="hemocentros.php">
                            <div class='unidade'>
                                <img src='img/health.jpg' alt=''>
                                <div class='texto-unidade'>
                                    <h6>Doação de sangue</h6>

                                </div>
                            </div>
                        </a>
                    </div>



                </div>
            </div>





        </div>




    </div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/loading.js"></script>
</body>

</html>
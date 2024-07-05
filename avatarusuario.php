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
    <link rel="stylesheet" href="css/usuario.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="icon" type="icon" href="img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a9ea9c7a68.js" crossorigin="anonymous"></script>

</head>

<body>



    <div class="menu">
        <ul>
            <li class="menu-item active"><i class="fa-solid fa-house"></i> Home</li>
            <li class="menu-item"><i class="fa-solid fa-hotel"></i> Hemocentros</li>
            <li class="menu-item"><i class="fa-solid fa-trophy"></i> Pontuação</li>
            <li class="menu-item"><i class="fa-solid fa-circle-user"></i> Perfil</li>
        </ul>
    </div>

    <header>
        <div class="content-header">

            <?php
            require("admin/connections/conn.php");
            $idusuariologado = $_SESSION['usuarioId'];
            $sql = "select * from usuarios where id = $idusuariologado";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {

                echo "<div class='perfil'>";
                echo "<a href='admin/functions/fotoperfil.php'><img src='img/profile.png' alt=''></a>";
                echo "</div>";
                echo "<div class='perfil-texto'>";
                echo "<h2>Bem vinda ao Átrio, <b>$row[nome]</b></h2>";
                echo "<a href='cadastrousuario.php'>Editar Perfil</a> | <a href='admin/functions/sair.php'>Sair</a>";
                echo "</div>";
            }
            ?>



        </div>
    </header>

    <div class="conteudo">

        <form action="admin/functions/fotoperfil.php" enctype="multipart/form-data" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <h4 class="mt-0 header-title">Troque sua foto de perfil</h4>
                    </div>
                </div>
            </div>

            <div class="form-group col-12">

                <?php
                require("admin/connections/conn.php");

                $idusuariologado = $_SESSION['usuarioId'];
                $sql = "select * FROM usuarios where id = '$idusuariologado'";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['fotoperfil'] == '') {
                        echo "<img src='img/imagem-cadastrada.png' class='img-fluid'>";
                        echo "<input type='hidden' name='id' value='$row[id]'>";
                        echo "<br/><br/>";
                    } else {
                        echo "<img src='admin/uploads/avatar/$row[fotoperfil]' class='img-fluid'>";
                        echo "<input type='hidden' name='id' value='$row[id]'>";
                        echo "<br/><br/>";
                    }
                }
                mysqli_close($conn);
                ?>

                <div class="m-b-30">
                    <form action="#" class="dropzone">
                        <div class="fallback">
                            <input name="arquivo" type="file" multiple="multiple">
                        </div>
                    </form>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12 mt-5">
                        <button type='submit' class='prioridade'>Atualizar
                            imagem
                        </button>
                    </div>
                </div>
        </form>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/loading.js"></script>
</body>

</html>
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
    <link rel="icon" type="icon" href="img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a9ea9c7a68.js" crossorigin="anonymous"></script>

</head>

<body>


    <?php include("includes/menu.php") ?>

    <?php include("includes/header.php") ?>

    <div class="conteudo">

        <?php
        require("admin/connections/conn.php");
        $idusuariologado = $_SESSION['usuarioId'];
        $sql = "select * from usuarios where id = $idusuariologado";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            if ($row['cpf'] == null) {
                echo "<div class='alert alert-danger' role='alert'>Você não preencheu o campo CPF. <a href='cadastrousuario.php'>Clique aqui</a> para atualizar dados</div>";
            }

            if ($row['idade'] == null) {
                echo "<div class='alert alert-danger' role='alert'>Você não preencheu o campo idade. <a href='cadastrousuario.php'>Clique aqui</a> para atualizar dados</div>";
            }

            if ($row['genero'] == null) {
                echo "<div class='alert alert-danger' role='alert'>Você não preencheu o campo genêro. <a href='cadastrousuario.php'>Clique aqui</a> para atualizar dados</div>";
            }

            if ($row['tiposangue'] == null) {
                echo "<div class='alert alert-danger' role='alert'>Você não preencheu o campo Tipo Sanguíneo. <a href='cadastrousuario.php'>Clique aqui</a> para atualizar dados</div>";
            }

            if ($row['cep'] == null) {
                echo "<div class='alert alert-danger' role='alert'>Você não preencheu o campo CEP. <a href='cadastrousuario.php'>Clique aqui</a> para atualizar dados</div>";
            }
        }
        ?>






        <div class="hemocentros">

            <div class="container">
                <h2><b>Hemocentros</b> que precisam do seu tipo sangue</h2>
                <div class="row">

                    <?php
                    require("admin/connections/conn.php");
                    $sql = "select * from usuarios where tipoperfil = 2 limit 3";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo "<div class='col-md-4'>";
                        echo "<div class='unidade'>";
                        echo "<img src='admin/uploads/avatar/$row[fotoperfil]' alt=''>";
                        echo "<div class='texto-unidade'>";
                        echo "<h6>$row[razaosocial]</h6>";
                        echo "<p>Pouco estoque de sangue TIPO A</p>";

                        echo "<a href='querodoar.php?id=$row[id]'>Quero Doar</a>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                    ?>


                </div>
            </div>





        </div>



        <div class="container">
            <div class="busca">
                <form method="GET" action="buscar.php">
                    <input type="text" name="query" placeholder="Quer procurar um hemocentro próximo a você ?">
                    <div class="busca-botao">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                    </div>
                </form>
            </div>
        </div>



        <div class="container mb-5">
            <div class="pontuacao mb-5">
                <h2>Última doação</h2>
                <div class="lista-destaque">




                    <div class="info-destaque">

                        <div class="row align-items-center ">
                            <div class="col-md-6 perfil-lugar">
                                <?php
                                require("admin/connections/conn.php");
                                $pegaid = $_SESSION['usuarioId'];

                                $sql = "SELECT u.id AS uid, u.fotoperfil AS ufotoperfil, u.nome AS unome, d.id AS did, d.datadoacao AS ddatadoacao, d.doadopor AS ddoadopor, p.id AS pid, p.quemdou AS pquemdou, p.pontuacao AS ppontuacao FROM usuarios u LEFT JOIN doacao d ON u.id = d.doadopor LEFT JOIN pontuacao p ON u.id = p.quemdou WHERE u.id = $pegaid LIMIT 1 ";

                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $data_formatada = date('d/m/Y', strtotime($row['ddatadoacao']));
                                    echo "<img src='admin/uploads/avatar/$row[ufotoperfil]' alt=''>";
                                    echo "<div class='texto-destaque'>";
                                    echo "<h3><span>$row[unome]</span></h3>";
                                    echo "<h5>Última doação: <b>{$data_formatada}</b></h5>";
                                    echo "</div>";
                                    echo "</div>";

                                    echo "</div>";
                                }
                                ?>

                            </div>





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
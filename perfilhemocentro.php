<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atrío | Perfil Hemocenttro</title>
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

    <div class="container">
        <?php
        require("admin/connections/conn.php");
        $idusuariologado = $_SESSION['usuarioId'];
        $sql = "select * from usuarios where id = $idusuariologado";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            if ($row['razaosocial'] == null) {
                echo "<div class='alert alert-danger' role='alert'>Você não preencheu o campo Razão Social. <a href='cadastrohemocentro.php'>Clique aqui</a> para atualizar dados</div>";
            }

            if ($row['cnpj'] == null) {
                echo "<div class='alert alert-danger' role='alert'>Você não preencheu o campo CNPJ. <a href='cadastrohemocentro.php'>Clique aqui</a> para atualizar dados</div>";
            }

            if ($row['cep'] == null) {
                echo "<div class='alert alert-danger' role='alert'>Você não preencheu o campo CEP. <a href='cadastrohemocentro.php'>Clique aqui</a> para atualizar dados</div>";
            }
        }
        ?>


        <div class="row mt-5">

            <h2 class="l-2"><strong>Doadores</strong> que querem doar</h2>

            <?php
            require("admin/connections/conn.php");
            $sql = "SELECT u.id AS uid, u.nome AS unome, u.razaosocial AS urazaosocial, u.tiposangue AS utiposangue, u.fotoperfil AS ufotoperfil, d.id AS did, d.doadopor AS ddoadopor, d.recebidopor AS drecebidopor, d.statussangue AS dstatussangue FROM usuarios u INNER JOIN doacao d ON d.doadopor = u.id and d.statussangue = 0 limit 4";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                

                echo "<div class='col-md-3'>";
                echo "<div class='unidade'>";
                echo "<img src='admin/uploads/avatar/$row[ufotoperfil]' alt=''>";
                echo "<div class='texto-unidade'>";
                echo "<h6>$row[unome]</h6>";
                echo "<p>$row[utiposangue]</p>";
                echo "<a href='admin/functions/aprovardoacao.php?id=$row[did]'>Aprovar</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>


        </div>

        <div class="banco-de-sangue raking l-2">

            <h2><b>Banco</b> de Sangue</h2>

            <div class="row l-2">
                <div class="col-md-3">
                    <div class="tipo-sangue">
                        <img src="img/sangue.png" alt="">
                        <h2><b>Tipo A+</b></h2>
                        <p>Em estoque</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="tipo-sangue">
                        <img src="img/sangue.png" alt="">
                        <h2><b>Tipo A-</b></h2>
                        <p>Em estoque</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="tipo-sangue">
                        <img src="img/sangue.png" alt="">
                        <h2><b>Tipo B+</b></h2>
                        <p>Em estoque</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="tipo-sangue">
                        <img src="img/sangue.png" alt="">
                        <h2><b>Tipo B-</b></h2>
                        <p>Em estoque</p>
                    </div>
                </div>
            </div>

            <div class="row l-2">
                <div class="col-md-3">
                    <div class="tipo-sangue">
                        <img src="img/sangue.png" alt="">
                        <h2><b>Tipo AB+</b></h2>
                        <p>Em estoque</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="tipo-sangue">
                        <img src="img/sangue.png" alt="">
                        <h2><b>Tipo AB-</b></h2>
                        <p>Em estoque</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="tipo-sangue">
                        <img src="img/sangue.png" alt="">
                        <h2><b>Tipo O+</b></h2>
                        <p>Em estoque</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="tipo-sangue">
                        <img src="img/sangue.png" alt="">
                        <h2><b>Tipo O-</b></h2>
                        <p>Em estoque</p>
                    </div>
                </div>
            </div>




            <button class="prioridade">Solicitar prioridade</button>

        </div>



    </div>








    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/loading.js"></script>
</body>

</html>
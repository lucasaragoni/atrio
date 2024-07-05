<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atrío | Cadastro Hemocentro</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="icon" type="icon" href="img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a9ea9c7a68.js" crossorigin="anonymous"></script>

</head>

<body>

     <?php include("includes/header.php") ?>


    <div class="formulario">
        <div class="container">
            <form action="admin/functions/atualizar_hemocentro.php" method="post">

                <?php
                require("admin/connections/conn.php");
                $idusuariologado = $_SESSION['usuarioId'];
                $sql = "select * from usuarios where id = $idusuariologado";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='form-group'>";

                    echo "<input type='hidden' name='id' value='$row[id]' />";

                    echo "<div class='row'>";
                    echo "<div class='col-md-6'>";
                    echo "<label>Nome: </label><br>";
                    echo "<input type='text' name='nome' value='$row[nome]' placeholder='Insira seu nome'>";
                    echo "</div>";
                    echo "<div class='col-md-6'>";
                    echo "<label>Razão Social: </label><br>";
                    echo "<input type='text' name='razaosocial' value='$row[razaosocial]' placeholder='Insira sua razão social'>";
                    echo "</div>";
                    echo "</div>";

                    echo "</div>";

                    echo "<div class='form-group'>";
                    echo "<div class='row'>";
                    echo "<div class='col-md-12'>";
                    echo "<label>Email: </label><br>";
                    echo "<input type='email' name='email' value='$row[email]' placeholder='Insira sua idade'>";
                    echo "</div>";
                    echo "</div>";


                    echo "</div>";



                    echo "<div class='form-group'>";
                    echo "<label>CNPJ: </label><br>";
                    echo "<input type='text' name='cnpj' value='$row[cnpj]' placeholder='Insira seu CNPJ'>";

                    echo "</div>";

                    echo "<div class='form-group'>";
                    echo "<label>CEP: </label><br>";
                    echo "<input type='text' value='$row[cep]' placeholder='Insira seu CEP' name='cep' type='text' id='cep' value='' size='10' maxlength='9' onblur='pesquisacep(this.value)'>";



                    echo "</div>";

                    echo "<div class='form-group'>";

                    echo "<div class='row'>";
                    echo "<div class='col-md-6'>";
                    echo "<input name='rua' type='text' id='rua' value='$row[rua]' size='60' placeholder='Rua'>";
                    echo "</div>";
                    echo "<div class='col-md-6'>";
                    echo "<input name='bairro' type='text' id='bairro' value='$row[bairro]' size='40' placeholder='Bairro'>";
                    echo "<input name='ibge' type='hidden' id='ibge' size='40' placeholder='Bairro'>";
                    echo "</div>";
                    echo "</div>";

                    echo "</div>";
                    echo "<div class='form-group'>";

                    echo "<div class='row'>";
                    echo "<div class='col-md-6'>";
                    echo "<input name='cidade' type='text' id='cidade' value='$row[cidade]' size='40' placeholder='cidade'>";
                    echo "</div>";
                    echo "<div class='col-md-6'>";
                    echo "<input name='uf' type='text' id='uf' value='$row[uf]' size='2' placeholder='UF'>";
                    echo "</div>";
                    echo "</div>";

                    echo "</div>";
                }
                ?>














                <button type="submit" class="entrar">Atualizar</button>
            </form>
        </div>
    </div>



    <script src="js/buscacep.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/loading.js"></script>
</body>

</html>
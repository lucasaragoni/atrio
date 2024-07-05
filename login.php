<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atrío | Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="icon" href="img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a9ea9c7a68.js" crossorigin="anonymous"></script>

</head>

<body>


    <div class="container">
        <div class="content">
            <div class="logo">
                <img src="img/logo.png" alt="">
                <p>O <span>amor</span> corre nas <span>veias.</span>
                    Doe <span>sangue</span> e espalhe <span>amor.</span></p>
            </div>

            <div class="formulario">
                <form action="admin/functions/valida.php" method="post">
                    
                    <div class="form-group">
                        <label>Usuário:</label> <br>
                        <input type="email" name="email" placeholder="Insira seu email" required>
                    </div>

                    <div class="form-group">
                        <label>Senha: </label><br>
                        <input type="password" name="senha" placeholder="Insira sua senha" required>
                    </div>

                    <div class="info">
                        <a href="cadastro.php" class="cadastro">Cadastrar-se</a>
                        <a href="esquecisenha.php" class="senha">Esqueci minha senha</a>
                    </div>

                    <button type="submit" class="entrar">Entrar</button>
                </form>
            </div>


            <div class="institucional">
                <p>Para saber mais sobre o nosso projeto <a href="institucional.html">Clique aqui</a></p>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="js/loading.js"></script>
</body>

</html>
<nav class="navbar fixed-bottom navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand menu-item" href="home.php"><i class="fa-solid fa-house"></i> Home</a>

        <?php
        require("admin/connections/conn.php");

        if (isset($_SESSION['tipoperfil'])) {
            $usuario = $_SESSION['tipoperfil'];

            if ($usuario == 1) {
                echo"<a class='navbar-brand menu-item' href='hemocentros.php'><i class='fa-solid fa-hotel'></i> Hemocentros</a>";
            } else {
                echo"<a class='navbar-brand menu-item' href='doadores.php'><i class='fa-solid fa-users'></i> Doadores</a>";
            }
        } else {
            // Caso não tenha a sessão 'tipoperfil', você pode redirecionar para login ou mostrar uma mensagem
            echo "<a class='navbar-brand menu-item' href='login.php'><i class='fa-solid fa-circle-user'></i> Perfil</a>";
        }
        ?>



        <?php
        require("admin/connections/conn.php");

        if (isset($_SESSION['tipoperfil'])) {
            $usuario = $_SESSION['tipoperfil'];

            if ($usuario == 1) {
                echo "<a class='navbar-brand menu-item' href='perfilusuario.php'><i class='fa-solid fa-circle-user'></i> Perfil</a>";
            } else {
                echo "<a class='navbar-brand menu-item' href='perfilhemocentro.php'><i class='fa-solid fa-circle-user'></i> Perfil</a>";
            }
        } else {
            // Caso não tenha a sessão 'tipoperfil', você pode redirecionar para login ou mostrar uma mensagem
            echo "<a class='navbar-brand menu-item' href='login.php'><i class='fa-solid fa-circle-user'></i> Perfil</a>";
        }
        ?>
    </div>
</nav>

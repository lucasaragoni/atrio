<header>

    <div class="container">


        
        <div class="row mt-5">
        <?php
        require("admin/connections/conn.php");
        $idusuariologado = $_SESSION['usuarioId'];
        $sql = "select * from usuarios where id = $idusuariologado";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            echo "<div class='perfil'>";
            echo "<div class='perfil-foto'>";
            echo "<img src='admin/uploads/avatar/$row[fotoperfil]' alt=''>";
            echo "</div>";
            echo "<div class='perfil-texto'>";
            echo "<h2>Bem Vindo, <b>$row[nome]</b></h2>";
            echo "</div>";
        }
        echo "</div>";

        ?>
        </div>

    </div>

</header>
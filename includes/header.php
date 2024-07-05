<header class="content-header">


    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 col-sm-12">
                <?php
                require("admin/connections/conn.php");
                $idusuariologado = $_SESSION['usuarioId'];
                $tipoperfil = $_SESSION['tipoperfil'];
                $sql = "select * from usuarios where id = $idusuariologado";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {

                    echo "<div class='perfil'>";
                    echo "<a href='avatarusuario.php'><img src='admin/uploads/avatar/$row[fotoperfil]' alt=''></a>";
                    echo "<div class='perfil-texto'>";
                    echo "<h2><b>$row[nome]</b></h2>";

                    if($tipoperfil == 1){
                        echo "<a href='cadastrousuario.php'><i class='fa-solid fa-pen'></i> Editar Perfil</a> | <a href='admin/functions/sair.php'><i class='fa-solid fa-xmark'></i> Sair</a>";
                    }else{
                        echo "<a href='cadastrohemocentro.php'><i class='fa-solid fa-pen'></i> Editar Perfil</a> | <a href='admin/functions/sair.php'><i class='fa-solid fa-xmark'></i> Sair</a>";
                    }

                    echo "</div>";
                }
                    echo "</div>";

                ?>
            </div>





                </div>
            </div>
        </div>
    </div>

</header>
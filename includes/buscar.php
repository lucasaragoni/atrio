<div class="conteudo">
        <div class="container">
            <h2><a href="perfilusuario.php"><i class="fa-solid fa-arrow-left"></i></a> <b>Resultados</b> da Busca</h2>
            <?php
            if (isset($_GET['query']) && !empty($_GET['query'])) {
                $query = mysqli_real_escape_string($conn, $_GET['query']);
                $sql = "SELECT * FROM usuarios WHERE (tipoperfil = 2) AND (razaosocial LIKE '%$query%' OR resumo LIKE '%$query%')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        echo "<div class='row'>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<div class='col-md-4'>";
                            echo "<div class='unidade'>";
                            echo "<img src='admin/uploads/avatar/" . htmlspecialchars($row['fotoperfil']) . "' alt=''>";
                            echo "<div class='texto-unidade'>";
                            echo "<h6>" . htmlspecialchars($row['razaosocial']) . "</h6>";
                            echo "<p>Pouco estoque de sangue TIPO A</p>";
                            echo "<a href='querodoar.php'>Quero Doar</a>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                        echo "</div>";
                    } else {
                        echo "<p>Nenhum hemocentro encontrado para o termo '$query'.</p>";
                    }
                } else {
                    echo "<p>Erro na execução da consulta: " . mysqli_error($conn) . "</p>";
                }
            } else {
                echo "<p>Por favor, insira um termo de busca.</p>";
            }
            ?>
        </div>
    </div>
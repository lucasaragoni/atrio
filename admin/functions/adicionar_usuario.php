<?php
require("../connections/conn.php");

// Verificar se todas as variáveis POST necessárias estão definidas
if (isset($_POST['email'], $_POST['nome'], $_POST['senha'], $_POST['tipoperfil'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    $senha = md5($senha);
    $tipoperfil = (int)$_POST['tipoperfil']; // Convertendo tipoperfil para int

    if ($tipoperfil == 1) {
        // Verificar se o email já existe na tabela usuarios
        $sql_check = "SELECT * FROM usuarios WHERE email = ? LIMIT 1";
        $stmt_check = mysqli_prepare($conn, $sql_check);

        if ($stmt_check) {
            mysqli_stmt_bind_param($stmt_check, 's', $email);
            mysqli_stmt_execute($stmt_check);
            $result_check = mysqli_stmt_get_result($stmt_check);
            $email_exists = mysqli_fetch_assoc($result_check);
            mysqli_stmt_close($stmt_check);

            if ($email_exists) {
                // Se o email já existe, exibe uma mensagem de erro
                echo "
                    <META HTTP-EQUIV=REFRESH CONTENT='0;URL=../../cadastro.php'>
                    <script type='text/javascript'>
                        alert('O email já está cadastrado');
                    </script>
                ";
            } else {
                // Se o email não existe, insere o novo usuário
                $sql_insert = "INSERT INTO usuarios (tipoperfil, nome, email, senha) VALUES (?, ?, ?, ?)";
                $stmt_insert = mysqli_prepare($conn, $sql_insert);

                if ($stmt_insert) {
                    mysqli_stmt_bind_param($stmt_insert, 'isss', $tipoperfil, $nome, $email, $senha);
                    if (mysqli_stmt_execute($stmt_insert)) {
                        echo "<meta http-equiv='refresh' content=0;url='../../login.php'>";
                    } else {
                        die('Error: ' . mysqli_error($conn));
                    }
                    mysqli_stmt_close($stmt_insert);
                } else {
                    die('Error: ' . mysqli_error($conn));
                }
            }
        } else {
            die('Error: ' . mysqli_error($conn));
        }
    } else {
        // Verificar se o email já existe na tabela hemocentro
        $sql_check = "SELECT * FROM hemocentros WHERE email = ? LIMIT 1";
        $stmt_check = mysqli_prepare($conn, $sql_check);

        if ($stmt_check) {
            mysqli_stmt_bind_param($stmt_check, 's', $email);
            mysqli_stmt_execute($stmt_check);
            $result_check = mysqli_stmt_get_result($stmt_check);
            $email_exists = mysqli_fetch_assoc($result_check);
            mysqli_stmt_close($stmt_check);

            if ($email_exists) {
                // Se o email já existe, exibe uma mensagem de erro
                echo "
                    <META HTTP-EQUIV=REFRESH CONTENT='0;URL=../../cadastro.php'>
                    <script type='text/javascript'>
                        alert('O email já está cadastrado');
                    </script>
                ";
            } else {
                // Se o email não existe, insere o novo usuário
                $sql_insert = "INSERT INTO hemocentros (nome, email, senha) VALUES (?, ?, ?)";
                $stmt_insert = mysqli_prepare($conn, $sql_insert);

                if ($stmt_insert) {
                    mysqli_stmt_bind_param($stmt_insert, 'sss', $nome, $email, $senha);
                    if (mysqli_stmt_execute($stmt_insert)) {
                        echo "<meta http-equiv='refresh' content=0;url='../../login.php'>";
                    } else {
                        die('Error: ' . mysqli_error($conn));
                    }
                    mysqli_stmt_close($stmt_insert);
                } else {
                    die('Error: ' . mysqli_error($conn));
                }
            }
        } else {
            die('Error: ' . mysqli_error($conn));
        }
    }

    mysqli_close($conn);
} else {
    echo "Dados incompletos. Verifique se todas as informações foram fornecidas.";
}
?>

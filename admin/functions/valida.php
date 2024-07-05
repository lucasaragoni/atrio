<?php
session_start();
include_once("../connections/conn.php");




if ((isset($_POST['email'])) && (isset($_POST['senha']))) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    $senha = md5($senha);

    $result_usuario = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' LIMIT 1";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    $resultado = mysqli_fetch_assoc($resultado_usuario);

    if ($resultado) { // Verifica se foi encontrado um usuário
        $_SESSION['usuarioId'] = $resultado['id'];
        $_SESSION['usuarioNome'] = $resultado['nome'];
        $_SESSION['usuarioEmail'] = $resultado['email'];
        $_SESSION['usuarioSangue'] = $resultado['tiposangue'];
        $_SESSION['tipoperfil'] = $resultado['tipoperfil'];

        // Verifica o tipo de perfil
        if ($resultado['tipoperfil'] == 1) {
            echo "<meta http-equiv='refresh' content=0;url='../../perfilusuario.php'>";
        } elseif ($resultado['tipoperfil'] == 2) {
            $_SESSION['nomeHemocentro'] = $resultado['razaosocial'];
            echo "<meta http-equiv='refresh' content=0;url='../../perfilhemocentro.php'>";
        }
    } else {
        $_SESSION['loginErro'] = "Usuário ou senha inválidos";
        echo "Usuário ou senha inválidos";
    }
} else {
    $_SESSION['loginErro'] = "Usuário ou senha não fornecidos";
    echo "Usuário ou senha não fornecidos";
}
?>

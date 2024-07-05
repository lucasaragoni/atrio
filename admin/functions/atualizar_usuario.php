<?php


$id = intval($_REQUEST['id']);
$nome = $_REQUEST['nome'];
$email = $_REQUEST['email'];
$idade = $_REQUEST['idade'];
$tiposangue = $_REQUEST['tiposangue'];
$genero = $_REQUEST['genero'];
$cpf = $_REQUEST['cpf'];
$cep = $_REQUEST['cep'];
$rua = $_REQUEST['rua'];
$bairro = $_REQUEST['bairro'];
$cidade = $_REQUEST['cidade'];
$uf = $_REQUEST['uf'];
$tipoperfil = $_REQUEST['tipoperfil'];



require("../connections/conn.php");
$sql = "update usuarios set nome='$nome',email='$email',idade='$idade',tiposangue='$tiposangue',genero='$genero',cpf='$cpf', cep='$cep',rua='$rua',bairro='$bairro',cidade='$cidade',uf='$uf',tipoperfil=1 where id=$id";

if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn));
}

echo "<meta http-equiv='refresh' content=0;url='../../perfilusuario.php'>";






mysqli_close($conn);

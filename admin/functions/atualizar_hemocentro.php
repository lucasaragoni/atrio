<?php


$id = intval($_REQUEST['id']);
$nome = $_REQUEST['nome'];
$razaosocial = $_REQUEST['razaosocial'];
$email = $_REQUEST['email'];
$cnpj = $_REQUEST['cnpj'];
$cep = $_REQUEST['cep'];
$rua = $_REQUEST['rua'];
$bairro = $_REQUEST['bairro'];
$cidade = $_REQUEST['cidade'];
$uf = $_REQUEST['uf'];



require("../connections/conn.php");
$sql = "update usuarios set nome='$nome',razaosocial='$razaosocial', email='$email',cnpj='$cnpj', cep='$cep',rua='$rua',bairro='$bairro',cidade='$cidade',uf='$uf' where id=$id";

if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn));
}

echo "<meta http-equiv='refresh' content=0;url='../../perfilhemocentro.php'>";






mysqli_close($conn);

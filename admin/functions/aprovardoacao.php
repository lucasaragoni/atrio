<?php

$id = intval($_GET['id']);
$statusdoacao = 1;
$pontuacao_inicial = 10;


require("../connections/conn.php");


$sql_insert_pontuacao = "INSERT INTO pontuacao (quemdou, pontuacao) VALUES ($id, $pontuacao_inicial)";
if (!mysqli_query($conn, $sql_insert_pontuacao)) {
    die('Error: ' . mysqli_error($conn));
}

$sql_insert_status = "update doacao set statussangue=1 where id=$id";
if (!mysqli_query($conn, $sql_insert_status)) {
    die('Error: ' . mysqli_error($conn));
}






echo "<meta http-equiv='refresh' content=0;url='../../perfilhemocentro.php'>";

mysqli_close($conn);

?>

<?php

//Servidor interno
$servidor = "162.241.203.30";
$usuario = "arranj11_atrio";
$senha = "atrio1409";
$dbname = "arranj11_atrio";


$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

if(!$conn){
    die("Falha na conexao: " . mysqli_connect_error());
}else{
    //echo "Conexao realizada com sucesso";
}
?>
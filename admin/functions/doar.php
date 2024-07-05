<?php

require("../connections/conn.php");

$sql = "INSERT INTO doacao (nome,hemocentro,datadoacao,doadopor,recebidopor,statussangue) VALUES ('$_POST[nome]','$_POST[hemocentro]',now(),'$_POST[doadopor]','$_POST[recebidopor]', 0)";
if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn));
}
echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../hemocentros.php'>
<script type=\"text/javascript\">
    alert(\"Agradecemos o sua doação para o nosso hemocentro, em breve entraremos em contato\");
</script>
";
mysqli_close($conn);

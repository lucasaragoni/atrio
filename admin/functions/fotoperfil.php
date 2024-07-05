<?php
$id = intval($_REQUEST['id']);
include_once("../connections/conn.php");
$arquivo = $_FILES['arquivo']['name'];
$_UP['pasta'] = '../uploads/avatar/';
$_UP['tamanho'] = 1024 * 1024 * 100; //5mb
$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');
$_UP['renomeia'] = true;
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

if ($_FILES['arquivo']['error'] != 0) {
    die("Não foi possivel fazer o upload, erro: <br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
    exit;
} else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
    echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=..perfilusuario.php'>
					<script type=\"text/javascript\">
						alert(\"Arquivo muito grande.\");
					</script>
				";
} else {
    if ($_UP['renomeia'] == true) {
        $nome_final = time() . '.jpg';
    } else {
        $nome_final = $_FILES['arquivo']['name'];
    }
    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
        $query = mysqli_query($conn, "update usuarios set fotoperfil = '$nome_final' WHERE id = $id");
        echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../perfilusuario.php'>
						<script type=\"text/javascript\">
							alert(\"Imagem salva com Sucesso.\");
						</script>
					";
    } else {
        echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../perfilusuario.php'>
						<script type=\"text/javascript\">
							alert(\"Imagem não foi cadastrada com Sucesso.\");
						</script>
					";
    }
}
?>
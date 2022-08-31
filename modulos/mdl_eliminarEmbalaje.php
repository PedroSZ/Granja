<?php

/*$recivido3 = $_POST['micodigo'];
echo $recivido3;*/


	include_once '../clases/registro.php';
	if(!empty($_POST['micodigo'])){
		$id = $_POST['micodigo'];
		$registro = new Registro();
		$registro-> eliminar($id);
		header("Location:".$_SERVER['HTTP_REFERER']);//regresa al pagina que estaba
	}
?>
<?php

/*$recivido3 = $_POST['micodigo'];
echo $recivido3;*/


	include_once '../clases/producto.php';
	if(!empty($_POST['micodigo'])){
		$id = $_POST['micodigo'];
		$producto = new Producto();
		$producto-> eliminar($id);
		header("Location:".$_SERVER['HTTP_REFERER']);//regresa al pagina que estaba
	}
?>
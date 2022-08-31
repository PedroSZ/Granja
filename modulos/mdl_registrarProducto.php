<?php
//******REGISTRO DE EMBALAJES
	include_once '../clases/producto.php';


if(!empty($_POST['nombre'])){
		
		$producto = new Producto();
		$producto->setId($_POST['id']);
		$producto->setNombre($_POST['nombre']);
		$producto->setCodigo($_POST['codigo']);	
		
		$producto->guardar();
		
	header('Location: ../registrarProducto.php');//regresa al pagina que estaba
	}
?>
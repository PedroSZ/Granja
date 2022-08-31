<?php
	
	include_once '../clases/producto.php';
	$id = $_POST['id'];
   
	if(!empty($_POST['id'])){

		$producto = new Producto();
		$producto->setId($_POST['id']);
		$producto->setNombre($_POST['nombre']);
		$producto->setCodigo($_POST['codigo']);
		
		$producto->actualizar($id);
		echo '<script type="text/javascript">
							alert("Datos actualizados con éxito");
							window.location.href="../listaParaModificarProducto.php";
					</script>';

	}
?>
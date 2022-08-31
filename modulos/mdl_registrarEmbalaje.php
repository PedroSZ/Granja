<?php
//******REGISTRO DE EMBALAJES
	include_once '../clases/registro.php';
/*$vari = $_POST['stringCodigo'];
echo $vari;*/

if(!empty($_POST['stringCodigo'])){
		
		$registro = new Registro();
		$registro->setIdProducto($_POST['productoSelec']);
		$registro->setKilos($_POST['kilos']);
		$registro->setBarCode($_POST['stringCodigo']);	
		$registro->setFecha($_POST['lotehoy']);
		$registro->guardar();
		
	header('Location: ../tiket.php');//regresa al pagina que estaba
	}
?>

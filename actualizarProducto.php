<?php
	if(!empty($_POST['micodigo'])){
        /*$obtenerPOST = $_POST['micodigo'];
        echo $obtenerPOST;*/
		include_once 'clases/producto.php';
		$codigo = $_POST['micodigo'];
		$producto = new Producto();
		$producto = $producto->consultarId($codigo);
	}
	else{

	}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="imgs/icono2.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AceAlimentos</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos/navbarYmenu.css">
  
        <script language='javascript'>
		function regresar(){
			location.href='listaParaModificarProducto.php'
		}
        </script>

         <meta charset="UTF-8">
    </head>
    <body>
    <nav class="navbar bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="Imagenes/logo.png" alt="" width="100" height="100" class="d-inline-block align-text-top">
    </a>

    <?php
    include_once 'modulos/mdl_menu.php';
    ?>

  </div>


  
</nav>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <h3> Modificar Producto</h3>
    <div id="contenedor">
       
        <section>
            <article id="fondo"  style="width: 30%; height:auto" >


               <form method="post" style="width: auto; height:auto;" onsubmit="return validar()" action="modulos/mdl_ActualizarProducto.php" id="frm_ActualizarProductos" >

  <table border="0" style="color:#FFFFFF; font-weight: 600; font-size: 17px;">
  <?php
echo '
  <tr>
    <td width="50%" style="text-align: right;">

      <p><label>Id:</label></p>
    </td>
    <td>
      <p><input name="id" type="text" readonly="readonly" placeholder="Ingresa el id" id ="id" value="'.$producto["id"].'"></p>
    </td>
  </tr>
  <tr>
    <td style="text-align: right;">
      <p><label>Nombre</label></p>

    </td>
    <td>
      <p><input name="nombre" type="text" placeholder="Ingresa el Nombre" id ="nombre" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" value="'.$producto["nombre"].'"></p>
    </td>
  </tr>
  <tr>
    <td style="text-align: right;">
      <p><label>Apellidos:</label></p>
    </td>
    <td>
      <p><input name="codigo" type="text" placeholder="Ingresa los Apellidos" id ="codigo" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" value="'.$producto["codigo"].'"></p>	

    </td>
  </tr>';?>
 
  <tr>
    <td colspan="2" style="text-align: center;">
<br>
      <input type="submit" value="Actualizar">

      <input type="button" value="Regresar" onClick="regresar()">
    </td>
  </tr>
  </table>
</form>
            </article>
        </section>

       

    </div>
    </body>
</html>
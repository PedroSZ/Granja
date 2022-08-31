<?php
  /********* OBTENEMOS EL POST DEL FILTRO******************/
  error_reporting(0);//para que no me muestre errores porque en un principio FiltarCurp no tiene valor por o esta indefinida
  $filtro1 = $_POST['FiltrarId']; //para obtener el id
  $filtro2 = $_POST['FiltarNombre'];
  $filtro3 = $_POST['FiltarCodigo'];
  /********************************************************/
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
		function consultar(codigo) {
            document.frm_ActualizarEstudiantes.micodigo.value = codigo;
			//alert(codigo);
            document.frm_ActualizarEstudiantes.submit();
		}
		function regresar(){
			location.href='index.php'
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
    <h3> Modificaciones</h3>


     
          <div id="contenedor">
     

  <!--/*********************************FORMULARIO PARA EL FILTRO*****************************************************/ -->
                     <form method="post" action="ListaParaModificarProducto.php" name="form_filtro" id="form_filtro" style="align-items: center; background:rgba(0,0,0,0.0);">
                     <table border="0" style="color:#FFFFFF; font-weight: 600; font-size: 17px;">
                     <tr>
                       <td width="50%" style="text-align: right;">
                         <p>

                         <input name="FiltrarId" type="text" title="Busqueda por id"  placeholder="Buscar por id del producto" id ="FiltrarId">
                         <input name="FiltarNombre" type="text" title="Busqueda por nombre del producto ejemplo: CANAL 8"  placeholder="Buscar por por nombre del producto" id ="FiltrarNombre" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" >
                         <input name="FiltarCodigo" type="text" title="Busqueda por codigo ejemplo: 00015" placeholder="Buscar por codigo del producto" id ="FiltrarCodigo">
                             <br>
                             <input type="submit" value="Buscar">
                         </p>
                       </td>
                     </tr>
                   </table>
                 </form>
  <!--/*********************************FIN FORMULARIO PARA EL FILTRO*****************************************************/ -->






        <!-- contenido principal -->
        <section style="text-align: center; margin: 0 auto; height: 60%">
            <article style="width:85%; height: 100%;text-align: center; margin: 0 auto;">

                 <div class="datagrid">


<!--/*********************************FORMULARIO PARA EL LISTADO*****************************************************/ -->
                 <form method="post" action="actualizarProducto.php" name="frm_ActualizarEstudiantes" id="frm_ActualizarEstudiantes" style="width: auto; height: auto;">
					<input type="hidden" id="micodigo" name="micodigo">
  <?php
   include_once 'clases/producto.php';
   $producto = new Producto();
   $productos = $producto->listar();
   if($productos){
    echo "
    <h4>Listado de Productos</h4>
      <table class='table table-bordered border-primary'><thead>
      <tr>
        <th style='text-align:center'>id</th>
        <th style='text-align:center'>Nombre</th>
        <th style='text-align:center'>codigo</th>
        <th style='text-align:center'>Acciones</th>
      </tr></thead>";
      if($filtro1 || $filtro2 || $filtro3){
        foreach ($productos as $producto) {
        //  if($filtro1 == $alumno['curp'] || $filtro2 == $alumno['nombre'] || $filtro3 == $alumno['apellidos']){

          if($filtro1 == $producto['id'] || $filtro2 == $producto['nombre'] || $filtro3 == $producto['codigo']){
            echo "<tr>
            <td>".$producto['id']."</td>
            <td>".$producto['nombre']."</td>
            <td>".$producto['codigo']."</td>
            <td style='text-align:center'><img width='30' height='30' src='imgs/Actualizar.png' onClick='consultar(\"".$producto['id']."\");'></td>
            </tr>";
          }

        }


      }else{
        foreach ($productos as $producto) {
          echo "<tr>
          <td>".$producto['id']."</td>
          <td>".$producto['nombre']."</td>
          <td>".$producto['codigo']."</td>
          <td style='text-align:center'><img width='30' height='30' src='imgs/Actualizar.png' onClick='consultar(\"".$producto['id']."\");'></td>
          </tr>";
        }
      }

    echo "</table>";
  }
  else{
    echo " <p>No hay Estudiantes productos registrados en la base de datos</p>";
  }


?>
</div>
<!--<td style='text-align:center'><img width='30' height='30' src='imgs/delete.png' onClick='borrar(\"".$alumno['curp']."\");'></td> -->
           </article>
           </form>
        </section>

          <input type="button" onClick="location='menuAdmin.php'" value="Regresar" />

       

    </div>

    </body>
  
</html>

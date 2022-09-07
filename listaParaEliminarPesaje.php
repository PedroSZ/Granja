<?php
  /********* OBTENEMOS EL POST DEL FILTRO******************/
  error_reporting(0);//para que no me muestre errores porque en un principio FiltarCurp no tiene valor por o esta indefinida
  $filtro1 = $_POST['FiltrarId']; //para obtener el id
  $filtro2 = $_POST['FiltarNombre'];
  $filtro3 = $_POST['FiltarCodigo'];
  $filtro4 = $_POST['FiltarPeso'];
  /********************************************************/
 // echo  $filtro4;
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
			location.href='index.php'
		}

    function borrar(codigo) {
        var mensaje;
        var opcion = confirm("El registro será eliminado de la base de datos, ¿seguro que desea continuar con esta acción?");
        if (opcion == true) {
          document.frm_listEliminarPesaje.micodigo.value = codigo;
          //alert(codigo);
          document.frm_listEliminarPesaje.submit();
            mensaje = "Registro eliminado con éxito.";
        } else {
          mensaje = "No se realizado ninguna acción.";
        }
//document.getElementById("ejemplo").innerHTML = mensaje;
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
    <h3>Eliminar Registros</h3>


     
          <div id="contenedor">
     

  <!--/*********************************FORMULARIO PARA EL FILTRO*****************************************************/ -->
                     <form method="post" action="ListaParaEliminarPesaje.php" name="form_filtro" id="form_filtro" style="align-items: center; background:rgba(0,0,0,0.0);">
                     <table border="0" style="color:#FFFFFF; font-weight: 600; font-size: 17px;">
                     <tr>
                       <td width="50%" style="text-align: right;">
                         <p>

                         <input name="FiltrarId" type="text" title="Busqueda por id"  placeholder="Buscar por id del producto" id ="FiltrarId">
                         
                         <select name="FiltrarNombre" type="text" id ="taller" style="height:30px;	width:100px; font-weight: 600; font-size: 14px; border-radius: 10px 10px 10px 10px;">
                                  <?php
                         include_once 'clases/producto.php';
                         $producto = new Producto();
                         $productos = $producto->listar();
                         if($productos){
                          echo "<option value='' class='option' disabled selected>Seleccione:</option>";
                          foreach ($productos as $producto) {
                             echo "<option value='".$producto['nombre']."' class='option' class='productoCod'>".$producto['nombre']."</option>
                             
                             ";
                        }
                       
                      }
                       ?>
                                  </select>

                         <input name="FiltarCodigo" type="text" title="Busqueda por codigo ejemplo: 00015" placeholder="Buscar por codigo del pesaje" id ="FiltrarCodigo">
                         <input name="FiltarPeso" type="text" title="Busqueda por Peso ejemplo: 20.50" placeholder="Buscar por peso registrado" id ="FiltrarPeso">
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
                 <form method="post" action="modulos\mdl_eliminarEmbalaje.php" name="frm_listEliminarPesaje" id="frm_listEliminarPesaje" style="width: auto; height: auto;">
					<input type="hidden" id="micodigo" name="micodigo">
  <?php
   include_once 'clases/registro.php';
   $registro = new Registro();
   $registros = $registro->listarDecendente();
   if($registros){
    echo "
    <h4>Lista de registros</h4>
      <table class='table table-bordered border-danger'><thead>
      <tr>
      <th style='text-align:center'>Id</th>
        <th style='text-align:center'>Codigo</th>
        <th style='text-align:center'>Nombre</th>
        <th style='text-align:center'>Peso</th>
        <th style='text-align:center'>fecha</th>
        <th style='text-align:center'>Acciones</th>
      </tr></thead>";
      if($filtro1 || $filtro2 || $filtro3 || $filtro4){
        foreach ($registros as $registro) {
        //  if($filtro1 == $alumno['curp'] || $filtro2 == $alumno['nombre'] || $filtro3 == $alumno['apellidos']){

          if($filtro1 == $registro['id'] || $filtro2 == $registro['nombre'] || $filtro3 == $registro['codigo'] || $filtro4 == $registro['peso']){
            echo "<tr>
            <td>".$registro['id']."</td>
            <td>".$registro['codigo']."</td>
            <td>".$registro['nombre']."</td>
            <td>".$registro['peso']."</td>
            <td>".$registro['fecha']."</td>
            <td style='text-align:center'><img width='30' height='30' src='imgs/delete.png' onClick='borrar(\"".$registro['id']."\");'></td>
            </tr>";
          }

        }


      }else{
        foreach ($registros as $registro) {
          echo "<tr>
          <td>".$registro['id']."</td>
          <td>".$registro['codigo']."</td>
          <td>".$registro['nombre']."</td>
          <td>".$registro['peso']."</td>
          <td>".$registro['fecha']."</td>
          <td style='text-align:center'><img width='30' height='30' src='imgs/delete.png' onClick='borrar(\"".$registro['id']."\");'></td>
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

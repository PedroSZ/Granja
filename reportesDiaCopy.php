<?php
error_reporting(0);//para que no me muestre errores porque en un principio FiltarCurp no tiene valor por o esta indefinida
$filtro1 = $_POST['productoSelec'];
echo $filtro1;

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="imgs/icono2.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AceAlimentos</title>
    
    <script language='javascript'>
		function consultar(dia) {
            document.frm_consulta.midia.value = dia;
			//alert(codigo);
            document.frm_consulta.submit();
		}
        </script>

<script src="scripts/obtenerDiaActual.js"></script>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="estilos/navbarYmenu.css">
      <link rel="stylesheet" href="estilos/tablas.css">
  </head>
  <body>
    <nav class="navbar bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="Imagenes/logo.png" alt="" width="100" height="100" class="d-inline-block align-text-top">
      <!-- Titulo -->
    </a>

    <?php
    include_once 'modulos/mdl_menu.php';
    ?>

  </div>
</nav>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <h3> Reporte Diario</h3>
    <!-- INICIA FILTRO DE CONSULTAR POR MES -->

    <form method="post" action="reportesDia.php" name="form_filtro" id="form_filtro" style="align-items: center; background:rgba(0,0,0,0.0);">
    <!-- <input  type="date" id="fitrarDia"></input> -->

    
                         <select id="productoSelec" name="productoSelec" onchange="ShowSelected()"  class="selector">
                         <?php
                         include_once 'clases/registro.php';
                         $regist = new Registro();
                         $registros = $regist->listar();
                         if($registros){
                           echo "<option value='' class='option' disabled selected>Seleccione:</option>";
                           foreach ($registros as $regist) {
                              echo "<option value='".$regist['codigo']."' class='option' class='productoCod'>".$regist['nombre']."</option>";
                              

                         }
                       }
                       ?>
 
   <input type="submit" value="Buscar">
  

</form>

    <!-- FINALIZA FILTRO DE CONSULTAR POR MES -->


      <!--INICIA CONSULTA-->

      <form method="post" action="../clases/registro.php" name="frm_embalaje" id="frm_embalaje" >
      <!-- <input type='hidden' id='midia' name='midia' value=''> -->
      <?php
  include_once 'clases/registro.php';
  $regist = new Registro();
  $registros = $regist->listarInformeDelDia();

  if($registros){
    echo "
    <h4>CANAL 1</h4>
    ";

    
    foreach ($registros as $regist) {

      echo"

      <table class='default'>
      <tr>
  
      <td>".$regist['peso']."</td>
  
      
  
    </tr>
  


       


";}

echo "
<tr>
      <td>TOTAL</td>
    </tr>
</table>
";

    }


  
  else{
    echo " <p>No hay embalaje registrado en la base de datos</p>";
  }


?>
</div>
<br>

<input type="button" onClick="location='reportes.php'" value="Regresar" />
</form>

      <!-- FINALIZA CONSULTA-->

  </body>
</html>

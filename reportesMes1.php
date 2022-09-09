<?php
error_reporting(0);//para que no me muestre errores porque en un principio FiltarCurp no tiene valor por o esta indefinida
$filtro1 = $_POST['FiltrarMes'];
$filtro2 = $_POST['FiltrarRango'];
/*echo $filtro1;
echo $filtro2;*/
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="imgs/icono2.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AceAlimentos</title>

    <script language='javascript'>
		/*function consultar(mes, rango) {
            document.form_filtro.mimes.value = mes;
            document.form_filtro.mirango.value = rango;
			alert(mes, rango);
            document.frm_embalaje.submit();
		}*/
        </script>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="estilos/navbarYmenu.css">
      <link rel="stylesheet" href="estilos/tablas.css">
      <script src="scripts/exportarxml.js"></script>
      <script src="scripts/sumarPesos.js"></script>
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
    <h3> Reporte Mensual</h3>
    <!-- INICIA FILTRO DE CONSULTAR POR MES -->

    <form method="post" action="reportesMes.php" name="form_filtro" id="form_filtro" style="align-items: center; background:rgba(0,0,0,0.0);">
  
<?php
/*onchange='this.form.submit()'*/
echo"

    <select name='FiltrarMes' type='text' id ='FiltrarMes' style='height:30px;	width:auto; font-weight: 600; font-size: 14px; border-radius: 10px 10px 10px 10px;'>
      <option disabled selected>Mes</option>
      <option value='1'>ENERO</option>
      <option value='2'>FEBRERO</option>
      <option value='3'>MARZO</option>
      <option value='4'>ABRIL</option>
      <option value='5'>MAYO</option>
      <option value='6'>JUNIO</option>
      <option value='7'>JULIO</option>
      <option value='8'>AGOSTO</option>
      <option value='9'>SEPTIEMBRE</option>
      <option value='10'>OCTUBRE</option>
      <option value='11'>NOBIEMBRE</option>
      <option value='12'>DICIEMBRE</option>
     </select>";?>

<select name="FiltrarRango"  type="text" id ="FiltrarRango" style="height:30px;	width:100px; font-weight: 600; font-size: 14px; border-radius: 10px 10px 10px 10px;">
                                  <?php
                         include_once 'clases/producto.php';
                         $producto = new Producto();
                         $productos = $producto->listar();
                         if($productos){
                           echo "<option value='' class='option' disabled selected>Seleccione:</option>";
                           foreach ($productos as $producto) {
                              echo "<option value='".$producto['nombre']."' class='option' class='productoCod'>".$producto['nombre']."</option>";                          
                         }
                       }
                       ?>
 </select>
 <?php 
 /* esto sirve para enviar dos parametros al script
 echo"
 <input type= 'submit' value='Buscar' onClick='consultar(\"".$filtro1."\" +\"".$filtro2."\");'
 ";
 */
 ?>
  <input type="submit" value="Buscar">
  <input type="button" onClick="location='reportes.php'" value="Regresar" />
  <button onclick="exportTableToExcel('tableID')">Descargar para excel</button>
</form>

    <!-- FINALIZA FILTRO DE CONSULTAR POR MES -->


      <!--INICIA CONSULTA-->
      <?php
       echo "
      <form method='post' action='../clases/registro.php' name='frm_embalaje' id='frm_embalaje' >
      <input type='hidden' id='mimes' name='mimes' value='$filtro1'>
      <input type='hidden' id='mirango' name='mirango' value='$filtro2'>";
      
  include_once 'clases/registro.php';
  $regist = new Registro();
  $registros = $regist->listarInformeMensual($filtro1);

  if($registros){
    echo "
    
      <table border='1' id = 'tableID'>                                    
      <thead>
      <tr>
      <th>$filtro2</th>                                    
      </tr>
      <tr>                      
        <th style='text-align:center'>Codigo</th>
        <th style='text-align:center'>Fecha</th>            
        <th style='text-align:center'>Nombre</th>
        <th style='text-align:center'>Peso</th>                                                                         
      </tr></thead>"; 

     if($filtro2){/* primer si filtro*/
      foreach ($registros as $regist) {
       
            if($filtro2 == $regist['nombre'] ){ /*compara filtro con registro*/
          echo "<tr>   
          <td>".$regist['codigo']."</td>
    <td>".$regist['fecha']."</td>                                     
          <td>".$regist['nombre']."</td>
          <td>".$regist['peso']."  <input type='hidden' class='pesos' value='".$regist['peso']."'></td>  

          </tr>";
        }/*cierre compara filtro con registro*/

  }/*cierrre primer foreach*/

}/*cierre primer si filtro*/

else{/*else primer si filtro*/
foreach ($registros as $regist) {/*foreach sin filtrar*/
  echo "<tr>
  <td>".$regist['codigo']."</td>
    <td>".$regist['fecha']."</td>
   <td>".$regist['nombre']."</td>
   <td>".$regist['peso']."  <input type='hidden' class='pesos' value='".$regist['peso']."'> </td>                
  </tr>";
}/*cierrre foreach sin filtrar*/
}/*cierre else primer si filtro*/



    echo "</table>";
  }/*cierre if(taller)*/
   else{/*else if(taller)*/
    echo " <p>No hay datos registrados en la base de datos</p>";
  }/*cierre del else if(taller)*/
   ?>





</form>

      <!-- FINALIZA CONSULTA-->

  </body>
</html>

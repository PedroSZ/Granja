<?php  
error_reporting(0);//para que no me muestre errores

//echo $var;
/********* OBTENEMOS EL POST DEL FILTRO******************/
$filtro1 = $_POST['FiltrarIdProducto']; //para obtener el id a buscar del fitro
$filtro2 = $_POST['FiltrarCodigo'];
$filtro3 = $_POST['FiltrarNombre'];
$filtro4 = $_POST['FiltrarPeso'];


/********************************************************/
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="imgs/icono2.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AceAlimentos</title>

       
        <meta charset="UTF-8">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="estilos/navbarYmenu.css">
      <link rel="stylesheet" href="estilos/tablas.css">
      <script src="scripts/obtenerDiaActual.js"></script>
      <script src="scripts/exportarxml.js"></script>
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




    <div id="contenedor">
        <!-- Encabezado de la pagina-->
            <?php include_once 'modulos/mdl_header.php'; ?>

        <!-- contenido principal -->
      <div id="centrado">
          <!--/*********************************FORMULARIO PARA EL FILTRO*****************************************************/ -->
                             <form method="post" action="reportesDia.php" name="form_filtro" id="form_filtro" style="align-items: center; background:rgba(0,0,0,0.0);">
                             <table border="0" style="color:#FFFFFF; font-weight: 600; font-size: 17px;">
                             <tr>
                               <td width="50%" style="text-align: right;">
                                 <p>

                                 <input style="height:30px;	width:200px; font-weight: 600; font-size: 14px; border-radius: 10px 10px 10px 10px; color:#FFFFFF; background:#D0D4D8;" name="FiltrarIdProducto" type="search"   placeholder="Buscar por ID" id ="FiltrarIdProducto" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" >
                                 <input style="height:30px;	width:200px; font-weight: 600; font-size: 14px; border-radius: 10px 10px 10px 10px; color:#FFFFFF; background:#D0D4D8;" name="FiltrarCodigo" type="search" title="Busqueda por Codigo"  placeholder="Buscar por Codigo" id ="FiltrarCodigo" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" >
                                 <input style="height:30px;	width:200px; font-weight: 600; font-size: 14px; border-radius: 10px 10px 10px 10px; color:#FFFFFF; background:#D0D4D8;" name="FiltrarPeso" type="search" title="Busqueda por peso, ejemplo: 25.25 KG" placeholder="Buscar peso" id ="FiltrarPeso" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">


                             

                                  <select name="FiltrarNombre" type="text" id ="taller" style="height:30px;	width:100px; font-weight: 600; font-size: 14px; border-radius: 10px 10px 10px 10px;">
                                  <?php
                         include_once 'clases/registro.php';
                         $regist = new Registro();
                         $registros = $regist->listar();
                         if($registros){
                           echo "<option value='' class='option' disabled selected>Seleccione:</option>";
                           foreach ($registros as $regist) {
                              echo "<option value='".$regist['nombre']."' class='option' class='productoCod'>".$regist['nombre']."</option>";                          
                         }
                       }
                       ?>
                                  </select>
                                   <br>
                                     <input type="submit" value="Buscar">
                                 </p>
                               </td>
                              
                             </tr>
                            
                           </table>
                         </form>
          <!--/*********************************FIN FORMULARIO PARA EL FILTRO*****************************************************/ -->
          <?php 

  if(empty($_POST['FiltrarNombre'])){
  echo "GENERAL";
}else
echo $filtro1;
echo $filtro2;
echo $filtro3;
echo $filtro4;
?>
     
       </div>


        <section style="text-align: center; margin: 0 auto; height: 60%">
            <article style="width:85%; height: 100%;text-align: center; margin: 0 auto;">
                 <div class="datagrid">
                 <form method="post" action="" name="frm_listPesos" id="frm_listPesos" style="width: auto; height: auto;">
					             <input type="hidden" id="micodigo" name="micodigo">
                        <h4> Pesaje hoy<input type="text" id="fitrarDia" disabled="disabled"></input></h4>
                                   <?php
                                    include_once 'clases/registro.php';
                                    $regist = new Registro();
                                    $registros = $regist->listarInformeDelDiaPorIdReporte();
                                   if($registros){
                                    echo "
                                    
                                      <table border='1' id = 'tableID'>                                    
                                      <thead>
                                      <tr>
                                      <th>$filtro3</th>                                    
                                      </tr>
                                      <tr>                                 
                                        <th style='text-align:center'>Nombre</th>
                                        <th style='text-align:center'>Peso</th>                                                                         
                                      </tr></thead>";

                                      if($filtro1 || $filtro2 || $filtro3 || $filtro4){/* primer si filtro*/
                                      foreach ($registros as $regist) {
                                       
                                            if($filtro1 == $regist['id'] || $filtro2 == $regist['codigo'] || $filtro3 == $regist['nombre'] || $filtro4 == $regist['peso'] ){ /*compara filtro con registro*/
                                          echo "<tr>                                        
                                          <td>".$regist['nombre']."</td>
                                          <td>".$regist['peso']."</td>                             
                                          </tr>";
                                        }/*cierre compara filtro con registro*/

                                  }/*cierrre primer foreach*/

                            }/*cierre primer si filtro*/

else if($filtro4){
  foreach ($registros as $regist) {

        if($filtro4 == $regist['id'])
        {
          echo "<tr>
          <td>".$regist['nombre']."</td>
          <td>".$regist['peso']."</td>
         


         
          </tr>";
        }

      }

}

                            else{/*else primer si filtro*/
                              foreach ($registros as $regist) {/*foreach sin filtrar*/
                                  echo "<tr>
                                   <td>".$regist['nombre']."</td>
                                    <td>".$regist['peso']."</td>               
                                  </tr>";
                                }/*cierrre foreach sin filtrar*/
                              }/*cierre else primer si filtro*/



                                    echo "</table>";
                                  }/*cierre if(taller)*/
                                   else{/*else if(taller)*/
                                    echo " <p>No se han realizado registros el dia de hoy en la base de datos</p>";
                                  }/*cierre del else if(taller)*/
                                   ?>
                       </form>


                   </article>
                </section>




<input type="button" onClick="location='menuAdmin.php'" value="Regresar" />
<button onclick="exportTableToExcel('tableID')">Descargar para excel</button>


        <!-- Pie de pagina-->
            <?php include_once 'modulos/mdl_footer.php'; ?>

    </div>
  </div>

    </body>
</html>

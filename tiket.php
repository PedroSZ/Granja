<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="shortcut icon" href="imgs/icono2.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="estilos/style.css">

    <script src="scripts/JsBarcode.all.min.js"></script>
    <script src="scripts/script.js"></script>
    <title>AceAlimentos</title>
  </head>
    <body>
        <div class="ticket">
          <form method="post"  action="modulos/mdl_registrarEmbalaje.php" id="frm_crear_nuevo_reporte" onsubmit="return validar()">
          <input  type="hidden" id="lotehoy" name="lotehoy"></input>
          <table>
               <thead>
                   <tr id="trEncabezado">

                       <th class="" id="encabezado">ARCE II LOS AMIALES</th>

                   </tr>
                   <tr>

                       <th class="datos1">PLANTA PROCESADORA ARCE</th>

                   </tr>
                   <tr>

                       <th class="datos1">PLANTA: CARRETERA A LOS AMIALES</th>

                   </tr>
                   <tr>

                       <th class="datos1">SAN MARTIN DE HGO. JALISCO</th>

                   </tr>
                   <tr>

                       <th class="datos1">PRODUCTO</th>

                   </tr>
               </thead>
               <tbody>
                   <tr>

                       <td>

                         <select id="productoSelec" name="productoSelec" onchange="ShowSelected()" class="selector">
                         <?php
                          include_once 'clases/producto.php';
                          $producto = new Producto();
                          $productos = $producto->listar();
                          if($productos){
                           echo "<option value='' class='option' disabled selected>Seleccione:</option>";
                           foreach ($productos as $producto) {
                              echo "<option value='".$producto['codigo']."' class='option' class='productoCod'>".$producto['nombre']."</option>
                              
                              ";
                         }
                        
                       }
                       ?>


                       </td>

                   </tr>
                   <tr>
                   <td class="" id="peso">
                   <input autofocus type="text" id="kilos" name="kilos" value="" onchange="obterpeso();" placeholder="00.00" ></input><input type="text" id="kg" name="kg" value="KG."></input>

                    </td>
                      
                       
                   </tr>
                   <tr>
                       <td class="producto2">Lote:
 <input  type="text" id="fechaactual" disabled="true"></input> 
 
                       </td>
                   </tr>
                   <tr>
                       <td class="producto2">Hora:
<input  type="text" id="hora" disabled="true"></input>
                       </td>
                   </tr>
                   <tr>
                       <td class="producto2">Caducidad:
<input type="text" id="caducidad" disabled="true" size="11"></input>
                       </td>
                   </tr>
                   <tr>
                       <td class="producto2">MANTENGANSE EN REFRIGERACION ENTRE 0 Y 4 G:</td>
                   </tr>
                   <tr>
                       <td class="producto">

                        <img id="codigo" class="codigo"/>
                       </td>
                       <input type="hidden" id="stringCodigo"    name="stringCodigo" value="">
                       

                   </tr>
               </tbody>

<td align="center">
 <input type="submit" value="Registrar"> 
<input type="button" onClick="location='index.php'" value="Regresar" />
</td >
<td >
 </td >
           </table >


 

          
           
           </form>
        </div>
    </body>
</html>

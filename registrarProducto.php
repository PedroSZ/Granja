<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="imgs/icono2.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AceAlimentos</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="estilos/navbarYmenu.css">
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
    <h3> Registro de Productos</h3>


    <?php
   
    include_once 'forms/form_registrar_producto.php';
    ?>
  </body>
</html>

<?php
echo "

<ul class='menu'>
      <li class='nav-item dropdown'><a class='nav-link' href='index.php'>Inicio</a></li>
      <li class='nav-item'><a class='nav-link' href='tiket.php'>Tikets</a></li>
     

      <li class='nav-item dropdown'>
      <a class='nav-link dropdown-toggle' href='productos.php' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
        Reportes
      </a>
      <ul class='dropdown-menu'>
        <li><a class='dropdown-item' href='reportesDia.php'>Del Dia</a></li>
        <li><a class='dropdown-item' href='reportesPorDia.php'>Por Dia</a></li>
         <li><a class='dropdown-item' href='reportesMes.php'>Por Mes</a></li>
       <!-- <li><a class='dropdown-item' href='reportesDia copy.php'>Por Año</a></li> -->
      </ul>
    </li>



      <li class='nav-item dropdown'>
          <a class='nav-link dropdown-toggle' href='productos.php' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
            Productos
          </a>
          <ul class='dropdown-menu'>
            <li><a class='dropdown-item' href='registrarProducto.php'>Registrar</a></li>
            <li><a class='dropdown-item' href='listaParaModificarProducto.php'>Modificar</a></li>
            <li><a class='dropdown-item' href='listaParaEliminarProducto.php'>Eliminar</a></li>
          </ul>
        </li>


        <li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle' href='productos.php' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
          Pesajes
        </a>
        <ul class='dropdown-menu'>
          <!-- <li><a class='dropdown-item' href='registrarProducto.php'>Registrar</a></li>
          <li><a class='dropdown-item' href='listaParaModificarProducto.php'>Modificar</a></li> -->
          <li><a class='dropdown-item' href='listaParaEliminarPesaje.php'>Eliminar</a></li>
        </ul>
      </li>




    </ul>

";
?>
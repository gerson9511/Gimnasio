<?php
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Empleado</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
    <meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="freehtml5.co" />
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">

  	<!-- Animate.css -->
  	<link rel="stylesheet" href="css/animate.css">
  	<!-- Icomoon Icon Fonts-->
  	<link rel="stylesheet" href="css/icomoon.css">
  	<!-- Bootstrap  -->
  	<link rel="stylesheet" href="css/bootstrap.css">

  	<!-- Magnific Popup -->
  	<link rel="stylesheet" href="css/magnific-popup.css">

  	<!-- Owl Carousel  -->
  	<link rel="stylesheet" href="css/owl.carousel.min.css">
  	<link rel="stylesheet" href="css/owl.theme.default.min.css">

  	<!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">
  	<!-- Modernizr JS -->
  	<script src="js/modernizr-2.6.2.min.js"></script>
  	<!-- FOR IE9 below -->
  	<!--[if lt IE 9]>
  	<script src="js/respond.min.js"></script>
  	<![endif]-->


  </head>
  <body>
    <div id="page">
  	<nav class="fh5co-nav" role="navigation">
    <div class="top-menu">
      <div class="container">
        <div class="row">
          <div class="col-xs-2">
            <div class="admi">
              <label >Bienvenido: </label>
              <?php echo $_SESSION['usuario']; ?>
            </div>
            <a href="logout.php"> <button type="button" class="btn btn-light">Cerrar sesión</button> </a>
          </div>
          <div class="col-xs-10 text-right menu-1">
            <ul>
              <li class="active"><a href="index_administrador.php">Clientes</a></li>
              <li><a href="index_administrador_empleado.php">Factura</a></li>
              <li><a href="index_administrador_instructor.php">Alertas</a></li>
              <li class="has-dropdown">
                <a href="horarios.php">Horarios</a>
                <ul class="dropdown">
                  <li><a href="#">Nuevo horario</a> </li>
                  <li><a href="#">Ver horarios</a> </li>
                </ul>
              </li>
              <!--<li><a href="pricing.html">Precios</a></li>
              <li><a href="contact.html">Contacto</a></li>-->
            </ul>
          </div>
        </div>
      </div>
    </div>
    </nav>
    </div>
    <div class="content">
      <div class="todo" style="background:white; margin: auto; width: 1250px">
        <?php
        include "CONEXION.php";
        ini_set ('error_reporting', E_ALL & ~E_NOTICE);
        $where = "";
        $busqueda = $_POST['xbusqueda'];
        $opcion = $_POST['xopcion'];

        if (isset($_POST['buscar'])) {
          switch ($opcion) {
          case CI_cliente:
              $where = "where CI_cliente like '".$busqueda."%' ";
              break;
          case Nombre_cliente:
              $where = "where Nombre_cliente like '".$busqueda."%' ";
              break;
          case Apellido1_cliente:
              $where = "where Apellido1_cliente like '".$busqueda."%' ";
              break;
          case Apellido2_cliente:
              $where = "where Apellido2_cliente like '".$busqueda."%' ";
              break;
          case Telefono_cliente:
              $where = "where Telefono_cliente like '".$busqueda."%' ";
              break;
          case Email_cliente:
              $where = "where Email_cliente like '".$busqueda."%' ";
              break;
          case Usuario_cliente:
              $where = "where Usuario_cliente like '".$busqueda."%' ";
              break;
            }
        }
          $sentencia="SELECT * FROM clientes $where ORDER BY Apellido1_cliente";
          $resultado=mysql_query($sentencia);

        ?>
        <form method="post">
          <input type="search" placeholder="¿Que estas buscando?" name="xbusqueda" style="margin-left: 200px; margin-bottom: 10px;" autocomplete="off">
          <select name="xopcion" >
            <option value="" disabled selected hidden>Buscar por</option>
            <option value="Nombre_cliente">Nombre</option>
            <option value="Apellido1_cliente">Apellido paterno</option>
            <option value="Apellido2_cliente">Apellido materno</option>
            <option value="CI_cliente">Carnet de identidad</option>
        </select>
          <button type="submit" name="buscar" class="btn btn-group-sm">buscar</button>
          <button type="submit" name="buscar" class="btn btn-group-sm">Mostrar todo</button>
          <th> <a href="nuevo_cliente1-emp.php"> <button style="margin-left: 100px;" type="button" class="btn btn-info">Nuevo</button> </a> </th>
        </form>
        <div id="contenido">
          <table class="centro" id="tabla" style="margin-left: 100px; width: 800px; border-collapse: separate; border-spacing: 30px 5px; background:linear-gradient(#FF5733,white); border: 5px solid; border-color:black">
            <thead>
              <strong>
              <th class="centro">Apellido paterno</th>
              <th class="centro">Apellido materno</th>
              <th class="centro">Nombre</th>
              <th class="centro">Carnet de identidad</th>
              <th class="centro">Fecha inicio</th>
              <th class="centro">Fecha fin</th>
              <th class="centro">Estado</th>
              </strong>

            </thead>
            <style media="screen">
            .noRow{
            display: none;
            }
            </style>
            <?php

            include "CONEXION.php";
            while($filas=mysql_fetch_assoc($resultado))
            {
                echo "<tr>";
                  echo "<td class='noRow';>"; echo $filas['id_cliente']; echo "</td>";
                  echo "<td>"; echo $filas['Apellido1_cliente']; echo "</td>";
                  echo "<td>"; echo $filas['Apellido2_cliente']; echo "</td>";
                  echo "<td>"; echo $filas['Nombre_cliente']; echo "</td>";
                  echo "<td>"; echo $filas['CI_cliente']; echo "</td>";
                  echo "<td>"; echo $filas['fecha_inicio']; echo "</td>";
                  echo "<td>"; echo $filas['fecha_fin']; echo "</td>";
                  echo "<td>"; echo $filas['Estado_cliente']; echo "</td>";
                  //echo "<td>"; echo $filas['Password_cliente']; echo "</td>";
                  echo "<td>  <a href='modif_cliente1.php?id_cliente=".$filas['id_cliente']."'> <button type='button' class='btn btn-success'>Modificar</button> </a> </td>";
                  echo "<td> <a href='desactivar_o_activar_cliente.php?id_cliente=".$filas['id_cliente']."''><button type='button' class='btn btn-danger'>Cambiar estado</button></a> </td>";
                echo "</tr>";
            }
           ?>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>

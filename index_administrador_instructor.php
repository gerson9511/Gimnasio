<?php
session_start();
error_reporting(0);
$varsesion=$_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Administrador</title>
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
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
  	<!-- Modernizr JS -->
  	<script src="js/modernizr-2.6.2.min.js"></script>
  	<!-- FOR IE9 below -->
  	<!--[if lt IE 9]>
  	<script src="js/respond.min.js"></script>
  	<![endif]-->


  </head>
  <body>
  	<nav class="fh5co-nav" role="navigation">
    <div class="top-menu">
      <div class="container">
        <div class="row">
          <div class="col-xs-2">
            <div class="admi">
              <label >Bienvenido Administrador</label>
            </div>
            <input id="cerrar_sesion" type="submit" name="Cerrar sesion" value="Cerrar sesion">
          </div>
          <div class="col-xs-10 text-right menu-1">
            <ul>
              <li><a href="index_administrador.php">Clientes</a></li>
              <li><a href="index_administrador_empleado.php">Empleados</a></li>
              <li class="active"><a href="index_administrador_instructor.php">Instructores</a></li>
              <!--<li><a href="pricing.html">Precios</a></li>
              <li><a href="contact.html">Contacto</a></li>-->
            </ul>
          </div>
        </div>
      </div>
    </div>
    </nav>

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
              $where = "where ci_ins like '".$busqueda."%' ";
              break;
          case Nombre_cliente:
              $where = "where nombre_ins like '".$busqueda."%' ";
              break;
          case Apellido1_cliente:
              $where = "where apellido1_ins like '".$busqueda."%' ";
              break;
          case Apellido2_cliente:
              $where = "where apellido2_ins like '".$busqueda."%' ";
              break;
          case Telefono_cliente:
              $where = "where telefono_ins like '".$busqueda."%' ";
              break;
          case Email_cliente:
              $where = "where email_ins like '".$busqueda."%' ";
              break;
          case Usuario_cliente:
              $where = "where usuario_ins like '".$busqueda."%' ";
              break;
          case Especialidad_cliente:
              $where = "where especialidad like '".$busqueda."%' ";
              break;
            }
        }
          $sentencia="SELECT * FROM instructor $where ORDER BY apellido1_ins";
          $resultado=mysql_query($sentencia);

        ?>
        <form method="post">
          <input type="search" placeholder="¿Que estas buscando?" name="xbusqueda" style="margin-left: 200px; margin-bottom: 10px;" autocomplete="off">
          <select name="xopcion" >
            <option value="" disabled selected hidden>Buscar por</option>
            <option value="CI_cliente">CI cliente</option>
            <option value="Nombre_cliente">Nombre</option>
            <option value="Apellido1_cliente">Apellido paterno</option>
            <option value="Apellido2_cliente">Apellido materno</option>
            <option value="Telefono_cliente">Telefono</option>
            <option value="Email_cliente">Email</option>
            <option value="Usuario_cliente">Usuario</option>
          </select>
          <button type="submit" name="buscar" class="btn btn-group-sm">buscar</button>
          <button type="submit" name="buscar" class="btn btn-group-sm">Mostrar todo</button>
          <th> <a href="nuevo_cliente1.php" class="derecha"> <button type="button" class="btn btn-info">Nuevo</button> </a> </th>
        </form>
        <div id="contenido">
          <table id="tabla" style="width: 800px; border-collapse: separate; border-spacing: 30px 5px; background:linear-gradient(#FF5733,white); border: 5px solid; border-color:black">
            <thead>
              <strong>
              <th class="centro">Apellido paterno</th>
              <th class="centro">Apellido materno</th>
              <th class="centro">Nombre</th>
              <th class="centro">Carnet de identidad</th>
              <th class="centro">Email</th>
              <th class="centro">Telefono</th>
              <th class="centro">Especialidad</th>
              <th class="centro">Usuario</th>
              <th class="centro">Estado</th>
              <!--<th>Password</th>-->
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
                  echo "<td class='noRow' class='centro'>"; echo $filas['id_ins']; echo "</td>";
                  echo "<td class='centro'>"; echo $filas['apellido1_ins']; echo "</td>";
                  echo "<td class='centro'>"; echo $filas['apellido2_ins']; echo "</td>";
                  echo "<td class='centro'>"; echo $filas['nombre_ins']; echo "</td>";
                  echo "<td class='centro'>"; echo $filas['ci_ins']; echo "</td>";
                  echo "<td class='centro'>"; echo $filas['email_ins']; echo "</td>";
                  echo "<td class='centro'>"; echo $filas['telefono_ins']; echo "</td>";
                  echo "<td class='centro'>"; echo $filas['especialidad']; echo "</td>";
                  echo "<td class='centro'>"; echo $filas['usuario_ins']; echo "</td>";
                  echo "<td class='centro'>"; echo $filas['estado_ins']; echo "</td>";
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

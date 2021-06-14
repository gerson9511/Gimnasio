<?php
session_start();
error_reporting(0);
$varsesion=$_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
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
              <li class="active"><a href="index_administrador_empleado.php">Empleados</a></li>
              <li><a href="index_administrador_instructor.php">Instructores</a></li>
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
    //    $and = "";

        if (isset($_POST['buscar'])) {
          switch ($opcion) {
          case CI_usuario:
              $where = "and CI_usuario like '".$busqueda."%' ";
              break;
          case Nombre_usuario:
              $where = "and Nombre_usuario like '".$busqueda."%' ";
              break;
          case Apellido1_usuario:
              $where = "and Apellido1_usuario like '".$busqueda."%' ";
              break;
          case Apellido2_usuario:
              $where = "and Apellido2_usuario like '".$busqueda."%' ";
              break;
          case Telefono_usuario:
              $where = "and Telefono_usuario like '".$busqueda."%'";
              break;
          case Email_usuario:
              $where = "and Email_usuario like '".$busqueda."%'";
              break;
          /*case cargo:
              $where = "where cargo like '".$busqueda."%'";
              break;*/
            }
        }
          $sentencia="SELECT * FROM usuario,cargo WHERE usuario.id_cargo = cargo.id_cargo $where ORDER BY Apellido1_usuario";
          $resultado=mysql_query($sentencia);
        ?>
        <form method="post">
          <input type="search" placeholder="¿Que estas buscando?" name="xbusqueda" style="margin-left: 200px; margin-bottom: 10px;" autocomplete="off">
          <select name="xopcion" >
            <option value="" disabled selected hidden>Buscar por</option>
            <option value="CI_usuario">CI usuario</option>
            <option value="Nombre_usuario">Nombre</option>
            <option value="Apellido1_usuario">Apellido paterno</option>
            <option value="Apellido2_usuario">Apellido materno</option>
            <option value="Telefono_usuario">Telefono</option>
            <option value="Email_usuario">Email</option>
            <!--<option value="cargo">Cargo</option>-->
          </select>
          <button type="submit" name="buscar" class="btn btn-group-sm">buscar</button>
          <button type="submit" name="buscar" class="btn btn-group-sm">Mostrar todo</button>
          <th> <a href="nuevo_empleado1.php" class="derecha"> <button type="button" class="btn btn-info">Nuevo</button> </a> </th>
        </form>
        <div id="contenido">
          <table id="tabla" style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 30px 5px; background:linear-gradient(#FF5733,white); border: 5px solid; border-color:black">
            <thead >
              <strong>
              <th>Apellido paterno</th>
              <th>Apellido materno</th>
              <th>Nombre</th>
              <th>Carnet de identidad</th>
              <th>Email</th>
              <th>Telefono</th>
              <th>Cargo</th>
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
                echo "<td class='noRow';>"; echo $filas['id_usuario']; echo "</td>";
                echo "<td>"; echo $filas['Apellido1_usuario']; echo "</td>";
                echo "<td>"; echo $filas['Apellido2_usuario']; echo "</td>";
                echo "<td>"; echo $filas['Nombre_usuario']; echo "</td>";
                echo "<td>"; echo $filas['CI_usuario']; echo "</td>";
                echo "<td>"; echo $filas['Email_usuario']; echo "</td>";
                echo "<td>"; echo $filas['Telefono_usuario']; echo "</td>";
                echo "<td>"; echo $filas['cargo']; echo "</td>";
                //echo "<td>"; echo $filas['Password_cliente']; echo "</td>";
                echo "<td>  <a href='modif_empleado1.php?id_usuario=".$filas['id_usuario']."'> <button type='button' class='btn btn-success'>Modificar</button> </a> </td>";
                echo "<td> <a href='eliminar_empleado.php?id_usuario=".$filas['id_usuario']."''><button type='button' class='btn btn-danger'>Eliminar</button></a> </td>";
              echo "</tr>";
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>

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
              <li><a href="index_empleado.php">Clientes</a></li>
              <li><a href="factura.php">Factura</a></li>
              <li><a href="alertas.php">Alertas</a></li>
              <li class="has-dropdown">
								<a href="horarios.php">Horarios</a>
								<ul class="dropdown">
									<li><a href="#">Ver horarios</a></li>
									<li><a href="#">Nuevo horario</a></li>
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

    <div class="content">
      <div class="todo" style="background:white; margin: auto; width: 1250px">
        <?php
        include "CONEXION.php";
        ini_set ('error_reporting', E_ALL & ~E_NOTICE);
        $busqueda = $_POST['xbusqueda'];
        $opcion = $_POST['xopcion'];

        $sentencia1="SELECT * FROM clientes Where CI_cliente = '".$busqueda."'";
        $resultado1=mysql_query($sentencia1);

        if ($row = mysql_fetch_array($resultado1)) {
          $id = $row['id_cliente'];
        }


        $sentencia="SELECT * FROM horarios,instructor,clase WHERE horarios.id_instructor = instructor.id_cliente AND horarios.id_instructor = '".$id."' AND horarios.id_clase = clase.id_clase";
        $resultado=mysql_query($sentencia);
        ?>

        <form method="post">
          <input type="search" placeholder="Ingrese el CI del cliente" name="xbusqueda" style="margin-left: 200px; margin-bottom: 10px;" autocomplete="off">
          <button type="submit" name="buscar" class="btn btn-group-sm">buscar</button>
          <a href="nuevo_horario.php"><button type="button" name="button" class="btn btn-group-sm">Nuevo</button> </a>
        </form>
        <div id="contenido">
          <table class="centro" id="tabla" style="margin-left: 200px; width: 800px; border-collapse: separate; border-spacing: 30px 5px; background:linear-gradient(#FF5733,white); border: 5px solid; border-color:black">
            <thead>
              <strong>
              <th class="centro">Dia</th>
              <th class="centro">Turno</th>
              <th class="centro">Instructor</th>
              <th class="centro">Clase</th>
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
                  echo "<td>"; echo $filas['dia']; echo "</td>";
                  echo "<td>"; echo $filas['turno']; echo "</td>";
                  echo "<td>"; echo $filas['nombre_ins']; echo "</td>";
                  echo "<td>"; echo $filas['Nombre_clase']; echo "</td>";
                  //echo "<td>"; echo $filas['Password_cliente']; echo "</td>";
                echo "</tr>";
            }
           ?>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>

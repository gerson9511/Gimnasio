<?php
  error_reporting(0);

  $conexion = mysql_connect("localhost","root","");
  mysql_select_db("gimnasio",$conexion);

  mysql_query("SET NAMES 'utf8'");
?>

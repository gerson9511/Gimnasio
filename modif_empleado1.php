<?php
  include 'CONEXION.php';
  $consulta=ConsultarEmpleado($_GET['id_usuario']);
  function ConsultarEmpleado($id_emp)
  {
    $sentencia="SELECT * FROM usuario WHERE id_usuario='".$id_emp."' ";
    $resultado=mysql_query($sentencia) or die (mysql_error());
    $filas=mysql_fetch_assoc($resultado);
    return [
      $filas['Nombre_usuario'],
      $filas['Apellido1_usuario'],
      $filas['Apellido2_usuario'],
      $filas['Telefono_usuario'],
      $filas['CI_usuario'],
      $filas['Departamento_usuario'],
      $filas['Password_usuario'],
      $filas['Email_usuario']
    ];
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modificar Empleado</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">

</head>
<body style="background-color: #F7BE81;">
<div class="todo">

  <div id="contenido">
  	<div style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		<span> <h1>Modificar Empleado</h1> </span>
  		<br>
	  <form action="modif_empleado2.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;">
      <input type="hidden" name="id_usuario" value="<?php echo $_GET['id_usuario']?> ">

      <label>Nombre: </label>
      <input type="text" id="nombre_usuario" name="nombre_usuario" style="margin-left:100px" value="<?php echo $consulta[0] ?>"><br>
<br>
      <label>Apellido paterno: </label>
  		<input type="text" id="apellido1_usuario" name="apellido1_usuario" style="margin-left:100px" value="<?php echo $consulta[1] ?>"><br>
<br>
      <label>Apellido materno: </label>
      <input type="text" id="apellido2_usuario" name="apellido2_usuario" style="margin-left:100px" value="<?php echo $consulta[2] ?>"><br>
<br>
      <label>Telefono: </label>
      <input type="text" id="telefono_usuario" name="telefono_usuario" style="margin-left:100px" value="<?php echo $consulta[3] ?>"><br>
<br>
      <label>CI: </label>
      <input type="text" id="ci_usuario" name="ci_usuario" style="margin-left:100px" value="<?php echo $consulta[4] ?>"><br>
<br>
      <label>Departamento: </label>
      <input type="text" id="departamento_usuario" name="departamento_usuario" style="margin-left:100px" value="<?php echo $consulta[5] ?>"><br>
<br>
      <label>Password: </label>
      <input type="password" id="password_usuario" name="password_usuario" style="margin-left:100px" value="<?php echo $consulta[6] ?>"><br>
<br>
      <label>Email: </label>
      <input type="text" id="email_usuario" name="email_usuario" style="margin-left:100px" value="<?php echo $consulta[7] ?>"><br>
<br>
  		<br>
  		<button type="submit" class="btn btn-success">Guardar</button>
     </form>
  	</div>

  </div>


</div>
</body>
</html>

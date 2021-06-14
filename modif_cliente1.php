<?php
  include 'CONEXION.php';
  $consulta=ConsultarCliente($_GET['id_cliente']);
  function ConsultarCliente($id_clien)
  {
    $sentencia="SELECT * FROM clientes WHERE id_cliente='".$id_clien."' ";
    $resultado=mysql_query($sentencia) or die (mysql_error());
    $filas=mysql_fetch_assoc($resultado);
    return [
      $filas['Nombre_cliente'],
      $filas['Apellido1_cliente'],
      $filas['Apellido2_cliente'],
      $filas['CI_cliente'],
      $filas['Departamento_cliente'],
      $filas['Telefono_cliente'],
      $filas['Direccion_cliente'],
      $filas['Email_cliente'],
      $filas['Usuario_cliente'],
      $filas['Password_cliente']
    ];
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modificar Cliente</title>
<style type="text/css">
@import url("css/mycss.css");
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">

</head>
<body style="background-color: #F7BE81;">
<div class="todo">

  <div id="contenido">
  	<div style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		<span> <h1>Modificar Cliente</h1> </span>
  		<br>
	  <form action="modif_cliente2.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;">
      <input type="hidden" name="id_cliente" value="<?php echo $_GET['id_cliente']?> ">

      <label>Nombre: </label>
      <input type="text" id="nombre_cliente" name="nombre_cliente" style="margin-left:100px" value="<?php echo $consulta[0] ?>"><br>
<br>
      <label>Apellido paterno: </label>
  		<input type="text" id="apellido1_cliente" name="apellido1_cliente" style="margin-left:100px" value="<?php echo $consulta[1] ?>"><br>
<br>
      <label>Apellido materno: </label>
      <input type="text" id="apellido2_cliente" name="apellido2_cliente" style="margin-left:100px" value="<?php echo $consulta[2] ?>"><br>
<br>
      <label>CI: </label>
      <input type="text" id="ci_cliente" name="ci_cliente" style="margin-left:100px" value="<?php echo $consulta[3] ?>"><br>
<br>
      <label>Departamento: </label>
      <input type="text" id="email_cliente" name="email_cliente" style="margin-left:100px" value="<?php echo $consulta[4] ?>"><br>
<br>
      <label>Telefono: </label>
      <input type="text" id="telefono_cliente" name="telefono_cliente" style="margin-left:100px" value="<?php echo $consulta[5] ?>"><br>
<br>
      <label>Direccion: </label>
      <input type="text" id="email_cliente" name="email_cliente" style="margin-left:100px" value="<?php echo $consulta[6] ?>"><br>
<br>
      <label>Email: </label>
      <input type="text" id="email_cliente" name="email_cliente" style="margin-left:100px" value="<?php echo $consulta[7] ?>"><br>
<br>
      <label>Usuario: </label>
      <input type="text" disabled="disabled" id="usuario_cliente" name="usuario_cliente" style="margin-left:100px" value="<?php echo $consulta[8] ?>"><br>
<br>
      <label>Password: </label>
      <input type="password" id="password_cliente" name="password_cliente" style="margin-left:100px" value="<?php echo $consulta[9] ?>"><br>
<br>
  		<br>
  		<button type="submit" class="btn btn-success">Guardar</button>
     </form>
  	</div>

  </div>


</div>
</body>
</html>

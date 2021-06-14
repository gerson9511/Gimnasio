<?php
session_start();
//Del formulario de login extraemos el email y la contraseña
// EMAIL
$usuario=$_POST['email'];
// CONTRASEÑA CON MD5
$contrasena=md5($_POST['password']);
// Definimos dos variables para distinguir a los usuarios
// administrador sera 1, ya que ese es su ID dentro de la base de datos en la tabla usuario
$administrador = "1";
// empleado sera 2, ya que ese es su ID dentro de la base de datos en la tabla usuario
$empleado = "2";
//conecto con la base de datos
$conn = mysqli_connect("localhost","root","","gimnasio");

//Consultas a la base de datos para buscar un usuario con esos datos
// Primera consulta para buscar dentro de los clientes
$ssql = "SELECT * FROM clientes WHERE Email_cliente='$usuario' and Password_cliente='$contrasena' and Estado_cliente != 'Inactivo'" ;
// Segunda consulta para buscar dentro de los usuarios a un ADMINISTRADOR
$ssql2 = "SELECT * FROM usuario WHERE Email_usuario='$usuario' and Password_usuario='$contrasena' and id_cargo='$administrador'";
// Segunda consulta para buscar dentro de los usuarios a un EMPLEADO
$ssql3 = "SELECT * FROM usuario WHERE Email_usuario='$usuario' and Password_usuario='$contrasena' and id_cargo='$empleado'";



//Ejecutamos las consultas
$rs = mysqli_query($conn,$ssql);
$filas1= mysqli_num_rows($rs);

$rs2 = mysqli_query($conn,$ssql2);
$filas2= mysqli_num_rows($rs2);

$rs3 = mysqli_query($conn,$ssql3);
$filas3= mysqli_num_rows($rs3);

//vemos si el email y contraseña son válidos
//si la ejecución de la consulta nos da algún resultado
//es que si que existe esa conbinación email/contraseña

if ($filas1>0 || $filas2>0 || $filas3>0){
    // Primero se verifica si es un cliente, si no existe se va al siguiente paso
   	if ($filas1>0) {
			$_SESSION['usuario']=$usuario;
			header ("Location: index.html");
			echo "exito";
   	}
    // Segundo se verifica si es un administrador, si no existe se va al siguiente paso
		if ($filas2>0) {
			header ("Location: index_administrador.php");
			echo "exito";
		}
    // Tercero se verifica si es un empleado, si no existe se va al siguiente paso
		if ($filas3>0) {

      $ssql3 = "SELECT * FROM usuario WHERE Email_usuario='$usuario' and Password_usuario='$contrasena' and id_cargo='$empleado'";
      $rs3 = mysqli_query($conn,$ssql3);

      $row = mysqli_fetch_assoc($rs3);

      $nombre = $row['Nombre_usuario'];

      $_SESSION['usuario']=$nombre;
			header ("Location: index_empleado.php");
			echo "exito";
		}
// Si en los anteriores pasos no existe un resultado, entonces los datos introducidos
// no existen en la base de datos
// o el usuario se equivoco al introducir sus datos.
}else{
  // se manda un mensaje para informar al usuario que sus datos no son correctos
	echo '<script language="javascript">alert("Contraseña o Usuario incorrecto Intentelo de nuevo");
					window.location.href="modulo_login2.php";
				</script>';
}
mysqli_free_result($rs);
mysqli_close($conn);
?>

<?php
	include 'CONEXION.php';
	ModificarCliente($_POST['nombre_cliente'], $_POST['apellido1_cliente'], $_POST['apellido2_cliente'], $_POST['ci_cliente'],$_POST['departamento_cliente'],$_POST['direccion_cliente'],$_POST['email_cliente'], $_POST['telefono_cliente'],$_POST['usuario_cliente'] ,$_POST['password_cliente'], $_POST['id_cliente']);

	function ModificarCliente($nom_clien,$ape1_clien,$ape2_clien,$ci_clien,$dep_clien,$dir_clien,$email_clien,$telf_clien,$usu_clien,$pass_clien,$id_clien)
	{
		$u1 = substr($nom_clien,0,1);
		$u2 = substr($ape1_clien,0,1);
		$u3 = substr($ape2_clien,0,1);
		$usuario_cliente = $u1 . $u2 . $u3 . $ci_clien;
		$sentencia="UPDATE clientes SET Nombre_cliente='".$nom_clien."', Apellido1_cliente='".$ape1_clien."', Apellido2_cliente='".$ape2_clien."', CI_cliente='".$ci_clien."',  Departamento_cliente='".$dep_clien."', telefono_cliente='".$telf_clien."', Direccion_cliente='".$dir_clien."', Email_cliente='".$email_clien."', usuario_cliente='".$usuario_cliente."',password_cliente='".$pass_clien."' WHERE id_cliente='".$id_clien."' ";
		mysql_query($sentencia) or die (mysql_error());
	}


?>

<script type="text/javascript">
	alert("Cliente Modificado exitosamente");
	window.location.href='index_administrador.php';
</script>

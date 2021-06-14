<?php
	include "CONEXION.php";

	DesactivarCliente($_GET['id_cliente']);

	function Desactivarcliente($id_clien)
	{

			$sentencia1="SELECT Estado_cliente FROM clientes Where id_cliente = '".$id_clien."'";
			$resultado1=mysql_query($sentencia1);

			$activo = "Activo";
			$inactivo = "Inactivo";

			if ($row = mysql_fetch_array($resultado1)) {
				$estado = $row['Estado_cliente'];
			}

		if ($estado == $inactivo) {
			$sentencia2="UPDATE clientes SET Estado_cliente = 'Activo' WHERE id_cliente='".$id_clien."' ";
			mysql_query($sentencia2) or die (mysql_error());
		}
		else{
			$sentencia3="UPDATE clientes SET Estado_cliente = 'Inactivo' WHERE id_cliente='".$id_clien."' ";
			mysql_query($sentencia3) or die (mysql_error());
		}
  }
?>
<script type="text/javascript">
	alert("El estado del cliente fue modificado exitosamente");
	window.location.href='index_administrador.php';
</script>

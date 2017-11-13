<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
<?php
	
		$pnombre = $_POST["pnombre"];
		$papellido = $_POST["papellido"];
		$sapellido = $_POST["sapellido"];
		$identidad = $_POST["identidad"];
		$telcasa = $_POST["telcasa"];
		$telmovil = $_POST["telmovil"];

		class registro{
			public function conectar(){
				include "conexion.php";
				$conPG = new conexion();
				$conPG->conectar();
			 	echo "<br>";
			}

			public function registrarPG($pnombre, $papellido, $sapellido, $identidad, $telcasa, $telmovil){
				$query = "INSERT INTO clientes(primernombre, primerapellido, segundoapellido, identidad, telefonocasa, telefonomovil)
						  VALUES('$pnombre', '$papellido', '$sapellido', '$identidad', '$telcasa', '$telmovil')";
			    $ejecutar = pg_query($query)
			    or die("No se ha podido registrar datos" .pg_last_error());
	    	}
    	}

    	$obj = new registro();
    	$obj->conectar();
    	$obj->registrarPG($pnombre, $papellido, $sapellido, $identidad, $telcasa, $telmovil);
?>
<script type="text/javascript">alert("Cliente Registrado")</script>
<script type="text/javascript">window.location="registrarcliente.html"</script>
</html>
<?php
	$pnombre = $_POST["pnombre"];
	$papellido = $_POST["papellido"];
	$sapellido = $_POST["sapellido"];
	$identidad = $_POST["identidad"];
	$telcasa = $_POST["telcasa"];
	$telmovil = $_POST["telmovil"];

	echo "Primer Nombre: ".$pnombre."<br>";
	echo "Primer Apellido: ".$papellido."<br>";
	echo "Segundoapellido: ".$segundoapellido."<br>";
	echo "Identidad: ".$identidad."<br>";
	echo "Telefono casa: ".$telefonocasa."<br>";
	echo "Telefono movil: ".$telmovil;
	echo "<br>";
	
	include "conexion.php";
	$con = new Conexion();
	$con->conectar();
 	echo "<br>";
	
	$query = "INSERT INTO clientes(primernombre, primerapellido, segundoapellido, identidad, telefonocasa, telefonomovil)
			  VALUES('$papellido', '$papellido', 'sapellido', '$identidad', '$telcasa', '$telmovil')";
    $ejecutar = pg_query($query)
    or die("No se ha podido registrar datos" .pg_last_error());
?>
<?php
	class Conexion{
		//Conexion
		function conectar(){
			$dbconn = pg_connect("host=localhost port=5432 dbname=basedatos user=postgres password=root")
		    or die('No se ha podido conectar: ' . pg_last_error());
				echo "Conexion Exitosa";
		}

		function funcion(){
			echo "phpCall";
		}
	}
?>
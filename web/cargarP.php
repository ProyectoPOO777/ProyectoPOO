<html>
<?php
	$cliente = $_POST['cliente'];
	$cantidadprestamo = $_POST['cant'];
	$numeroprestamo = $_POST['numP'];
	$fechaautorizacion = $_POST['faut'];
	$fechaentrega = $_POST['fent'];
	$cuota = $_POST['cuoM'];
	$idcliente="";
	
	class registro{
		public $fondos, $nuevofondo, $prestado, $fondoactual;

		public function conectar(){
			include "conexion.php";
			$conPG = new conexion();
			$conPG->conectar();
		 	echo "<br>";
		}

		public function idcliente($cliente){
			$query="SELECT idcliente FROM clientes WHERE primernombre='$cliente'";
			$ejecutar=pg_query($query);

			while ($arreglo = pg_fetch_array($ejecutar)) {
				$idcliente.=$arreglo['idcliente'];
			}
			return $idcliente;
		}

		public function registrarPG($cliente, $numeroprestamo, $cantidadprestamo, $fechaautorizacion, $fechaentrega, $cuota){
			$query = "INSERT INTO prestamos(idcliente, numeroprestamo, cantidadprestamo, fechaautorizacion, fechaentrega, cuota)
					  VALUES('$cliente', '$numeroprestamo', '$cantidadprestamo', '$fechaautorizacion', '$fechaentrega', '$cuota')";
		    $ejecutar = pg_query($query)
		    or die("No se ha podido registrar datos" .pg_last_error());
    	}

    	public function getconsultarfondoactual(){
            $query = "SELECT fondoactual FROM FONDOS";
            $ejecutar=pg_query($query);
                while($result=pg_fetch_array($ejecutar)){
                    $fondoactual=$result['fondoactual'];
                }
            return $fondoactual;    
        }

    	public function getconsultarfondos(){
            $query = "SELECT totalfondos FROM FONDOS";
            $ejecutar=pg_query($query);
                while($result=pg_fetch_array($ejecutar)){
                    $fondos=$result['totalfondos'];
                }
            return $fondos;    
        }

        public function getconsultarprestados(){
            $query = "SELECT prestado FROM FONDOS";
            $ejecutar=pg_query($query);
                while($result=pg_fetch_array($ejecutar)){
                    $prestado=$result['prestado'];
                }
            return $prestado;    
        }

    	public function actualizarfondo($cantidad){
    		$pres=$this->getconsultarprestados();
    		$tfon=$this->getconsultarfondos();
    		$afon=$this->getconsultarfondoactual();
    		
    		$vpres=$pres+$cantidad;
    		$vnuef=$tfon-$vpres;

    			$query = "UPDATE FONDOS SET prestado=".$vpres.", fondoactual=".$vnuef;
    				
    				$result = pg_query($query)
					or die("No se pudo actualizar". pg_last_error());
    	}

    	}

    	$obj = new registro();
    	$obj->conectar();
    	$obj->registrarPG($obj->idcliente($cliente), $numeroprestamo, $cantidadprestamo, $fechaautorizacion, $fechaentrega, $cuota);
    	$obj->actualizarfondo($cantidadprestamo);
?>
    <script type="text/javascript">alert("Prestamo Registrado")</script>
    <script type="text/javascript">window.location="registrarP.php"</script>
</html>

<html> 
<body> 
<br><br><br>
  <center> 
  	 <center><img src="logCOP.png" height="150px" /><h1>Registro de prestamos</h1></center>
	<?php 
	include "conexion.php";
			$conPG = new conexion();
			$conPG->conectar();

	$result = pg_query("SELECT a.primernombre as nombre, a.primerapellido as apellido, a.identidad as identidad, 
						b.numeroprestamo as numeroprestamo, b.fechaautorizacion as fechaau, b.fechaentrega as fechaen, b.cuota as cuota
						FROM CLIENTES a LEFT OUTER JOIN PRESTAMOS b
						ON a.idcliente = b.idcliente;");

	if ($row = pg_fetch_array($result)){ 
	   echo "<table border = '1'> \n"; 
	   echo "<tr bgcolor='#000fff'><td><font color='white'>primer nombre</font></td><td><font color='white'>primer apellido</font></td>
	   			 <td><font color='white'>identidad</font></td><td><font color='white'>numero de prestamo</font></td>
	   			 <td><font color='white'>fecha de autorizacion</font></td><td><font color='white'>fecha de entrega</font></td>
	   			 <td><font color='white'>cuota</font></td></tr>\n"; 
	   do { 
   		  if($row["numeroprestamo"]!=""){	  	
			echo "<tr><td>".$row["nombre"]."</td><td>".$row["apellido"]."</td>
			<td>".$row["identidad"]."</td><td>".$row["numeroprestamo"]."</td>
			<td>".$row["fechaau"]."</td><td>".$row["fechaen"]."</td>
			<td>".$row["cuota"]."</td></tr> \n";
	 	  }
	   } while ($row = pg_fetch_array($result)); 
	   echo "</table> \n"; 
	} else { 
	echo "¡ No se ha encontrado ningún registro !"; 
	} 
	?> 
</center>
</body> 
</html>
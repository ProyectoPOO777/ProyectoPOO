<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<center>
<br>
<center><img src="logCOP.png" height="150px" /><h1>Registro de prestamos</h1></center>

<!--********************SCRIPT**********************-->
<script type="text/javascript">
    function validar(){
    var cantidad=document.getElementById('cant').value;
    var numeroprestamo=document.getElementById('numP').value;
    var cuotamensual=document.getElementById('cuoM').value;
    var fechaautorizacion=document.getElementById('faut').value; 

    var dateString = fechaautorizacion;
    var dia="";
    function convertir(string) {
    var info=string.split('-');
        dia+=info[2];
        return info[2] + '/' + info[1] + '/' + info[0];
    }
    convertir(dateString);

    if(cantidad==''|numeroprestamo==''|cuotamensual=='')
        alert('llene todos los campos');
    else{
        if(cantidad==0)
            alert('El valor del prestamo debe ser mayor a 0');
        else{
            if(numeroprestamo==0)
                alert('El numero del prestamo debe ser mayor a 0');
            else{    
                if(dia>20)
                    alert("La fecha de autorizacion debe ser antes del 20");
                else
                    document.formPrestamos.submit();
            }
        }
    }

    } 

    function atras(){
    window.location="pagina.html";
    }

</script>
<!--******************************************-->    

<!--*************CONEXION POSTGRESQL****************-->
<?php
            include 'conexion.php';
            $con = new Conexion();
            $con->conectar();

            $consulta = "SELECT * FROM clientes";
            $querypg = pg_query($consulta);     
?>

<?php
        class consultar{
            public function getconsultarfondos(){
            $query = "SELECT * FROM FONDOS";
            $ejecutar=pg_query($query);
                while($result=pg_fetch_array($ejecutar)){
                    $fondos=$result['fondoactual'];
                }
            return $fondos;    
            }
        }

        $objC = new consultar();
            echo "Fondos: ". $objC->getconsultarfondos(); 

        if( ($objC->getconsultarfondos()+cantidad)>500000 ){
            echo "No hay mas fondos";
        }  
?>

<!--************************************************-->  
 <br>
 <br>
 <form action="cargarP.php" method="post" name="formPrestamos">
    <div>
    <label for="cantP">Clientes:&nbsp;&nbsp;&nbsp;&nbsp;</label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <select name="cliente" size="1">
    <?php while($arreglo = pg_fetch_array($querypg)){ ?>
        <option><?php echo $arreglo['primernombre']?></option>  
    <?php } ?>
    </select>
    </div>

    <br>
    <div>
        <label for="cantP">Cantidad prestamo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="text" id="cant" name="cant" required/>
    </div>
    <br>
    <div>
        <label for="numP">Numero de prestamo:&nbsp;</label>
        <input type="text" name="numP" id="numP"required/>
    </div>
    <br>
    
    <div>
        <label for="fecha">Fecha de autorizacion:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="date" name="faut" id="faut" value="2017-11-01"/>
    </div>
    
    <br>
    <div>
        <label for="fecha">Fecha de entrega:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="date" name="fent" id="fent" value="2017-11-30"/>
    </div>
    
    <br>
    <div>
        <label for="cuoM">Cuota Mensual&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="text" name="cuoM" id="cuoM" required/>
    </div>
    <br><br>
    
    <input onclick=validar() type=button value='Registrar Prestamo'>&nbsp;&nbsp;
    <input onclick=atras() type=button value='Inicio'>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;

</form>
</center>
</body>
</html>
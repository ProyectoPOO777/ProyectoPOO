<html>
 <head>
  <title>Pagina Principal</title>
 </head>
 <body>
 <center><h1>EMPRESA DE PRESTAMOS</h1></center>

 <B>Registro de Cliente</B><br><br>
 <form action="registrarcliente.php" method="post">
    <div>
        <label for="pnombre">Primer Nombre:&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="text" name="pnombre" />
        &nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" value="Guardar Registro">Guardar Registro</button>
    </div>
    <br>
    <div>
        <label for="papellido">Primer Apellido:&nbsp;&nbsp;&nbsp;</label>
        <input type="text" name="papellido" />
    </div>
    <br>
    <div>
        <label for="sapellido">Segundo Apellido:</label>
        <input type="text" name="sapellido" />
    </div>
    <br>
    <div>
        <label for="identidad">Identidad:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="text" name="identidad" />
    </div>
    <br>
    <div>
        <label for="telcasa">Telefono Casa:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="text" name="telcasa" />
    </div>
    <br>
    <div>
        <label for="telmovil">Telefono Movil:&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="text" name="telmovil" />
    </div>

</form>
 </body>
</html>
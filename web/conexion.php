<?php
	class conexion{
    private $host="localhost";
    private $port="5432";
    private $user="postgres";
    private $password="root";
    private $dbname="postgres";
    

    function conectar(){
 	$connect = pg_connect("host=$this->host dbname=$this->dbname port=$this->port user=$this->user password=$this->password");
	    if(!$connect)
	        echo "<p><i>No Conectado</i></p>"; 
    }
    }

?>
<?php
 
// Create connection
require('../configuraciones/conexion.php');

$nit = $_POST["nit"];

//query
if($nit<0){
	echo "nit debe ser positiva";
}

else{
	$query="INSERT INTO `empresa`(`nit`,`nombre_empresa`, `telefono_empresa`, `nombre_gerente`)
 	VALUES ('$_POST[nit]','$_POST[nombre_empresa]','$_POST[telefono_empresa]','$_POST[nombre_gerente]')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

 	if($result){
        header ("Location: empresas.php");
        
         
 	}else{
 		echo "Ha ocurrido un error al crear la persona";
 	}


}

?>

<?php
 
// Create connection
require('../configuraciones/conexion.php');

$nit = $_POST["nit"];

//query
if($nit<0){
	echo "nit debe ser positiva";
}

else{
	$query="INSERT INTO `empresa`(`nit`,`nombre`, `direccion`, `pagina_web`)
 	VALUES ('$_POST[nit]','$_POST[nombre]','$_POST[direccion]','$_POST[pagina_web]')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

 	if($result){
        header ("Location: empresas.php");
        
         
 	}else{
 		echo "Ha ocurrido un error al crear la persona";
 	}


}

?>

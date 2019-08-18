<?php
 
// Create connection
require('../configuraciones/conexion.php');

$cedula = $_POST["cedula"];

//query
if($cedula<0){
	echo "cedula debe ser positiva";
}

else{
	$query="INSERT INTO `persona`(`cedula_persona`,`nombre_persona`, `telefono_persona`, `direccion`,`genero`)
 	VALUES ('$_POST[cedula]','$_POST[nombre]','$_POST[telefono]','$_POST[direccion]','$_POST[genero]')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

 	if($result){
        header ("Location: personas.php");
        
         
 	}else{
 		echo "Ha ocurrido un error al crear la persona";
 	}


}

?>

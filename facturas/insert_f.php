<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="";
if($_POST["persona_empresa"]==="empresa"){
    $query="INSERT INTO factura(`codigo_factura`, `fecha_de_generacion`, `hora_de_generacion`, `costo_total`, `cedula_empleado`,`nit`) 
	VALUES('$_POST[codigo]','$_POST[fecha]','$_POST[hora]','$_POST[costoTotal]','$_POST[cedulaEmpleado]','$_POST[cedula_nit]')";
    
}
else{
    $query="INSERT INTO factura(`codigo_factura`, `fecha_de_generacion`, `hora_de_generacion`, `costo_total`, `cedula_empleado`, `cedula_persona`) 
	VALUES('$_POST[codigo]','$_POST[fecha]','$_POST[hora]','$_POST[costoTotal]','$_POST[cedulaEmpleado]','$_POST[cedula_nit]')";
}
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

 	if($result){
        header ("Location: facturas.html");
        
         
 	}else{
 		echo "Ha ocurrido un error al crear la persona";
 	}



?>

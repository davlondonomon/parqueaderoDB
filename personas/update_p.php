<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="UPDATE persona SET nombre_persona='$_POST[nombre]',direccion='$_POST[direccion]',telefono_persona='$_POST[telefono]',genero='$_POST[genero]',cedula_empleado='$_POST[cedula_empleado]' WHERE cedula_persona='$_POST[cedula]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: personas.php");
    
     
 }else{
     echo "Ha ocurrido un error al Eliminar  la persona";
 }
 
mysqli_close($conn);



?>
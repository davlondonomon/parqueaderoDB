<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="delete FROM persona where cedula_persona='$_POST[cedula_persona]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: personas.php");
    
     
 }else{
     echo "Ha ocurrido un error al Eliminar  la persona";
 }
 
mysqli_close($conn);



?>
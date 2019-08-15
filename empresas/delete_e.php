<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="delete FROM empresa where nit='$_POST[del]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: empresas.php");
    
     
 }else{
     echo "Ha ocurrido un error al Eliminar la empresas";
 }
 
mysqli_close($conn);



?>
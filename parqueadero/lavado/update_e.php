<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="UPDATE empresa SET nombre='$_POST[nombre]',direccion='$_POST[direccion]',pagina_web='$_POST[pagina_web]' WHERE nit='$_POST[nit]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: empresas.php");
    
     
 }else{
     echo "Ha ocurrido un error al Eliminar  la persona";
 }
 
mysqli_close($conn);



?>
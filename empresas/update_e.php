<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="UPDATE empresa SET nombre_empresa='$_POST[nombre]',telefono_empresa='$_POST[telefono]',nombre_gerente='$_POST[gerente]' WHERE nit='$_POST[nit]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: empresas.php");
    
     
 }else{
     echo "Ha ocurrido un error al Eliminar  la persona";
 }
 
mysqli_close($conn);



?>
<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="delete FROM factura where codigo_factura='$_POST[codigo_factura]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: facturas.php");
    
     
 }else{
     echo "Ha ocurrido un error al Eliminar  la factura";
 }
 
mysqli_close($conn);



?>
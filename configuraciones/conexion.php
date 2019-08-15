<?php
$host = "localhost";
$user = "parqueadero";
$pass = "clave";
$DB = "parqueadero";
$conn = mysqli_connect($host, $user, $pass, $DB) or die("Error al conectar a la DB " . mysqli_error($link));
?>
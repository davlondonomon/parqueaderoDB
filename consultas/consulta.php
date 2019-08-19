<!DOCTYPE html>
<html lang="en">
<!--cabezera del html -->

<head>
    <!--configuraciones basicas del html-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--titrulo de la pagina-->
    <title>inicio</title>
    <!--CDN de boostraps: Libreria de estilos SCSS y CSS para darle unas buena apariencia a la aplicacion
    para mas informacion buscar documentacion de boostraps en: https://getbootstrap.com/docs/4.3/getting-started/introduction/ -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--CDN de forntawesome: Libreria de estilos SCSS y CSS incluir icononos y formas 
     para mas informacio : https://fontawesome.com/start-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <ul class="nav">
        <li class="nav nav-item">
            <a class="nav-link" href="../index.html">inicio</a>
        </li>
        <li class="nav nav-item">
            <a class="nav-link" href="../personas/personas.php">Personas</a>
        </li>
        <li class="nav nav-item">
            <a class="nav-link" href="../empresas/empresas.php">Empresas</a>
        </li>
        <li class="nav-item nav-pills">
            <a class="nav-link" href="../facturas/facturas.html">Facturas</a>
        </li>
        <li class="nav-item nav-pills">
            <a class="nav-link" href="../busquedas/busquedas.php">Busquedas</a>
        </li>
        <li class="nav-item nav-pills">
            <a class="nav-link active" href="../consultas/consultas.php">Consultas</a>
        </li>
    </ul>
    <?php

    // Create connection
    require('../configuraciones/conexion.php');

    $tipo = $_POST["consulta"];

    //query
    if ($tipo == 1) {
        echo "nit debe ser positiva";
    } elseif ($tipo == 2){
        $query = "SELECT * FROM persona";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if ($result) {
            
        } else {
            echo "Ha ocurrido un error al crear la persona";
        }
    } elseif($tipo == 3){

    }

    ?>
</body>
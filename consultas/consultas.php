<?php
$link = mysqli_connect("localhost", "parqueadero", "clave", "parqueadero");
$resultado = '';
if (isset($_POST["consulta"])) {
    $tipo = $_POST["consulta"];
    if ($tipo == 1) {
        $resultado =
            '<div class="col-6 px-2">
                <table class="table border-rounded">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Fecha de Generacion</th>
                            <th scope="col">Hora de Generacion</th>
                            <th scope="col">Costo total</th>
                            <th scope="col">Cedula empleado</th>
                            <th scope="col">cedula persona</th>
                            <th scope="col">NIT</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
        //reemplazar con consulta
        $query = mysqli_query($link, 'SELECT * FROM factura WHERE cedula_persona IS NULL AND nit IS NULL');
        while ($row = mysqli_fetch_array($query)) {
            $codigo_factura = $row['codigo_factura'];
            $fecha_de_generacion = $row['fecha_de_generacion'];
            $hora_de_generacion = $row['hora_de_generacion'];
            $costo_total = $row['costo_total'];
            $cedula_empleado = $row['cedula_empleado'];
            $cedula_persona = $row['cedula_persona'];
            $nit = $row['nit'];
            //$resultado.=''.$codigo_factura.''.$fecha_de_generacion.''.$hora_de_generacion.''.$costo_total.''.$cedula_empleado.''.$cedula_empleado.''.$cedula_persona.''.$nit;
            $resultado .= '<tr><td>' . $codigo_factura . '</td><td>' . $fecha_de_generacion . '</td><td>' . $hora_de_generacion . '</td><td>' . $costo_total . '</td><td>' . $cedula_empleado . '</td><td>' . $cedula_persona . '</td><td>' . $nit . '</td></tr>';
        }
    } elseif ($tipo == 2) {
        $resultado =
            '<div class="col-6 px-2">
                <table class="table border-rounded">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Cedula empleado</th>
                            <th scope="col">Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
        //reemplazar con consulta
        $query = mysqli_query($link, "SELECT * from empleado");
        while ($row = mysqli_fetch_array($query)) {
            $cedula_empleado=$row['cedula_empleado'];
            $nombre_empleado=$row['nombre_empleado'];
            $resultado.='<tr><td>'.$cedula_empleado.'</td><td>'.$nombre_empleado.'</td></tr>';
         }
    } elseif ($tipo == 3) {
        $resultado =
            '<div class="col-6 px-2">
                <table class="table border-rounded">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">NIT</th>
                            <th scope="col">Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
        //reemplazar con consulta
        $query = mysqli_query($link,"SELECT * from empresa");
        while ($row = mysqli_fetch_array($query)) {
            $nit=$row['nit'];
            $nombre_empresa=$row['nombre_empresa'];
            $resultado.='<tr><td>'.$nit.'</td><td>'.$nombre_empresa.'</td></tr>';
         }
    }
    $resultado .=
        '</tbody>
                </table>
            </div>';
}
?>
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
    <!--Barra de navegacion-->
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
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 px-2">
                <div class="card">
                    <div class="card-header">
                        Consultas
                    </div>
                    <div class="card-body">
                        <form action="consultas.php" class="form-group" method="post">
                            <div class="form-group">
                                <label for="">Elija la consulta que desea realizar</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="consulta" id="exampleRadios1" value="1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Facturas sin empresas ni empleados.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="consulta" id="exampleRadios1" value="2">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Empleado con mayor número de facturas.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="consulta" id="exampleRadios2" value="3">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Empresas con monto total menor a 5000.
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Realizar consulta">
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                print($resultado);
                ?>
            </div>
        </div>
    </div>
</body>

</html>
<!-- En esta pagina puede encontrar mas informacion acerca de la estructura de un documento html 
    http://www.iuma.ulpgc.es/users/jmiranda/docencia/Tutorial_HTML/estruct.htm-->
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
                                    <input class="form-check-input" type="radio" name="consulta" id="exampleRadios1" value="1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Facturas sin empresas ni empleados.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="consulta" id="exampleRadios1" value="2" checked>
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
            </div>
        </div>
    </div>
</body>

</html>
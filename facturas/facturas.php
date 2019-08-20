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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <!--CDN de forntawesome: Libreria de estilos SCSS y CSS incluir icononos y formas 
     para mas informacio : https://fontawesome.com/start-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
        crossorigin="anonymous">
</head>

<body>
    <!--Barra de navegacion-->
    <ul class="nav">
        <li class="nav nav-item">
            <a class="nav-link " href="../index.html">inicio</a>
        </li>
        <li class="nav ">
            <a class="nav-link " href="../personas/personas.php">Personas</a>
        </li>
		<li class="nav ">
            <a class="nav-link " href="../empresas/empresas.php">Empresas</a>
        </li>
        <li class="nav-item nav-pills">
            <a class="nav-link active" href="facturas.html">Facturas</a>
        </li>
        <li class="nav ">
            <a class="nav-link " href="../busquedas/busquedas.php">Busquedas</a>
        </li>
        <li class="nav ">
            <a class="nav-link " href="../consultas/consultas.php">Consultas</a>
        </li>

    </ul>

    <div class="container mt-3">
        <div class="row">
        <?php
            if (isset($_GET["codigo"])) {
                ?>
            <div class="col-6 px-2">
                <div class="card">
                    <div class="card-header">
                        Editar facturas
                    </div>
                    <div class="card-body">
                        <!--formulario para insertar una persona mediante el metodo post-->
                        <form action="insert_f.php" class="form-group" method="post">
                            <div class="form-group">
                                <label for="cedula">Codigo</label>
                                <input type="text" readonly name="codigo" value=<?= $_GET["codigo"]; ?> id="codigo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Fecha</label>
                                <input type="date" name="fecha" value=<?= $_GET["fecha"]; ?> id="fecha" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Hora</label>
                                <input type="time" name="hora" value=<?= $_GET["hora"]; ?> id="hora" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Costo total</label>
                                <input type="text" name="costoTotal" value=<?= $_GET["costoTotal"]; ?> id="costoTotal" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Cedula empleado</label>
                                <input type="text" name="cedulaEmpleado" value=<?= $_GET["cedulaEmpleado"]; ?> id="cedulaEmpleado" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Factura para empresa o persona.</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="persona_empresa" id="empresa" value="empresa" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        empresa
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="persona_empresa" id="persona" value="persona">
                                    <label class="form-check-label" for="exampleRadios2">
                                        persona
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Cedula o nit</label>
                                <input type="text" name="cedula_nit" value=<?= $_GET["cedula_nit"]; ?> id="cedula_nit" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="insertar">
                                <a href="facturas.php" class="btn btn-success">Reiniciar</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <?php
            } else {
                ?>
            <div class="col-6 px-2">
                <div class="card">
                    <div class="card-header">
                        Insertar Factura
                    </div>
                    <div class="card-body">
                        <!--formulario para insertar una persona mediante el metodo post-->
                        <form action="insert_f.php" class="form-group" method="post">
                            <div class="form-group">
                                <label for="cedula">Codigo</label>
                                <input type="text" name="codigo" id="codigo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Fecha</label>
                                <input type="date" name="fecha" id="fecha" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Hora</label>
                                <input type="time" name="hora" id="hora" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Costo total</label>
                                <input type="text" name="costoTotal" id="costoTotal" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Cedula empleado</label>
                                <input type="text" name="cedulaEmpleado" id="cedulaEmpleado" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Factura para empresa o persona.</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="persona_empresa" id="empresa" value="empresa" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        empresa
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="persona_empresa" id="persona" value="persona">
                                    <label class="form-check-label" for="exampleRadios2">
                                        persona
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Cedula o nit</label>
                                <input type="text" name="cedula_nit" id="cedula_nit" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="insertar">
                                <a href="facturas.php" class="btn btn-success">Reiniciar</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <?php
            }
            ?>
            <div class="col-6 px-2">
                <table class="table border-rounded">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Costo Total</th>
                            <th scope="col">Cedula Empleado</th>
                            <th scope="col">Cedula</th>
                            <th scope="col">NIT</th>
                            <th scope="col">Opciónes</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require('select_f.php');
                        if ($result) {
                            foreach ($result as $fila) {
                                ?>
                        <tr>
                            <td><?= $fila['codigo_factura']; ?></td>
                            <td><?= $fila['fecha_de_generacion']; ?></td>
                            <td><?= $fila['hora_de_generacion']; ?></td>
                            <td><?= $fila['costo_total']; ?></td>
                            <td><?= $fila['cedula_empleado']; ?></td>
                            <td><?= $fila['cedula_persona']; ?></td>
                            <td><?= $fila['nit']; ?></td>
                            <td>
                                <form action="delete_f.php" method="POST">
                                    <input type="text" value=<?= $fila['codigo_factura']; ?> hidden>
                                    <input type="text" name="codigo_factura" value=<?= $fila['codigo_factura']; ?> hidden>
                                    <button class="btn btn-danger" title="eliminar" type="submit"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                            <td class="mx-0 pr-2">
                                <form action="facturas.php" method="GET">

                                    <input type="text" name="codigo" value='<?= $fila['codigo_factura']; ?>' hidden>
                                    <input type="text" name="fecha" value='<?= $fila['fecha_de_generacion']; ?>' hidden>
                                    <input type="text" name="hora" value='<?= $fila['hora_de_generacion']; ?>' hidden>
                                    <input type="text" name="costoTotal" value='<?= $fila['costo_total']; ?>' hidden>
                                    <input type="text" name="cedulaEmpleado" value='<?= $fila['cedula_empleado']; ?>' hidden>
                                    <input type="text" name="persona_empresa" value='<?= $fila['cedula_persona']; ?>' hidden>
                                    <input type="text" name="cedula_nit" value='<?= $fila['nit'].$fila['cedula_persona']; ?>' hidden>

                                    <button class="btn btn-primary" title="editar" type="submit"><i class="far fa-edit"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
</body>

</html>
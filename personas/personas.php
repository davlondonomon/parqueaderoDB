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
        <li class="nav-item nav-pills">
            <a class="nav-link active" href="personas.php">Personas</a>
        </li>
        <li class="nav nav-item">
            <a class="nav-link" href="../empresas/empresas.php">Empresas</a>
        </li>
        <li class="nav-item nav-pills">
            <a class="nav-link" href="../facturas/facturas.html">Facturas</a>
        </li>
        <li class="nav nav-item">
            <a class="nav-link" href="../busquedas/busquedas.php">Busquedas</a>
        </li>
        <li class="nav nav-item">
            <a class="nav-link" href="../consultas/consultas.php">Consultas</a>
        </li>

    </ul>
    <div class="container mt-3">
        <div class="row">
            <?php
            if (isset($_GET["cedula"])) {
                ?>
            <div class="col-6 px-2">
                <div class="card">
                    <div class="card-header">
                        Editar Persona
                    </div>
                    <div class="card-body">
                        <!--formulario para insertar una persona mediante el metodo post-->
                        <form action="update_p.php" class="form-group" method="post">
                            <div class="form-group">
                                <label for="cedula">Cedula</label>
                                <input type="text" readonly name="cedula" value=<?= $_GET["cedula"]; ?> id="cedula" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="nombre" value='<?= $_GET["nombre"]; ?>' id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <input type="text" name="direccion" value='<?= $_GET["direccion"]; ?>' id="direccion" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Telefono</label>
                                <input type="text" name="telefono" value=<?= $_GET["telefono"]; ?> id="telefono" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Género</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" id="exampleRadios1" value="masculino" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Masculino
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" id="exampleRadios2" value="femenino">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Femenino
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Atendido por empleado con cedula</label>
                                <input type="text" name="cedula_empleado" value=<?= $_GET["cedula_empleado"]; ?> id="cedula_empleado" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Editar">
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
                        Insertar persona
                    </div>
                    <div class="card-body">
                        <!--formulario para insertar una persona mediante el metodo post-->
                        <form action="insert_p.php" class="form-group" method="post">
                            <div class="form-group">
                                <label for="cedula">Cedula</label>
                                <input type="text" name="cedula" id="cedula" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="nombre" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Telefono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <input type="text" name="direccion" id="direccion" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Género</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" id="exampleRadios1" value="masculino" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Masculino
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" id="exampleRadios2" value="femenino">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Femenino
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Atendido por empleado con cedula</label>
                                <input type="text" name="cedula_empleado" id="cedula_empleado" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Insertar">
                                <a href="personas.php" class="btn btn-success">Cancelar</a>
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
                            <th scope="col">Cedula</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Género</th>
                            <th scope="col">Atendido por</th>
                            <th scope="col">Opciones</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require('select_p.php');
                        if ($result) {
                            foreach ($result as $fila) {
                                ?>
                        <tr>
                            <td><?= $fila['cedula_persona']; ?></td>
                            <td><?= $fila['nombre_persona']; ?></td>
                            <td><?= $fila['direccion']; ?></td>
                            <td><?= $fila['telefono_persona']; ?></td>
                            <td><?= $fila['genero']; ?></td>
                            <td><?= $fila['cedula_empleado']; ?></td>
                            <td>
                                <form action="delete_p.php" method="POST">
                                    <input type="text" value=<?= $fila['cedula_persona']; ?> hidden>
                                    <input type="text" name="cedula_persona" value=<?= $fila['cedula_persona']; ?> hidden>
                                    <button class="btn btn-danger" title="eliminar" type="submit"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                            <td class="mx-0 pr-2">
                                <form action="personas.php" method="GET">

                                    <input type="text" name="cedula" value=<?= $fila['cedula_persona']; ?> hidden>
                                    <input type="text" name="nombre" value='<?= $fila['nombre_persona']; ?>' hidden>
                                    <input type="text" name="direccion" value='<?= $fila['direccion']; ?>' hidden>
                                    <input type="text" name="telefono" value=<?= $fila['telefono_persona']; ?> hidden>
                                    <input type="text" name="genero" value=<?= $fila['genero']; ?> hidden>
                                    <input type="text" name="cedula_empleado" value=<?= $fila['cedula_empleado']; ?> hidden>

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
    </div>
</body>

</html>
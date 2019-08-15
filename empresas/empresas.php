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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--CDN de forntawesome: Libreria de estilos SCSS y CSS incluir icononos y formas 
     para mas informacio : https://fontawesome.com/start-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <!--Barra de navegacion-->
    <ul class="nav">
        <li class="nav nav-item">
            <a class="nav-link " href="../index.html">inicio</a>
        </li>
        <li class="nav nav-item">
            <a class="nav-link" href="../personas/personas.php">Personas</a>
        </li>
		<li class="nav nav-pills">
            <a class="nav-link active" href="empresas.php">Empresas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../facturas/facturas.html">Facturas</a>
        </li>
        <li class="nav ">
            <a class="nav-link " href="../busquedas/busquedas.php">Busquedas</a>
        </li>
		
	</ul>
	
	    <div class="container mt-3">
        <div class="row">
            <?php
                if(isset($_GET["nit"])){
             ?>
            <div class="col-6 px-2">
                <div class="card">
                    <div class="card-header">
                        Editar Empresa
                    </div>
                    <div class="card-body">
                        <!--formulario para insertar una empresa mediante el metodo post-->
                        <form action="update_e.php" class="form-group" method="post">
                            <div class="form-group">
                                <label for="cedula">NIT</label>
                                <input type="text" readonly name="nit" value=<?=$_GET["nit"];?> id="nit"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="nombre" value='<?=$_GET["nombre"];?>' id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <input type="text" name="telefono" value='<?=$_GET["telefono"];?>' id="telefono" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Gerente</label>
                                <input type="text" name="gerente" value=<?=$_GET["gerente"];?> id="gerente" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Guardar">
                                <a href="empresas.php" class="btn btn-danger">descartar</a>
                                
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <?php
           }
        else{
             ?>
            <div class="col-6 px-2">
                <div class="card">
                    <div class="card-header">
                        Insertar Empresa
                    </div>
                    <div class="card-body">
                        <!--formulario para insertar una persona mediante el metodo post-->
                        <form action="insert_e.php" class="form-group" method="post">
                            <div class="form-group">
                                <label for="cedula">NIT</label>
                                <input type="text" name="nit" id="nit" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="nombre" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Gerente</label>
                                <input type="text" name="gerente" id="gerente" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="insertar">
                                <a href="empresas.php" class="btn btn-success">Reiniciar</a>
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
                            <th scope="col">NIT</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Gerente</th>
                            <th scope="col">Opciones</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        require('select_e.php');
                        if($result){
                            foreach ($result as $fila){
                        ?>
                        <tr>
                            <td><?=$fila['nit'];?></td>
                            <td><?=$fila['nombre'];?></td>

                            <td><?=$fila['telefono'];?></td>

                            <td><?=$fila['gerente'];?></td>
                            <td>

                                <form action="delete_e.php" method="POST">
                                    <input type="text" value=<?=$fila['nit'];?> hidden>
                                    <input type="text" name="del" value=<?=$fila['nit'];?> hidden>
                                    <button class="btn btn-danger" title="eliminar" type="submit"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                            <td class="mx-0 pr-2">
                                <form action="empresas.php" method="GET">
                                    
                                    <input type="text" name="nit" value=<?=$fila['nit'];?> hidden>
                                    <input type="text" name="nombre" value='<?=$fila['nombre'];?>' hidden>
                                    <input type="text" name="telefono" value='<?=$fila['telefono'];?>' hidden>
                                    <input type="text" name="gerente" value=<?=$fila['gerente'];?> hidden>

                                    <button class="btn btn-primary" title="editar" type="submit"><i
                                            class="far fa-edit"></i></button>
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
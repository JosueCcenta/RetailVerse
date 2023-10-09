<?php 
require "layout/header.php";
include("funciones/paginacionUsuarios.php");

?>

<main class="contenido">
        
        <div class="contenedorTitulo">
            <h1 class="Titulo-principal">Gestion RetailVerse</h1>
            <form method="post" action="./funciones/actualizar.php" class="formulario-productos">
                <input type="text" class="form-control" name="campo" id="campo" placeholder="Ingrese el usuario a buscar...">
            </form>
        </div>

        <div id="botones" style="text-align: center;">
            <button class="btn btn-primary mt-4" id="editar">Editar</button>
            <button class="btn btn-danger mt-4" id="eliminar">Eliminar</button>
        </div>

        <div id="Formularios">
            <form id="formulario-editar" action="funciones/editarUsuario.php" method="POST" style="display:none;"> 
                <h1>Editar Usuario</h1>
                <label for="">Id</label><br>
                <input type="text" name="id"><br>
                <label for="">Nombre</label><br>
                <input type="text" name="nombre"><br>
                <label for="">Apellido</label><br>
                <input type="text" name="apellido"><br>
                <label for="">Correo Electronico</label><br>
                <input type="text" name="correoElectronico"><br>
                <label for="categoria" class="mt-2">Categoria Usuario</label>
                    <select name="categoria" required name="categoria" id="categoria">
                        <option value="">--Selecciona--</option>
                        <option value="1">Administrador</option>
                        <option value="2">Usuario</option>
                    </select><br>
                <button class="boton btn btn-primary" type="submit">Guardar</button>
            </form> 

            <form id="formulario-eliminar" action="funciones/eliminarUsuario.php" method="POST" style="display:none;"> 
                <h1>Eliminar Usuario</h1>
                <label for="">Id</label><br>
                <input type="text" name="id"><br>
                <button class="boton btn btn-danger" type="submit">Eliminar</button>
            </form> 
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item <?php echo $_GET['pagina']<=1 ? 'disabled': '' ?>"><a class="page-link" href="http://localhost/inicio/gestion/verUsuarios.php?pagina=<?php echo$_GET['pagina']-1?>">Previous</a></li>
                
                <?php for($i=0;$i<$paginas;$i++): ?>
                <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active': '' ?>"><a class="page-link" href="http://localhost/inicio/gestion/verUsuarios.php?pagina=<?php echo $i+1?>">
                    <?php echo $i+1?>
                </a></li>
                <?php endfor ?>
                
                <li class="page-item <?php echo $_GET['pagina']>=$paginas ? 'disabled': '' ?>"><a class="page-link" href="http://localhost/inicio/gestion/verUsuarios.php?pagina=<?php echo$_GET['pagina']+1?>">Next</a></li>
            </ul>
        </nav>
        <table class="table table-striped" id="productos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>USUARIO</th>
                    <th>CONTRASEÑA</th>
                    <th>CORREO</th>
                    <th>CARGO</th>
                </tr>
            </thead>
            <tbody id="contenido1">
            <?php
                if(!$_GET){
                    header("Location:http://localhost/inicio/gestion/actualizarProducto.php?pagina=1");
                }
                $inicio=($_GET['pagina']-1)*$elementos_x_pagina;
                $consultaProductos = "SELECT * FROM usuarios LIMIT :iniciar,:nproductos";
                $ejecucion = $bd->prepare($consultaProductos);
                $ejecucion->bindParam(":iniciar",$inicio,PDO::PARAM_INT);
                $ejecucion->bindParam(":nproductos",$elementos_x_pagina,PDO::PARAM_INT);
                $ejecucion->execute();
                $resultadoProductos = $ejecucion->fetchAll(); 
                ?>

                <?php foreach ($resultadoProductos as $producto): ?>
                <tr>
                    <td><?php echo $producto['id']?></td>
                    <td><?php echo $producto['nombre']?></td>
                    <td><?php echo $producto['apellido']?></td>
                    <td><?php echo $producto['usuario']?></td>
                    <td><?php echo $producto['contrasena']?></td>
                    <td><?php echo $producto['correoElectronico']?></td>
                    <td><?php echo $producto['idCargo']?></td>

                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </main>
    </div>
    <script src="Js/actualizar.js" defer></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
<?php 
    require("./layout/header.php");
    include("funciones/paginacionProductos.php");
?>

    <main class="contenido">
        
        <div class="contenedorTitulo">
            <h1 class="Titulo-principal">Gestion RetailVerse</h1>
            <form method="post" action="./funciones/actualizar.php" class="formulario-productos">
                <input type="text" class="form-control" name="campo" id="campo" placeholder="Ingrese el producto a buscar...">
            </form>
        </div>

        <div id="botones" style="text-align: center;">
            <button class="btn btn-primary mt-4" id="editar">Editar</button>
        </div>

        <div id="Formularios">
            <form id="formulario-editar" action="funciones/editar.php" method="POST" style="display:none;" enctype="multipart/form-data"> 
                <h1>Editar Producto</h1>
                <label for="">Id</label><br>
                <input type="text" name="id"><br>
                <label for="">Titulo</label><br>
                <input type="text" name="titulo"><br>
                <label for="categoria" class="mt-2">Categoria Producto</label>
                    <select name="categoriaProducto" required name="categoria" id="categoria">
                        <option value="">--Selecciona--</option>
                        <option value="Ropa">Ropa</option>
                        <option value="Pantalones">Pantalones</option>
                        <option value="Calzado">Calzado</option>
                    </select><br>
                <label for="">Precio</label><br>
                <input type="text" name="precio"><br>
                <label for="">Cantidad</label><br>
                <input type="text" name="cantidad"><br>
                <label for="imagen">Imagen Producto:</label><br>
                <input type="file" name="imagen" id="imagen" class="mt-2"><br>
                <button class="boton btn btn-primary" type="submit">Guardar</button>
            </form> 

        </div>
        <nav aria-label="Page navigation example">
            <?/* El código está generando un sistema de paginación para la tabla de productos. Crea una lista
            de números de página y botones de navegación (Anterior y Siguiente) para permitir que el usuario navegue a través de la
            diferentes páginas de productos. */?>
            <ul class="pagination">
                <li class="page-item <?php echo $_GET['pagina']<=1 ? 'disabled': '' ?>"><a class="page-link" href="http://localhost/inicio/gestion/actualizarProducto.php?pagina=<?php echo$_GET['pagina']-1?>">Previous</a></li>
                
                <?php for($i=0;$i<$paginas;$i++): ?>
                <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active': '' ?>"><a class="page-link" href="http://localhost/inicio/gestion/actualizarProducto.php?pagina=<?php echo $i+1?>">
                    <?php echo $i+1?>
                </a></li>
                <?php endfor ?>
                
                <li class="page-item <?php echo $_GET['pagina']>=$paginas ? 'disabled': '' ?>"><a class="page-link" href="http://localhost/inicio/gestion/actualizarProducto.php?pagina=<?php echo$_GET['pagina']+1?>">Next</a></li>
            </ul>
        </nav>
        <table class="table table-striped" id="productos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITULO</th>
                    <th>CATEGORIA</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>
                </tr>
            </thead>
            <tbody id="contenido">
                <?php
                /* Este bloque de código es responsable de obtener y mostrar los productos de la carpeta
                base de datos. */
                if(!$_GET){
                    header("Location:http://localhost/inicio/gestion/actualizarProducto.php?pagina=1");
                }
                $inicio=($_GET['pagina']-1)*$elementos_x_pagina;
                $consultaProductos = "SELECT * FROM productos LIMIT :iniciar,:nproductos";
                $ejecucion = $bd->prepare($consultaProductos);
                $ejecucion->bindParam(":iniciar",$inicio,PDO::PARAM_INT);
                $ejecucion->bindParam(":nproductos",$elementos_x_pagina,PDO::PARAM_INT);
                $ejecucion->execute();
                $resultadoProductos = $ejecucion->fetchAll(); 
                ?>

                <?php foreach ($resultadoProductos as $producto): ?>
                <tr>
                    <td><?php echo $producto['id']?></td>
                    <td><?php echo $producto['titulo']?></td>
                    <td><?php echo $producto['categoria']?></td>
                    <td><?php echo $producto['precio']?></td>
                    <td><?php echo $producto['cantidad']?></td>
                    
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
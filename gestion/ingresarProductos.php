<?php require("./layout/header.php")?>

        <main class="contenido">
            <h1 class="Titulo-principal">Gestion RetailVerse</h1>
            <div class="form-productos">
                <form method="post" action="funciones/ingresarProductosFunct.php" enctype="multipart/form-data">
                    <label for="titulo">Titulo Publicacion:</label>
                    <br>
                    <input type="text" class="form-control" name="tituloProducto" placeholder="Ingrese el titulo para la publicacion...">
                    <br>
                    <label for="categoria">Categoria Producto</label>
                    <select name="categoriaProducto" required name="categoria" id="categoria">
                        <option value="">--Selecciona--</option>
                        <option value="Ropa">Ropa</option>
                        <option value="Pantalones">Pantalones</option>
                        <option value="Calzado">Calzado</option>
                    </select>
                    <br>
                    
                    <div class="mt-3" id="Tallas">
                        <label for="talla">Talla Producto:</label>
                        <br>
                        <label for="XS">
                            <input type="checkbox" id="XS"> XS
                        </label>
                        <input class="mt-2" type="number" id="XS-invisible" name="XS" style="display: none;" value=0 placeholder="Ingrese la cantidad: ">
                        <br>
                        <label for="S">
                            <input type="checkbox" id="S"> S
                        </label>
                        <input class="mt-2" type="number" id="S-invisible" name="S" style="display: none;" value=0 placeholder="Ingrese la cantidad: ">
                        <br>
                        <label for="M">
                            <input type="checkbox" id="M"> M
                        </label>
                        <input class="mt-2" type="number" id="M-invisible" name="M" style="display: none;" value=0 placeholder="Ingrese la cantidad: ">
                        <br>
                        <label for="L">
                            <input type="checkbox" id="L"> L
                        </label>
                        <input class="mt-2" type="number" id="L-invisible" name="L" style="display: none;" value=0 placeholder="Ingrese la cantidad: ">
                        <br>
                        <label for="XL">
                            <input type="checkbox" id="XL"> XL
                        </label>
                        <input class="mt-2" type="number" id="XL-invisible" name="XL" style="display: none;" value=0 placeholder="Ingrese la cantidad: ">
                        <br>
                        <label id="zapatilla" for="tallaZapatilla">
                            <input type="checkbox" id="tallaZapatilla"> Zapatilla
                        </label>
                        <input class="mt-2" type="number" id="Zapatilla-invisible" name="tallaZapatilla" style="display:none;" value=0 placeholder="Ingrese la talla...">
                        <br>
                    </div>

                    <label class="mt-2" for="precio">Precio producto</label><br>
                    <input type="text" class="form-control" name="precioProducto" placeholder="Ingrese el precio del producto...">
                    <br>
                    <label for="imagen">Imagen Producto:</label><br>
                    <input type="file" name="imagen" id="imagen" class="mt-2"><br>
                    <input class="btn btn-primary mt-4" type="submit" value="Registrar">
                </form>
            </div>

        </main>


    </div>
    <script src="Js/mostrarInput.js"></script>
    <script>mostrarInputsTallas();</script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
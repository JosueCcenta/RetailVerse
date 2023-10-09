<?/* Este código comprueba si la sesión está vacía o no está configurada. Si la sesión está vacía o no está configurada,
muestra un mensaje de error y detiene la ejecución del resto del código usando el comando 'die()'
función. El mensaje de error se muestra como una alerta con un enlace a la página de inicio de sesión. */?>

<?php
    session_start();
    if(empty($_SESSION) or $_SESSION==""):
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Error</title>
</head>
<body>
    <div class="alert alert-danger mt-5 " role="alert">
        Inicie Sesion para continuar <a href="http://localhost/inicio/inicioSesion/index.php">Iniciar Sesion</a>
    </div>

</body>
</html>
<?php   
        die();
    endif;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Sistema de gestion RetailVerse</title>
</head>
<body>
    <div class="contenedor-gestion">
        <aside>
            <header>
                <h1 class="logo">RetailVerse</h1>
            </header>

            <nav class="barra-navegacion">
                <ul class="menu">
                    <li><button class="boton-menu boton-categoria active" id="cerrarSesion"><a href="./funciones/cerrarSesion.php">Cerrar Sesion</a></button></li>
                    <li><button class="boton-menu boton-categoria active" id="irInicio"><a href="../index.html">Ir a inicio</a></button></li>
                    <li><button class="boton-menu boton-categoria active" id="ingresarProductos"><a href="ingresarProductos.php">Ingresar Productos</a></button></li>
                    <li><button class="boton-menu boton-categoria active" id="actualizarProductos"><a href="actualizarProducto.php?pagina=1">Actualizar Productos</a></button></li>
                    <li><button class="boton-menu boton-categoria active" id="verUsuarios"><a href="verUsuarios.php?pagina=1">Ver usuarios registrados</a></button></li>
                </ul>
            </nav>
            <footer>
                <p class="texto-footer">Creado por Josue</p>
            </footer>
        </aside>

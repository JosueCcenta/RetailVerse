<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>    

    <div class="contenedor">
        <div class="fondoCuadro"> </div> 
        <div class="cuadroPrincipal">
            <h1>¡Bienvenido!</h1>
            <div class="Forms">
                <form action="" method="post">
                    <div class="usuario">
                        <label class="labelusr">Usuario</label>
                        <input type="text" class="form-control" name="usuario" required>
                    </div><br>
                    <div class="contraseña">
                        <label class="labelcontra">Contraseña</label>
                        <input type="password" class="form-control" name="contraseña" required>
                    </div><br>
                    <hr>
                    <div class="contenedorRegistro">
                        <a class="registro" href="registro.php">Registrarme</a>
                    </div><br>
                    <button type="submit" id="boton" class="btn btn-primary">Ingresar</button><br>
                    <a href="../index.html">Volver a Inicio</a><br>
                    <a href="../inicioSesion/contraseñaOlvidada.php">Cambiar la contraseña</a>
                    <?php require("Func/validacion.php") ?>
                </form>
            </div>
        </div>
          
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</html>
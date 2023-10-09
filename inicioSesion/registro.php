<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/registro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>    

    <div class="contenedor">
        <div id="ventana">
            
        </div>
        <div class="fondoCuadro"> </div> 
        <div class="cuadroPrincipal">
            <h1>¡Bienvenido!</h1>
            <div class="Forms">
                <form class="row g-3 needs-validation" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" novalidate>
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="validationCustom01" placeholder="Ingrese su nombre" name="nombre" required>
                        <div class="valid-feedback">
                        Porfavor elija una nombre
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="validationCustom02" placeholder="Ingrese su apellido" name="apellido" required>
                        <div class="valid-feedback">
                        Porfavor elija una apellido
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustomUsername" class="form-label">Correo Electronico</label>
                        <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" class="form-control" id="validationCustomUsername" placeholder="nombre@dominio.com" name="correo" required>
                        <div class="invalid-feedback">
                        Porfavor elija un correo electronico
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Contraseña</label>
                        <input  type="password" class="form-control" id="validationCustom03" placeholder="Ingrese una contraseña"  name="contraseña" required>
                        <div class="invalid-feedback">
                        Porfavor elija una contraseña
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="validationCustomUsername" class="form-label">Nombre de Usuario</label>
                        <div class="input-group has-validation">
                        <input type="email" class="form-control" id="validationCustomUsername" placeholder="Ingrese un usuario" name="usuario" required>
                        <div class="invalid-feedback">
                            Porfavor elija un nombre de usario
                        </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Registrarme</button>
                    </div>
                </form>
                <div class="sugerencia mt-5">                
                    <a href="index.php">¿Ya tienes una cuenta creada? Ingresa Aqui</a>
                </div>
                <div class="error">
                    <?php
                    include 'Func/registrarse.php' ;
                    ?>
                </div>
            </div>
        </div>
          
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</html>
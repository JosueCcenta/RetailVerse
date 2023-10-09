<?php
session_start();
require 'conexion.php';

   /* Este código recupera el valor del parámetro 'token' de la URL mediante la URL.
A continuación, comprueba si el token no está vacío. Y por ultimo verifica que el token 
exista dentro de la tabla usuarios en la columna token, si existe guarda el id del usuario
que tiene el token en una sesion y sino nos dice un mensaje de error y se termina el programa*/


$token = $_GET['token'];

if (!empty($token)) {
    try {
        $consulta = "SELECT id FROM usuarios WHERE token=:token";
        $respuesta = $bd->prepare($consulta);
        $respuesta->bindParam(":token", $token);
        $respuesta->execute();
        $campos = $respuesta->fetch(PDO::FETCH_ASSOC);
        if (!empty($campos)) {
            $id = $campos['id'];
            $_SESSION['id'] = $id;
        } else {
            echo "Token no admitible";
            die();
        }
        $respuesta->closeCursor();
    } catch (Exception $e) {
        die("Se ha encontrado un error" . $e->getMessage());
    } finally {
        $bd = null;
    }
} else {
    echo "Token no válido.";
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/apartadoContraseña.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="contenedor">
        <div class="decoracion">
            <div class="form">
                <div class="titulo">
                    <h1>Cambiar Contraseña</h1>
                    <a href="/inicioSesion/index.html">Iniciar sesion</a>
                </div>
                <form action="nuevaContraseña.php" method="post">
                    <label for=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                        <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
                        </svg>Nueva contraseña:
                    </label><br>
                    <input type="password" name="contrasena" id="contrasena" class="mt-2" placeholder="Contraseña...">
                    <input type="number" name="id" value="<?php echo $id?>" readonly style="display:none">
                    <input type="submit" value="Cambiar">
                    <div class="mensaje mt-3">
                    </div>
                </form>
                <hr>
            </div> 
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
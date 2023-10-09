<?php
session_start();
require 'conexion.php';

if (isset($_SESSION['correo'])) {
    $correoUsuario = $_SESSION['correo'];
} 

/* El código genera un token aleatorio usando 'random_bytes(16)' y lo convierte a un hexadecimal
string usando 'bin2hex()'. Este token se utilizará para restablecer la contraseña o verificar. */
$token = bin2hex(random_bytes(16));
$expiracion = date('Y-m-d H:i:s', strtotime('+1 hour'));

/* Este código está actualizando la tabla "usuarios" en la base de datos con un nuevo token y una fecha de vencimiento para
un usuario específico. Utiliza instrucciones preparadas para evitar la inyección SQL. El token y la caducidad
los valores se enlazan a la instrucción preparada mediante el método 'bindParam'. Después de ejecutar el comando
, genera un enlace de verificación utilizando el token y lo asigna a la variable`enlace`. */
$insertarToken="UPDATE usuarios SET token=:token,expiracionToken=:expiracion WHERE correoElectronico=:correo";
$resultado=$bd->prepare($insertarToken);
$resultado->bindParam(":correo",$correoUsuario);
$resultado->bindParam(":token",$token);
$resultado->bindParam(":expiracion",$expiracion);
$resultado->execute();

$enlace = "http://localhost/inicio/inicioSesion/Func/verificacionToken.php?token=$token";

$_SESSION['enlace'] = $enlace;

$destinatario = $correoUsuario; 
$asunto= "Recuperando Clave";
$cuerpo ='
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>';
$cuerpo .= ' 
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box; 
}

.contenedor {
    display: flex;
    justify-content: center; 
    align-items: center; 
    height: 100vh; 
}

.mensaje {
    width: 70%;
    text-align: center; 
    border: 1px solid #ccc; 
    padding: 20px;
}

.titulo {
    padding: 2%;
}

.text-1{
    text-align: left;
}

.border{
    height: 10vh;
    background-color: blueviolet;
}
</style>';
$cuerpo .= '
</head>
<body>
    <div class="contenedor">
        <table class="mensaje">
            <tr>
                <td><div class="border"></div></td>
            </tr>
            <tr>
                <td>
                    <h1 class="titulo">Restablecer Contraseña</h1>
                    <p class="text-1">Se recibio una solicitud para el cambio de contraseña haz click en el siguiente enlace para crear una nueva contraseña:</p>
                    <a href="'.$enlace.'"><button class="btn btn-success">Restablecer Contraseña</button></a><br>
                    <p class="text-1 mt-2">Si no puedes hacer click en el boton solo copia el siguiente enlace y pegalo en el navegador de su preferencia: </p>
                    <p class="link text-1">'.$enlace.'</p>
                    <p class="text-1 mt-4">Si ha sido usted quien envio la solicitud para reestablecer la contraseña, por favor ignore el mensaje.</p>
                </td>
            </tr>
            <tr>
                <td><div class="border"></div></td>
            </tr>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>';
$cuerpo.='
</body>
</html>';
$headers  = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
$headers .= "From: \r\n"; 
$headers .= "Reply-To: "; 
$headers .= "Return-path:"; 
$headers .= "Cc:"; 
$headers .= "Bcc:"; 

/* La función 'mail()' se utiliza para enviar un correo electrónico. En este código, se utiliza para enviar un correo electrónico a
el destinatario especificado en la variable 'destinatario'. El correo electrónico tendrá el asunto especificado
en la variable 'asunto' y el contenido especificado en la variable 'cuerpo'. Los encabezados de la clase
email se especifican en la variable 'headers'. */
mail($destinatario,$asunto,$cuerpo,$headers);


?>
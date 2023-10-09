<?php
require 'conexion.php';
error_reporting(0);
ini_set('display_errors', 0);
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$correo=$_POST['correo'];
$contraseña=$_POST['contraseña'];
$usuario=$_POST['usuario'];
$cargo=2;  

try {
    $sql="INSERT INTO usuarios(nombre,apellido,usuario,contrasena,correoElectronico,idCargo)VALUES(:nombre,:apellido,:usuario,:contrasena,:correo,:cargo)";
    
    /* Este código está realizando una comprobación de verificación antes de insertar un nuevo usuario en la base de datos. */
    $verification="SELECT * FROM usuarios WHERE usuario=:usuario OR correoElectronico=:correo";
    $verificacion= $bd->prepare($verification);
    $verificacion->bindParam(":usuario",$usuario);
    $verificacion->bindParam(":correo",$correo);
    $verificacion->execute();
    $registro=$verificacion->fetch(PDO::FETCH_ASSOC);
    if ($registro !== false) {
        echo"<div class='alert alert-danger'>Usuario o Correo ya registrados</div>";
        die();
    }
    $verificacion->closeCursor();
    /*Inserta los valores en la base de datos con el script sql*/ 
    $resultado = $bd->prepare($sql);
    $resultado->bindParam(":nombre", $nombre);
    $resultado->bindParam(":apellido", $apellido);
    $resultado->bindParam(":usuario", $usuario);
    $resultado->bindParam(":contrasena", $contraseña);
    $resultado->bindParam(":correo", $correo);
    $resultado->bindParam(":cargo",$cargo);
    $resultado->execute();

    $resultado->closeCursor();
    echo"<div class='alert alert-success'>Se registro correctamente</div>";

} catch (Exception $e) {

    //die("Se ha encontrado un error" . $e->getMessage());

} finally {

    $bd = null;

}

?>

<?php
session_start();
require("conexion.php");
/* Este código comprueba si la variable de sesión 'id' es nula o está vacía. Si es así, significa que el
usuario no está autorizado y el código mostrará el mensaje "No tienes autorización" y finalice la ejecución
del script usando la función 'die()'. */
$id = $_SESSION['id'];
if($id==null || $id=''){
    echo "No tienes autorizacion";
    die();
}
/* Este código está actualizando la contraseña de un usuario en una tabla de base de datos llamada "usuarios". */
$contraseña = $_POST['contrasena'];
$id_Usuario = $_POST['id'];

$consulta = "UPDATE usuarios SET contrasena=:contrasena WHERE id =:id";
$stmt = $bd->prepare($consulta);
$stmt->bindParam(":id", $id_Usuario, PDO::PARAM_INT);
$stmt->bindParam(":contrasena", $contraseña, PDO::PARAM_STR);
$stmt->execute();
$stmt->closeCursor();
header("Location:../index.php");
?>
<?php
session_start();
require("conexion.php");
$id = $_SESSION['id'];
if($id==null || $id=''){
    echo "No tienes autorizacion";
    die();
}
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
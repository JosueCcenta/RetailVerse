<?php
require 'conexion.php';
session_start();
if($_POST){
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $_SESSION['user'] = $usuario;

    try {
        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND contrasena = :contrasena";
        $resultado = $bd->prepare($sql);
        $resultado->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $resultado->bindParam(":contrasena", $contraseña, PDO::PARAM_STR);
        $resultado->execute();

        $registro = $resultado->fetch(PDO::FETCH_ASSOC);

        if (!empty($registro)) {
            if ($registro['idCargo'] == 1) { 
                header("Location: http://localhost/inicio/gestion/ingresarProductos.php");
                exit();
            } elseif ($registro['idCargo'] == 2) {
                header("Location: http://localhost/inicio/");
                exit();
            } else {
                echo "Error en la autenticación";
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>Usuario o contraseña incorrecto</div>";
        }

        $resultado->closeCursor();
    } catch (Exception $e) {
        die("Se ha encontrado un error" . $e->getMessage());
    } finally {
        $bd = null;
    }

}

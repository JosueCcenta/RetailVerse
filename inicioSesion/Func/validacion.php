<?php
require 'conexion.php';
session_start();
if($_POST){
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $_SESSION['user'] = $usuario;

    try {
 /* Este código está realizando una consulta a la base de datos para seleccionar todas las filas de la tabla "usuarios" donde el
 "usuario" coincide con el nombre de usuario proporcionado y la columna "contrasena" coincide con el nombre de usuario proporcionado
 contraseña. */
        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND contrasena = :contrasena";
        $resultado = $bd->prepare($sql);
        $resultado->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $resultado->bindParam(":contrasena", $contraseña, PDO::PARAM_STR);
        $resultado->execute();

      /* Este bloque de código está comprobando si el resultado de la consulta 'sql' no está vacío. Si no está vacío,
      comprueba el valor de la columna 'idCargo' y redirecciona dependiendo del cargo que tengan. */

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

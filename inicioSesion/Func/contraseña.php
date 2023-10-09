<?php

require 'conexion.php';

try {
    if (!empty($_POST)) {
        $correo = $_POST['email'];

        $sql = "SELECT correoElectronico FROM usuarios WHERE correoElectronico = :correo";
        $resultado = $bd->prepare($sql);
        $resultado->bindParam(":correo", $correo);
        $resultado->execute();
        $registro = $resultado->fetch(PDO::FETCH_ASSOC);
        if ($registro) {
            echo "<div class='alert alert-success'>Se envió el correo de recuperación a su email</div>";
            include 'enviarCorreo.php';
            $_SESSION['correo'] = $correo;
        } else {
            echo "<div class='alert alert-warning'>El correo no existe</div>";
        }
    }
} catch (Exception $e) {
    die("Se ha encontrado un error" . $e->getMessage());
} finally {
    $bd = null;
}
?>
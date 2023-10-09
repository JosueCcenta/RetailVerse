<?php
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correoElectronico = $_POST['correoElectronico'];
$categoria = $_POST['categoria'];

try {
    /* Este código está actualizando un registro en la tabla "usuarios" de una base de datos MySQL. */
    $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $consulta = "UPDATE usuarios SET nombre = :nombre, apellido = :apellido, correoElectronico = :correo, idCargo= :categoria WHERE id = :id";

    $stmt = $pdo->prepare($consulta);

    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
    $stmt->bindParam(":apellido", $apellido, PDO::PARAM_STR);
    $stmt->bindParam(":correo", $correoElectronico, PDO::PARAM_STR);
    $stmt->bindParam(":categoria", $categoria, PDO::PARAM_INT);

    $stmt->execute();
    $stmt->closeCursor();
    header("location:../verUsuarios.php?pagina=1");
} catch (PDOException $e) {
    echo "Error de conexión a la base de datos: " . $e->getMessage();
} finally {
    $pdo = null;
}
?>



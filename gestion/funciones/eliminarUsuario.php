<?php
$id = $_POST['id'];

try {
    $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $consulta = "DELETE FROM usuarios WHERE id=:id";

    $stmt = $pdo->prepare($consulta);

    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    $stmt->execute();
    
    header("location:../verUsuarios.php?pagina=1");
} catch (PDOException $e) {
    echo "Error de conexión a la base de datos: " . $e->getMessage();
} finally {
    $pdo = null;
}
?>





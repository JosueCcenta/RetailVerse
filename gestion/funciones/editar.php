<?php
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$categoria = $_POST['categoriaProducto'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$imagen="";
$carpetaDestino = "img/";
$rutaCompleta="";

    if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === 0) {
        $nombreArchivo = $_FILES["imagen"]["name"];
        $archivoTmp = $_FILES["imagen"]["tmp_name"];
        $extension = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));

        $extensionesPermitidas = array("jpg", "jpeg", "png");

        if (in_array($extension, $extensionesPermitidas)) {

            $nombreUnico = uniqid() . "." . $extension;
            $rutaSubida = $carpetaDestino . $nombreUnico;
            $rutaCompleta ="http://localhost/inicio/gestion/funciones/img/".$nombreUnico;

            if (move_uploaded_file($archivoTmp, $rutaSubida)) {
                echo "La imagen se ha cargado correctamente.";
               
            } else {
                echo "Hubo un error al cargar la imagen.";
            }
        } else {
            echo "Tipo de archivo no permitido. Se permiten solo archivos JPG, JPEG y PNG.";
        }
    } else {
        echo "No se ha proporcionado una imagen válida.";
    } 

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $consulta = "UPDATE productos SET 
            titulo = IFNULL(:titulo, titulo), 
            categoria = IFNULL(:categoria, categoria), 
            precio = IFNULL(:precio, precio), 
            cantidad = IFNULL(:cantidad, cantidad), 
            imagen = IFNULL(:imagen, imagen) 
            WHERE id = :id";
        $stmt = $pdo->prepare($consulta);
    
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":titulo", $titulo, PDO::PARAM_STR);
        $stmt->bindParam(":categoria", $categoria, PDO::PARAM_STR);
        $stmt->bindParam(":precio", $precio, PDO::PARAM_STR);
        $stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
        $stmt->bindParam(":imagen", $rutaCompleta);
    
        $stmt->execute();
        header("location:../actualizarProducto.php?pagina=1");
    } catch (PDOException $e) {
        echo "Error de conexión a la base de datos: " . $e->getMessage();
    } finally {
        $pdo = null;
    }
?>





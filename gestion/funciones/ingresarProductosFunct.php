<?php

$titulo=$_POST['tituloProducto'];
$categoria=$_POST['categoriaProducto'];
$tallazapatilla=$_POST['tallaZapatilla'];
$precio=$_POST['precioProducto'];
$XS=$_POST['XS'];
$S=$_POST['S'];
$M=$_POST['M'];
$L=$_POST['L'];
$XL=$_POST['XL'];
$null=0;
$cantidad=$XS+$S+$M+$L+$XL;
$imagen="";
$carpetaDestino = "img/";
    
/* Este bloque de código es responsable de manejar el archivo de imagen cargado. Comprueba si un archivo de imagen fue
cargado y si no hay errores en el proceso de carga. A continuación, comprueba la extensión del archivo para
Asegúrese de que sea uno de los tipos permitidos (jpg, jpeg, png). Si el archivo supera estas comprobaciones,
genera un nombre único para el archivo, especifica la carpeta de destino del archivo y mueve el
temporal a la carpeta de destino. Por último, se hace eco de un mensaje de éxito si el archivo fue
cargado correctamente, o un mensaje de error si hubo un problema con la carga. */
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
                die();
            }
        } else {
            echo "Tipo de archivo no permitido. Se permiten solo archivos JPG, JPEG y PNG.";
            die();
        }
    } else {
        echo "No se ha proporcionado una imagen válida.";
        die();
    }


try{
    
/* Este código establece una conexión a una base de datos MySQL usando PDO (PHP Data Objects). Establece el parámetro
host, nombre de la base de datos, nombre de usuario y contraseña para la conexión. A continuación, establece el modo de error en
Produce excepciones si se produce algún error durante la ejecución de las consultas. También establece el carácter
establecido en UTF-8. */
    $base=new PDO('mysql:host=localhost;dbname=test','root','');
    $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET utf8");
    $sql="INSERT INTO productos(titulo,categoria,precio,cantidad,imagen)VALUES(:titulo,:categoria,:precio,:cantidad,:imagen)";
    $resultado= $base->prepare($sql);
    $resultado->bindParam(':titulo',$titulo);
    $resultado->bindParam(':categoria',$categoria);
    $resultado->bindParam(':precio',$precio);
    $resultado->bindParam(':cantidad',$cantidad);
    $resultado->bindParam(':imagen',$rutaCompleta);
    $resultado->execute();
    $resultado->closeCursor();


    /* Este código recupera el valor máximo de la columna "id" de la tabla "productos" en el archivo
    base de datos. Asigna el valor máximo a la variable "ultimoid" para su uso posterior. */
    $sql2="SELECT MAX(id) AS ultimo_id FROM productos";
    $resultado = $base->query($sql2);
    $fila = $resultado->fetch(PDO::FETCH_ASSOC);
    $ultimoID = $fila["ultimo_id"];
    $resultado->closeCursor();


   /* Este bloque de código es responsable de insertar datos en la tabla "producto_tallas" en el archivo
   base de datos. Prepara una sentencia SQL con marcadores de posición para los valores que se van a insertar. */
    $sql3="INSERT INTO producto_tallas(producto_id,XS,S,M,L,XL,numeroZapatilla)VALUES(:idProduc,:xs,:s,:m,:l,:xl,:numZapatilla)";
    $resultado= $base->prepare($sql3);
    $resultado->bindParam(':idProduc',$ultimoID);
    if(empty($tallazapatilla)){
        $resultado->bindParam(':xs',$XS);
        $resultado->bindParam(':s',$S);
        $resultado->bindParam(':m',$M);
        $resultado->bindParam(':l',$L);
        $resultado->bindParam(':xl',$XL);
        $resultado->bindParam(':numZapatilla',$null);

    }else{
        $resultado->bindParam(':xs',$null);
        $resultado->bindParam(':s',$null);
        $resultado->bindParam(':m',$null);
        $resultado->bindParam(':l',$null);
        $resultado->bindParam(':xl',$null);
        $resultado->bindParam(':numZapatilla',$tallazapatilla);
    }
    if($resultado->execute()){
        header("Location:../ingresarProductos.php");
    }else{
        echo"No se ha podido guardar los datos...";
    }
    $resultado->closeCursor();


}catch(Exception $e){

    die("Se ha encontrado un error".$e->getMessage());

}finally{

    $base=null;

}

?>
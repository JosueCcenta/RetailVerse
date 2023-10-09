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


    $sql2="SELECT MAX(id) AS ultimo_id FROM productos";
    $resultado = $base->query($sql2);
    $fila = $resultado->fetch(PDO::FETCH_ASSOC);
    $ultimoID = $fila["ultimo_id"];
    $resultado->closeCursor();


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
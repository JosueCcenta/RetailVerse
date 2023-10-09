<?php
/* Este código establece una conexión a una base de datos MySQL usando PDO (PHP Data Objects) y
ejecutando una consulta SELECT para recuperar todas las filas de la tabla "usuarios". */

$bd=new PDO("mysql:host=localhost;dbname=test","root","");
$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$solicitud=$bd->prepare("SELECT * FROM productos");
$solicitud->execute();

$elementos_x_pagina=8;
$totalElementos=$solicitud->rowCount();
$paginas=ceil($totalElementos/8); 

/**Luego declara los elementos por pagina de la paginacion y los cuenta. Por ultimo dividiendo los numeros de elementos totales 
 * entre la cantidad de elementos por pagina, redondeando hacia adelante.
 */



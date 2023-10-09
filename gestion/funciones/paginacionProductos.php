<?php

$bd=new PDO("mysql:host=localhost;dbname=test","root","");
$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$solicitud=$bd->prepare("SELECT * FROM productos");
$solicitud->execute();

$elementos_x_pagina=8;
$totalElementos=$solicitud->rowCount();
$paginas=ceil($totalElementos/8); 





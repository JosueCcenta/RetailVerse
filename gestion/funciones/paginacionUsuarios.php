<?php

$bd=new PDO("mysql:host=localhost;dbname=test","root","");
$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$solicitud=$bd->prepare("SELECT * FROM usuarios");
$solicitud->execute();

$elementos_x_pagina=5;
$totalElementos=$solicitud->rowCount();
$paginas=ceil($totalElementos/5); 




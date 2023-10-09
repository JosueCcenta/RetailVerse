<?php
/*Establece una conexión a una base de datos MySQL usando el PDO de PHP (PHP Data Objects)*/
$dbname="test";
$user="root";
$password="";

$bd=new PDO("mysql:host=localhost; dbname=$dbname",$user,$password);
$bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$bd->exec("SET CHARACTER SET utf8");
?>
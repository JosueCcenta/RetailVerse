<?php
$dbname="test";
$user="root";
$password="";

$bd=new PDO("mysql:host=localhost; dbname=$dbname",$user,$password);
$bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$bd->exec("SET CHARACTER SET utf8");

?>
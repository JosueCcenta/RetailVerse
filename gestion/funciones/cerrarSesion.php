<?php
session_start();
$_SESSION = array();
session_destroy();
echo "Sesion cerrada";
header("Location:http://localhost/inicio/inicioSesion/index.php");
?>
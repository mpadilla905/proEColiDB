<?php

$usuario = 'regulonuser';
$contrasena = 'ReguL1igh22#';
$basededatos = 'regulondb';
$servidor = '132.248.248.120';
$puerto = '3306';


$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos, $puerto) or die ("No se ha podido conectar al servidor de Base de datos");


// Si la conexión falla, aparece el error
if($conexion === false) {
 echo 'Ha habido un error <br>'.mysqli_connect_error();
} 
?>

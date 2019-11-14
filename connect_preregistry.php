<?php

$usuario = 'sophia';
$contrasena = 'genomaliigh';
$basededatos = 'RegistryForm';
$servidor = 'localhost';
$puerto = '3306';


$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos, $puerto) or die ("No se ha podido conectar al servidor de Base de datos");


if($conexion === false) { 
 echo 'Ha habido un error <br>'.mysqli_connect_error(); 
} else {

 	$consulta = "SELECT * FROM User";
	
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos".mysqli_connect_error());


}
?>

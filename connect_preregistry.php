<?php
// Carga la configuración 
//$config = parse_ini_file('config.ini'); 

// Conexión con los datos del 'config.ini' 
//$connection = mysqli_connect('localhost:8889',$config['username'],$config['password'],$config['dbname']); 
//$connection = mysqli_connect('localhost:8889',$config['root'],$config['root'],$config['mmv']); 



$usuario = 'sophia';
$contrasena = 'genomaliigh';
$basededatos = 'RegistryForm';
$servidor = 'localhost';
$puerto = '3306';


$conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos, $puerto) or die ("No se ha podido conectar al servidor de Base de datos");


// Si la conexión falla, aparece el error 
if($conexion === false) { 
 echo 'Ha habido un error <br>'.mysqli_connect_error(); 
} else {
// echo 'Conectado a la base de datos';

 	$consulta = "SELECT * FROM User";
	
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos".mysqli_connect_error());

	//$filas = mysqli_num_rows($resultado);

	//echo "\n filas: ".$filas."\n";
}



?>

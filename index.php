<?php

require_once './Autoload.php';

if(isset($_GET['controlador'])){
	$nombre_clase = $_GET['controlador'] . "Controller";
}else{
	$nombre_clase = null; 
}

if(isset($_GET['metodo'])){
	$nombre_metodo = $_GET['metodo'];
}else{
	$nombre_metodo = null;
}

if(class_exists($nombre_clase)){
	$obj = new $nombre_clase();
}else{
	$obj = new UsuarioController();

	header("Location:". url_base . "Usuario/" );
	
}

if(method_exists($nombre_clase, $nombre_metodo)){
	$obj->$nombre_metodo();
}else{
	$obj->index();
}

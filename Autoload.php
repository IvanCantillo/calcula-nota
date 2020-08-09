<?php

function Autoload($nombreClase){
	require_once 'Controllers/'. $nombreClase .".php";
}

spl_autoload_register('Autoload');


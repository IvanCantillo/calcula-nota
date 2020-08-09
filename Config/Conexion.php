<?php

class Conexion{

	public static function conectar(){

		$datos = [

			"local" => [
				"host" => "localhost",
				"dbname" => 'ctn',
				"usuario" => 'root',
				"password" => ''
			],

			"produccion" => [
				"host" => "localhost",
				"dbname" => 'id13006963_ctn',
				"usuario" => 'id13006963_ctn_root',
				"password" => 'Mehibam030716..'

			],

		];

		try {
			
			$conexion = new PDO("mysql:host=" . $datos['produccion']['host'] . ";" .
				"dbname=". $datos['produccion']['dbname'], 
				$datos['produccion']['usuario'] , 
				$datos['produccion']['password']
			);

			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$conexion->exec("SET CHARACTER SET UTF8");

		} catch (Exception $e) {

			die("El error esta en la linea: " . $e->getLine() . "<br>Mensaje del error: " . $e->getMessage());

		}

		return $conexion;

	}

}

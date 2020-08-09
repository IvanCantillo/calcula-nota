<?php 
require_once 'Config/Conexion.php';

class UsuarioModel{

	private $id;
	private $nombres;
	private $apellidos;
	private $fk_genero;
	private $telefono;
	private $correo;
	private $password;
	private $fk_estado;
	private $conexion;


	/**
	 * Class Constructor
	 * @param    $conexion   
	 */

	public function __construct() {
		$this->conexion = Conexion::conectar();
	}



	/**
	 * @param mixed $id
	 *
	 * @return self
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}


	/**
	 * @param mixed $nombres
	 *
	 * @return self
	 */
	public function setNombres($nombres)
	{
		$this->nombres = $nombres;

		return $this;
	}


	/**
	 * @param mixed $apellidos
	 *
	 * @return self
	 */
	public function setApellidos($apellidos)
	{
		$this->apellidos = $apellidos;

		return $this;
	}

	/**
	 * @param mixed $fk_genero
	 *
	 * @return self
	 */
	public function setFkGenero($fk_genero)
	{
		$this->fk_genero = $fk_genero;

		return $this;
	}    

	/**
	 * @param mixed $telefono
	 *
	 * @return self
	 */
	public function setTelefono($telefono)
	{
		$this->telefono = $telefono;

		return $this;
	}


	/**
	 * @param mixed $correo
	 *
	 * @return self
	 */
	public function setCorreo($correo)
	{
		$this->correo = $correo;

		return $this;
	}


	/**
	 * @param mixed $password
	 *
	 * @return self
	 */
	public function setPassword($password)
	{
		$this->password = $password;

		return $this;
	}


	/**
	 * @param mixed $estado
	 *
	 * @return self
	 */
	public function setFkestado($fk_estado)
	{
		$this->fk_estado = $fk_estado;

		return $this;
	}


	function buscarCorreo(){
		$sqlBuscar = "SELECT * FROM usuarios WHERE correo = :correo";
		$buscar = $this->conexion->prepare($sqlBuscar);
		$buscar->execute( array( ":correo" => $this->correo ) );

		return $buscar->fetch( PDO::FETCH_ASSOC );
	}

	function buscarPersona(){
		
		$sqlBuscar = "SELECT usuarios.*, generos.genero AS genero
		FROM usuarios
		INNER JOIN generos
		ON usuarios.fk_genero = generos.id
		WHERE usuarios.id = :id";

		$buscar = $this->conexion->prepare($sqlBuscar);
		$buscar->execute( array( ":id" => $this->id ) );

		return $buscar->fetch( PDO::FETCH_ASSOC );
	}

	function login(){
		$sqlLogin = "SELECT * FROM usuarios WHERE correo = :correo AND password = :password";
		$login = $this->conexion->prepare( $sqlLogin );
		$login->execute( array( ":correo" => $this->correo, ":password" => $this->password ) );

		return $login->fetch( PDO::FETCH_ASSOC );
	}

	function create(){

		$sqlCreate = "INSERT INTO `usuarios`(`nombres`, `apellidos`, fk_genero , `telefono`, `correo`, `password`) VALUES (:nombre, :apellido, :fk_genero , :telefono, :correo, :password)";

		$create = $this->conexion->prepare( $sqlCreate );

		$create->execute( array( ":nombre" => $this->nombres, ":apellido" => $this->apellidos , ":fk_genero" => $this->fk_genero, 
			":telefono" => $this->telefono, ":correo" => $this->correo, ":password" => $this->password) );

		return $create;
	}

	function actualizar_password() {
		
		$sqlPassword = "UPDATE `usuarios` SET password = :password  WHERE id = :id";
		$password = $this->conexion->prepare( $sqlPassword );
		$password->execute( array( ":password" => $this->password, ":id" => $this->id ) );

		return $password;
	}

}


?>
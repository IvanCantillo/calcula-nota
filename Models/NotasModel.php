<?php 

require_once 'Config/Conexion.php';

class NotasModel{

	private $id;
	private $materia;
	private $nota;
	private $fk_usuario;
	private $conexion;


	/**
	 * Class Constructor 
	 * @param    $conexion   
	 */

	public function __construct(){
		$this->conexion = Conexion::conectar();
	}



  /**
   * @param mixed $id
   *
   * @return self
   */
  public function setId($id){
  	$this->id = $id;

  	return $this;
  }

  /**
   * @param mixed $materia
   *
   * @return self
   */
  public function setMateria($materia){
  	$this->materia = $materia;

  	return $this;
  }

  /**
   * @param mixed $nota
   *
   * @return self
   */
  public function setNota($nota){
  	$this->nota = $nota;

  	return $this;
  }

  /**
   * @param mixed $fk_usuario
   *
   * @return self
   */
  public function setFkUsuario($fk_usuario){
  	$this->fk_usuario = $fk_usuario;

  	return $this;
  }

  function getNotas(){

  	$sqlNotas = "SELECT * FROM notas WHERE fk_usuario = :usuario";
  	$notas = $this->conexion->prepare( $sqlNotas );
  	$notas->execute( array( ":usuario" => $this->fk_usuario ) );

  	return $notas;
  	
  }

  function createNota(){

    $sqlCreate = "INSERT INTO notas (materia, nota, fk_usuario) VALUES (:materia, :nota, :fk_usuario)";
    $create = $this->conexion->prepare( $sqlCreate );
    $create->execute( array( ":materia" => $this->materia, ":nota" => $this->nota, ":fk_usuario" => $this->fk_usuario ) );

    return $create;

  }

  function buscarMateria(){

    $sqlMateria = "SELECT * FROM notas WHERE materia = :materia AND fk_usuario = :fk_usuario";
    $materia = $this->conexion->prepare( $sqlMateria );
    $materia->execute( array( ":materia" => $this->materia, ":fk_usuario" => $this->fk_usuario ) );

    return $materia->fetch( PDO::FETCH_ASSOC );
  }

  function buscarNota() {

    $sqlBuscar = "SELECT * FROM notas WHERE id = :id";
    $buscar = $this->conexion->prepare( $sqlBuscar );
    $buscar->execute( array( ":id" => $this->id ) );

    return $buscar->fetch( PDO::FETCH_ASSOC );
  }

  function eliminar() {

    $sqlEliminar = "DELETE FROM `notas` WHERE id = :id";
    $eliminar = $this->conexion->prepare( $sqlEliminar );
    $eliminar->execute( array( ":id" => $this->id ) );

    return $eliminar;
  }

  function actualizar() {

    $sqlActualizar = 'UPDATE `notas` SET `materia`= :materia, nota = :nota WHERE `id`= :id';
    $actualizar = $this->conexion->prepare( $sqlActualizar );
    $actualizar->execute( array( ":materia" => $this->materia, ":nota" => $this->nota, ":id" => $this->id ) );

    return $actualizar;

  }

  function promedio() {

    $sqlPromedio = 'SELECT COUNT(id) AS cantidad, SUM(nota) AS notas FROM `notas` where `fk_usuario` = :fk_usuario';
    $promedio = $this->conexion->prepare( $sqlPromedio );
    $promedio->execute( array( ":fk_usuario" => $this->fk_usuario ) );

    return $promedio->fetch( PDO::FETCH_ASSOC );
    
  }

}

?>
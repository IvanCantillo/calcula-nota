<?php 

require_once 'Config/Conexion.php';

class TareaModel {

	private $id;
	private $mensaje;
	private $estado;
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
    public function setId($id) {
    	$this->id = $id;

    	return $this;
    }

    /**
     * @param mixed $mensaje
     *
     * @return self
     */
    public function setMensaje($mensaje) {
    	$this->mensaje = $mensaje;

    	return $this;
    }

    /**
     * @param mixed $estado
     *
     * @return self
     */
    public function setEstado($estado) {
    	$this->estado = $estado;

    	return $this;
    }

    /**
     * @param mixed $fk_usuario
     *
     * @return self
     */
    public function setFkUsuario($fk_usuario) {
    	$this->fk_usuario = $fk_usuario;

    	return $this;
    }

    function tareas() {

    	$sqlAll = "SELECT * FROM tareas WHERE fk_usuario = :fk_usuario";
    	$all = $this->conexion->prepare( $sqlAll );
    	$all->execute( array( ":fk_usuario" => $this->fk_usuario ) );

    	return $all;

    }

    function buscar_tarea() {

        $sqlBuscar = "SELECT * FROM tareas WHERE id = :id";
        $buscar = $this->conexion->prepare( $sqlBuscar );
        $buscar->execute( array( ":id" => $this->id ) );

        return $buscar->fetch( PDO::FETCH_ASSOC );

    }

    function crear_tarea() {

        $sqlCrear = "INSERT INTO `tareas`(`mensaje`, `fk_usuario`) VALUES (:mensaje, :fk_usuario)";
        $crear = $this->conexion->prepare( $sqlCrear );
        $crear->execute( array( ":mensaje" => $this->mensaje, ":fk_usuario" => $this->fk_usuario ) );

        return $crear;
    }

    function actualizar_estado() {

        $sqlActualizar = 'UPDATE `tareas` SET `estado`= :estado WHERE `id`= :id';
        $actualizar = $this->conexion->prepare( $sqlActualizar );
        $actualizar->execute( array( ":estado" => $this->estado, ":id" => $this->id ) );

        return $actualizar;

    }

    function actualizar_tarea() {

        $sqlActualizar = 'UPDATE tareas SET mensaje = :mensaje WHERE id = :id';
        $actualizar = $this->conexion->prepare( $sqlActualizar );
        $actualizar->execute( array( ":mensaje" => $this->mensaje, ":id" => $this->id ) );

        return $actualizar;

    }

    function eliminar_tarea(){

        $sqlEliminar = "DELETE FROM `tareas` WHERE id = :id";
        $eliminar = $this->conexion->prepare( $sqlEliminar );
        $eliminar->execute( array( ":id" => $this->id ) );

        return $eliminar;

    }

}


?>
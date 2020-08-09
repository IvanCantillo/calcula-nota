<?php 

require_once 'Config/Parametros.php';
require_once 'Models/NotasModel.php';
require_once 'Models/TareaModel.php';

class NotasController {

	function index(){

		session_start();

		if(isset($_SESSION['usuario']['id'])){

			$objNotas = new NotasModel();
			$objTareas = new TareaModel();

			$objTareas->setFkUsuario( $_SESSION['usuario']['id'] );
			$objNotas->setFkUsuario( $_SESSION['usuario']['id'] );

			$resTareas = $objTareas->tareas();
			$resNotas = $objNotas->promedio();

			$calculo = 0;

			$resDatos = [
				'bg' => 'bg-secondary',
				'emoji' => 'fa-smile-beam',
				'nota' => 0.0
			];


			if ( $resNotas['cantidad'] > 0 ){

				$calculo = number_format( ($resNotas['notas'] / $resNotas['cantidad']) , 1);

				if ( $calculo <= ( $resNotas['notas'] * 50 ) / $resNotas['notas'] ){

					$resDatos['bg'] = 'bg-danger';
					$resDatos['emoji'] = 'fa-sad-cry';
					$resDatos['nota'] = $calculo;

				}else if( $calculo > ($resNotas['notas'] * 50) / $resNotas['notas'] && $calculo < ($resNotas['notas'] * 75) / $resNotas['notas']) {

					$resDatos['bg'] = 'bg-warning';
					$resDatos['emoji'] = 'fa-meh';
					$resDatos['nota'] = $calculo;

				}else{
					$resDatos['nota'] = $calculo;
					$resDatos['bg'] = 'bg-success';
				}



			}


			require_once 'Views/inicioView.php';

		}else{

			session_start();
			session_destroy();
			header("location: ". url_base . "Usuario/");

		}

	}

	function mis_notas () {

		session_start();

		if(!isset($_SESSION['usuario']['id'])){

			session_destroy();
			header("location: ". url_base . "Usuario/index");

		}else{

			$objNotas = new NotasModel();
			$objNotas->setFkUsuario( $_SESSION['usuario']['id'] );
			$resNotas = $objNotas->getNotas();

			require_once 'Views/notasView.php';

		}

	}

	function calcular() {

		session_start();

		if(!isset($_SESSION['usuario']['id'])){

			session_destroy();
			header("location: ". url_base . "Usuario/index");

		}else{

			require_once 'Views/calcularView.php';

		}

	}

	function calcular_nota(){

		$res = [
			"nota" => 0.0,
			"materia" => "",
			"exito" => 'false',
			"msg" => '',
		];


		if ( isset( $_POST['materia'] ) && $_POST['materia'] != '') {


			$nota_min = $_POST['nota_min'];
			$nota_max = $_POST['nota_max'];
			$arrayNotas = array();
			$arrayPorcentajes = array();
			$notaFinal = 0.0;
			$porcentajeFinal = 0;

			// Rescatamaos los valores del array de nota

			foreach ($_POST['nota'] as $nota ) {
				array_push($arrayNotas, $nota);
			}

			// Rescatamaos los valores del array de porcentaje

			foreach ($_POST['porcentaje'] as $porcentaje ) {
				array_push($arrayPorcentajes, $porcentaje);
			}

			//Longitu del array, se saca solo uno porque la longitud de ambos es la misma.

			$logintud = count( $arrayNotas );

			for ( $i=0; $i < $logintud; $i++ ) { 

				if( $arrayNotas[$i] < $nota_min ){

					$res['exito'] = 'false';
					$res['msg'] = 'La nota minima es ' . $_POST['nota_min'] . '. Porfavor verifique sus notas';

					break;

				}else if( $arrayNotas[$i] > $nota_max ){

					$res['exito'] = 'false';
					$res['msg'] = 'La nota maxima es ' . $_POST['nota_max'] . '. Porfavor verifique sus notas';

					break;

				}else{

					$notaFinal += ( $arrayNotas[$i] * $arrayPorcentajes[$i] ) / 100;
					$porcentajeFinal += $arrayPorcentajes[$i]; 
					$res['exito'] = 'true';

				}

			}

			if($res['exito'] == 'true'){

				if( $porcentajeFinal > 100 ){

					$res['msg'] = "El total de los porcentajes debe ser menor o igual a 100%";
					$res['exito'] = 'false';

				}else if( $porcentajeFinal < 1 ){

					$res['msg'] = "El total de los porcentajes debe ser mayor o igual a 1%";
					$res['exito'] = 'false';

				}else{

					$res['nota'] = $notaFinal;
					$res['materia'] = $_POST['materia'];

				}

			}


		}

		echo json_encode($res);

	}

	function guardar() {

		session_start();

		$res = [
			"msg" => 'error',
			"exito" => 'false',
			"id" => 0
		];

		if(isset($_POST['enviar']) && $_POST['enviar'] == true){

			$objNotas = new NotasModel();
			$objNotas->setMateria( ucfirst( $_POST['materia'] ) );
			$objNotas->setFkUsuario( $_SESSION['usuario']['id'] );

			$resMateria = $objNotas->buscarMateria();

			if($resMateria['materia'] == ''){

				$objNotas->setNota( $_POST['nota'] );

				$objNotas->createNota();

				$res['exito'] = 'true';

			}else{

				$res['msg'] = "La materia " . $resMateria['materia'] . " ya tiene una nota. ¿Desea actualizar la nota?";
				$res['exito'] = 'warning';
				$res['id'] = $resMateria['id'];

			}
		}

		echo json_encode($res);

	}

	function eliminar() {

		session_start();

		if ( isset($_SESSION['usuario']['id']) ) {

			$res = [
				"exito" => 'false'
			];

			if (isset($_POST['enviar']) && $_POST['enviar'] == true) {

				$objNotas = new NotasModel();

				$objNotas->setId( $_POST['id'] );

				$objNotas->eliminar();

				$res['exito'] = 'true';

			}

			echo json_encode( $res );

		}else{

			session_destroy();
			header("location: ". url_base . "Usuario/index");

		}

	}

	function actualizar() {

		$res = [
			"exito" => 'false'
		];

		session_start();

		if ( isset($_SESSION['usuario']['id']) ) {

			$objNota = new NotasModel();

			$objNota->setId( $_POST['id'] );
			$objNota->setMateria( $_POST['materia'] );
			$objNota->setNota( $_POST['nota'] );

			$objNota->actualizar();

			$res['exito'] = 'true';

		}else{

			session_destroy();
			header("location: ". url_base . "Usuario/index");

		}

		echo json_encode( $res );

	}

	function crear_tarea() {

		$res = [
			"exito" => 'false',
		];

		session_start();

		if ( isset($_SESSION['usuario']['id']) ) {

			$objTarea = new TareaModel();

			$objTarea->setFkUsuario( $_SESSION['usuario']['id'] );
			$objTarea->setMensaje( $_POST['tarea'] );

			$resTarea = $objTarea->crear_tarea();

			$res['exito'] = 'true';


		}else {

			session_destroy();
			header("location: ". url_base . "Usuario/index");

		}

		echo json_encode( $res );		

	}

	function actualizar_estado() {

		$res = [
			"exito" => 'false',
		];

		session_start();

		if ( isset($_SESSION['usuario']['id']) ) {

			$objTarea = new TareaModel();

			$objTarea->setId( $_POST['id'] );
			$objTarea->setEstado( $_POST['estado'] );

			$objTarea->actualizar_estado();

			$res['exito'] = 'true';

		}else{

			session_destroy();
			header("location: ". url_base . "Usuario/index");

		}

		echo json_encode( $res );	

	}

	function eliminar_tarea(){

		$res = [
			"exito" => 'false',
		];

		session_start();

		if ( isset($_SESSION['usuario']['id']) ) {

			$objTarea = new TareaModel();

			$objTarea->setId( $_POST['id'] );

			$objTarea->eliminar_tarea();

			$res['exito'] = 'true';

		}else{

			session_destroy();
			header("location: ". url_base . "Usuario/index");

		}

		echo json_encode( $res );

	}

	function buscar_tarea() {
		$res = [
			"exito" => 'false',
			"msg" => ''
		];

		session_start();

		if ( isset($_SESSION['usuario']['id']) ) {

			$objTarea = new TareaModel();

			$objTarea->setId( $_POST['id'] );

			$resTarea = $objTarea->buscar_tarea();

			$res['exito'] = 'true';
			$res['msg'] = $resTarea['mensaje'];

		}else{

			session_destroy();
			header("location: ". url_base . "Usuario/index");

		}

		echo json_encode( $res );

	}

	function buscar_nota() {

		$res = [
			"exito" => 'false',
			"nota" => 0.0,
			"materia" => ''
		];

		session_start();

		if ( isset($_SESSION['usuario']['id']) ) {

			$objNota = new NotasModel();

			$objNota->setId( $_POST['id'] );

			$resNota = $objNota->buscarNota();

			$res['exito'] = 'true';
			$res['nota'] = $resNota['nota'];
			$res['materia'] = $resNota['materia'];

		}else{

			session_destroy();
			header("location: ". url_base . "Usuario/index");

		}

		echo json_encode( $res );

	}

	function actualizar_tarea() {

		$res = [
			"exito" => 'false',
			"msg" => ''
		];

		session_start();

		if ( isset($_SESSION['usuario']['id']) ) {

			$objTarea = new TareaModel();

			$objTarea->setId( $_POST['id'] );
			$objTarea->setMensaje( $_POST['tarea'] );

			$objTarea->actualizar_tarea();

			$res['exito'] = 'true';

		}else{

			session_destroy();
			header("location: ". url_base . "Usuario/index");

		}

		echo json_encode( $res );

	}

}


?>
<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

require_once 'Config/Parametros.php';
require_once 'Models/UsuarioModel.php';



class UsuarioController{

	function iniciar_sesion(){

		$respuesta = [
			'exito' => 'false',
			'msg' => "Usuario no encontrado"
		];

		if(isset($_POST['correo']) && $_POST['correo'] != ''){

			$objUsuario = new UsuarioModel();

			$objUsuario->setCorreo($_POST['correo']);
			$resUsuarios = $objUsuario->buscarCorreo();

			if ($resUsuarios['correo'] != ''){

				$objUsuario->setPassword( hash( "sha256", $_POST['password'] ) );
				$resLogin = $objUsuario->login();

				$foto = '';

				if( $resLogin['fk_genero'] == 1 ){

					$foto = 'avatar04.png';

				}else if( $resLogin['fk_genero'] ) { 

					$foto = 'avatar2.png';

				}else{

					$foto = 'photo1.png';

				}


				if ($resLogin['password'] != '') {

					session_start();

					$_SESSION['usuario'] = [
						'id' => $resLogin['id'],
						'correo' => $resLogin['correo'],
						'nombre' => $resLogin['nombres'],
						'foto' => $foto,
					];

					$respuesta['exito'] = 'true';
					$respuesta['msg'] = "Bienvenido(a) " . $resLogin['nombres'];

				}else{

					$respuesta['msg'] = "Contraseña incorrecta";

				}
			}else{
				$respuesta['msg'] = "Usuario no registrado";
			}

		}

		echo json_encode( $respuesta );

	}

	function index(){

		session_start();

		if(isset($_SESSION['usuario']['id'])){

			header("location: ". url_base . "Notas/");

		}else{

			require_once 'Views/loginView.php';

		}

	}

	function cerrar_sesion(){

		session_start();
		session_destroy();
		header("location: ". url_base . "Usuario/index");

	}

	function registro() {

		session_start();

		if(isset($_SESSION['usuario']['id'])){

			header("location: ". url_base . "Notas/");

		}else{

			require_once 'Views/registroView.php';

		}

	}

	function cambiar_password(){

		$res = [

			"msg" => 'No se pudo actualizar la contraseña, porfavor intentelo mas tarde.',
			"exito" => 'false'

		];

		session_start();

		if( isset( $_SESSION['usuario']['id'] ) ){

			$objUsuario = new UsuarioModel();
			
			$objUsuario->setId( $_SESSION['usuario']['id'] );
			$objUsuario->setPassword( hash("sha256", $_POST['password']) );

			$objUsuario->actualizar_password();

			$res['msg'] = 'Contraseña actualizada con exito';
			$res['exito'] = 'true';

		}

		echo json_encode( $res );

	}

	function guardar(){

		$respuesta = [
			'exito' => 'false',
			'msg' => "Error al registrarse"
		];

		if(isset($_POST['correo']) && $_POST['correo'] != ''){

			$objUsuario = new UsuarioModel();

			$objUsuario->setCorreo( $_POST['correo'] );

			$resUsuario = $objUsuario->buscarCorreo(); 

			if($resUsuario['correo'] == ''){

				$objUsuario->setNombres( $_POST['nombre'] );
				$objUsuario->setApellidos( $_POST['apellido'] );
				$objUsuario->setFkGenero( $_POST['genero'] );
				$objUsuario->setTelefono( $_POST['telefono'] );
				$objUsuario->setPassword( hash( "sha256", $_POST['password'] ) );

				$objUsuario->create();

				$resNewUsuario = $objUsuario->buscarCorreo(); 

				$foto = '';

				if( $resNewUsuario['fk_genero'] == 1 ){

					$foto = 'avatar04.png';

				}else if( $resNewUsuario['fk_genero'] ) { 

					$foto = 'avatar2.png';

				}else{

					$foto = 'photo1.png';

				}

				session_start();

				$_SESSION['usuario'] = [
					'id' => $resNewUsuario['id'],
					'correo' => $resNewUsuario['correo'],
					'nombre' => $resNewUsuario['nombres'],
					'foto' => $foto,
				]; 

				$respuesta['exito'] = 'true';

				$respuesta['msg'] = "Bienvenido(a) " . $resNewUsuario['nombres'];

			}else{

				$respuesta['exito'] = 'warning';
				$respuesta['msg'] = "El usuario ya se encuentra registrado";

			}


		}

		echo json_encode($respuesta);

	}

	function recuperar_password() {

		session_start();

		if(isset($_SESSION['usuario']['id'])){

			header("location: ". url_base . "Notas/");

		}else{

			require_once 'Views/recuperarPasswordView.php';

		}

	}

	function recuperar() {

		$respuesta = [
			'exito' => 'false',
			'msg' => "Error al registrarse"
		];

		$objUsuario = new UsuarioModel();
		$objUsuario->setCorreo( $_POST['correo'] );
		$resUsuario = $objUsuario->buscarCorreo();

		if($resUsuario['correo'] != ''){

			$mail = new PHPMailer(true);

			$correo = $resUsuario['correo'];
			$password = hash("sha256", $resUsuario['password']);

			$objUsuario->setId( $resUsuario['id'] );
			$objUsuario->setPassword( $password );

			$objUsuario->actualizar_password();

			try {

				$mail->isSMTP();                                          
				$mail->Host       = 'smtp.gmail.com	';                    
				$mail->SMTPAuth   = true;                                 
				$mail->Username   = 'ctn.contacto@gmail.com';             
				$mail->Password   = 'Mehibam030716..';                    
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;       
				$mail->Port       = 587;                                  

				$mail->setFrom('ctn.contacto@gmail.com', 'Calcula Tu Nota');
				$mail->addAddress($correo);     

				$mail->isHTML(true);                                  
				$mail->Subject = utf8_decode( 'Nueva contraseña' );
				$mail->Body    = utf8_decode( "Hola <b>". $resUsuario['nombres'] ." ". $resUsuario['apellidos'] ."</b>, esta es tu nueva contraseña: <br><br>
					<b>Contraseña: </b>" . $resUsuario['password']);

				$mail->send();

				$res['exito'] = 'true';
				$res['msg'] = 'Revisa tu correo y encontraras la nueva contraseña. <br> Si crees que no te ah llegado, revisa la carpeta spam';

			} catch (Exception $e) {

				$res['msg'] = 'Error al enviar el correo.';

			}

		}else{

			$res['msg'] = 'El usuario no exite, porfavor revise el correo.';

		}	

		echo json_encode( $res );

	}

	function perfil() {

		session_start();

		if(isset( $_SESSION['usuario']['id']) ){

			$objUsuario = new UsuarioModel();

			$objUsuario->setId( $_SESSION['usuario']['id'] );

			$resUsuario = $objUsuario->buscarPersona();

			require_once 'Views/perfilView.php';

		}else{

			header("location: ". url_base . "Usuario/");			

		}

	}

	function prueba() {

		echo hash("sha256", "Mehibam030716..");

	}

}

?>
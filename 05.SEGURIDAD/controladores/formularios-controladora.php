<?php 

Class ConroladorFormularios {

	/*=============================================
	=            	 FORMULARIOS 		          =
	=============================================*/
	
	STATIC public function ctrRegistro() {
		if(isset($_POST["registroName"])) {
			if(
				preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["registroName"]) &&
				preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["registroEmail"]) &&
				preg_match('/^[0-9a-zA-Z]+$/', $_POST["registroPassword"])
			){
				$tabla = "registros";
				$token = md5($_POST["registroName"]."+".$_POST["registroEmail"]);
				$encriptarPassword = crypt($_POST['registroPassword'], '$2a$09$anexamplestringforsalt$');
				$datos = array(
					"token"=>$token,
					"nombre"=>$_POST["registroName"],
					"email"=>$_POST["registroEmail"],
					"password"=>$encriptarPassword
				);

				$rta = ModeloFormulario::mdlRegistro($tabla, $datos);
				return $rta;		
			} else {
				$rta = "error";
				return $rta;
			}
		} 
	}

	/*=============================================
	=         	SELECCIONAR REGISTROS             =
	=============================================*/

	static public function ctrSeleccionarRegistros($item, $valor) {
		$tabla = "registros";
		$respuesta = ModeloFormulario::mdlSeleccionarRegistros($tabla, $item, $valor);
		return $respuesta;
	}

	/*=============================================
	=            		INGRESO  	              =
	=============================================*/

	public function ctrIngreso() {
		if(isset($_POST["ingresoEmail"])) {
			$tabla = "registros";
			$item = "email";
			$valor = $_POST["ingresoEmail"];
			$respuesta = ModeloFormulario::mdlSeleccionarRegistros($tabla, $item, $valor);
			$encriptarPassword = crypt($_POST['ingresoPassword'], '$2a$09$anexamplestringforsalt$');

			if($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $encriptarPassword) {
				ModeloFormulario::mdlActualizarIntentosFallidos($tabla, 0, $respuesta["token"]);
				$_SESSION["validarIngreso"] = "ok";
				echo '<script>
				if(window.history.replaceState) {
					window.history.replaceState(null, null, window.location.href);
				}
				window.location = "inicio";
				</script>';
			} else {
				if($respuesta['intentos_fallidos'] < 3) {
					$intentos_fallidos = $respuesta["intentos_fallidos"] + 1;
					ModeloFormulario::mdlActualizarIntentosFallidos($tabla, $intentos_fallidos, $respuesta["token"]);
				} else {
					echo '<div class="alert alert-warning">RECAPCHA Debes validad de que no eres un ROBOT</div>';
				}
				echo '<script>
				if(window.history.replaceState) {
					window.history.replaceState(null, null, window.location.href);
				}
				</script>';
				echo '<div class="alert alert-danger">Error al ingresar al sistema!</div>';
			}
		}
	}

	/*=============================================
	=            		ACTUALIZAR 	              =
	=============================================*/

	static public function ctrActualizarRegistro() {
		if(isset($_POST["actualizarName"])) {
			if(
				preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["actualizarName"]) &&
				preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["actualizarEmail"]) 
			){
				$usuario = ModeloFormulario::mdlSeleccionarRegistros("registros", "token", $_POST['tokenUsuario']);
				$comparaToken = md5($usuario["nombre"]."+".$usuario["email"]);
				if($comparaToken == $_POST['tokenUsuario'] && $_POST['idUsuario'] == $usuario['id']) {
					if($_POST["actualizarPassword"] != "") {
						if(preg_match('/^[0-9a-zA-Z]+$/', $_POST["actualizarPassword"])) {
							$password = crypt($_POST["actualizarPassword"], '$2a$09$anexamplestringforsalt$');
						}
					} else {
						$password = $_POST["passwordActual"];
					}
					$tabla = "registros";
					$actualizarToken = md5($_POST["actualizarName"]."+".$_POST["actualizarEmail"]);
					$datos = array(
						"id"=>$_POST["idUsuario"],
						"token"=>$actualizarToken,
						"nombre"=>$_POST["actualizarName"],
						"email"=>$_POST["actualizarEmail"],
						"password"=>$password
					);

					$rta = ModeloFormulario::mdlActualizarRegistro($tabla, $datos);
					return $rta;
				} else {
					$rta = "error";
					return $rta;
				}
			} else {
				$rta = "error";
				return $rta;
			}
		}
	}

	/*=============================================
	=            		ELIMINAR 	              =
	=============================================*/

	public function ctrEliminarRegistro() {
		if(isset($_POST['eliminarRegistro'])) {
			$usuario = ModeloFormulario::mdlSeleccionarRegistros("registros", "token", $_POST['eliminarRegistro']);
			$comparaToken = md5($usuario["nombre"]."+".$usuario["email"]);
			if($comparaToken == $_POST['eliminarRegistro']) {
				$tabla = "registros";
				$valor = $_POST['eliminarRegistro'];
				$rta = ModeloFormulario::mdlEliminarRegistro($tabla, $valor);
				if($rta == "ok") {
					echo '<script>
					if(window.history.replaceState) {
						window.history.replaceState(null, null, window.location.href);
					}
					window.location = "inicio";
					</script>';
				}
			}
		}
	}

}


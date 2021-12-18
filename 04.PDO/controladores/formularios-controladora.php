<?php 

Class ConroladorFormularios {

	/*=============================================
	=            	 FORMULARIOS 		          =
	=============================================*/
	
	STATIC public function ctrRegistro() {
		if(isset($_POST["registroName"])) {
			$tabla = "registros";
			$datos = array("nombre"=>$_POST["registroName"],
				"email"=>$_POST["registroEmail"],
				"password"=>$_POST["registroPassword"]);

			$rta = ModeloFormulario::mdlRegistro($tabla, $datos);
			return $rta;		
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
			if($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $_POST["ingresoPassword"]) {
				$_SESSION["validarIngreso"] = "ok";
				echo '<script>
					if(window.history.replaceState) {
						window.history.replaceState(null, null, window.location.href);
					}
					window.location = "index.php?pagina=inicio";
				</script>';
			} else {
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
			if($_POST["actualizarPassword"] != "") {
				$password = $_POST["actualizarPassword"];
			} else {
				$password = $_POST["passwordActual"];
			}
			$tabla = "registros";
			$datos = array(
				"id"=>$_POST["idUsuario"],
				"nombre"=>$_POST["actualizarName"],
				"email"=>$_POST["actualizarEmail"],
				"password"=>$password
			);

			$rta = ModeloFormulario::mdlActualizarRegistro($tabla, $datos);
			return $rta;
			
		}
	}

	/*=============================================
	=            		ELIMINAR 	              =
	=============================================*/

	public function ctrEliminarRegistro() {
		if(isset($_POST['eliminarRegistro'])) {
			$tabla = "registros";
			$valor = $_POST['eliminarRegistro'];
			$rta = ModeloFormulario::mdlEliminarRegistro($tabla, $valor);
			if($rta == "ok") {
				echo '<script>
					if(window.history.replaceState) {
						window.history.replaceState(null, null, window.location.href);
					}
					window.location = "index.php?pagina=inicio";
				</script>';
			}
		}
	}

}

?>
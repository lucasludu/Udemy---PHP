<?php 

	require_once("../controladores/formularios-controladora.php");
	require_once("../modelos/formularios-modelo.php");

	/*============================================
	=            	CLASE DE AJAX	             =
	=============================================*/
	
	class AjaxFormularios {

		/*============================================
		=          VALIDAR EMAIL EXISTENTE	         =
		=============================================*/

		public $validarEmail;

		public function ajaxValidarEmail() {
			$item = "email";
			$valor = $this->validarEmail;
			$respuesta = ConroladorFormularios::ctrSeleccionarRegistros($item, $valor);
			//echo '<pre>'; print_r($respuesta); echo '</pre>';
			echo json_encode($respuesta);

		}

		/*============================================
		=          VALIDAR TOKEN EXISTENTE	         =
		=============================================*/

		public $validarToken;

		public function ajaxValidarToken() {
			$item = "token";
			$valor = $this->validarToken;
			$respuesta = ConroladorFormularios::ctrSeleccionarRegistros($item, $valor);
			//echo '<pre>'; print_r($respuesta); echo '</pre>';
			echo json_encode($respuesta);

		}

	}

	/*=============================================
	=  OBJETO DE AJAX QUE RECIBE LA VARIABLE POST =
	==============================================*/
	
	if(isset($_POST['validarEmail'])) {
		$valEmail = new AjaxFormularios();
		$valEmail->validarEmail = $_POST['validarEmail'];
		$valEmail->ajaxValidarEmail();
	}


	if(isset($_POST['validarToken'])) {
		$valToken = new AjaxFormularios();
		$valToken->validarToken = $_POST['validarToken'];
		$valToken->ajaxValidarToken();
	}

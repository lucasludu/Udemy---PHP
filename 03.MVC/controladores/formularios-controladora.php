<?php 

Class ConroladorFormularios {

	/*=============================================
	=            	 FORMULARIOS 		          =
	=============================================*/
	
	STATIC public function ctrRegistro() {
		if(isset($_POST["registroName"])) {
			return "ok";
		}
	}

	
}

?>
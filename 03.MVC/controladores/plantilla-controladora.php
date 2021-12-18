<?php

	Class ControladorPlantilla {

		/*=============================================
		=           LLAMADA A LA PLANTILLA            =
		=============================================*/
		
		public function ctrTraerPlantilla() {  // ctr = controlador

			// include() se usa para invocar el archivo que contiene codigo html-php
			include ("vistas/plantilla.php");
		}
	}

?>
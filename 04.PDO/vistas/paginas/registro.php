<div class="d-flex justify-content-center text-center">
	<form action="" method="post" class="p-5 bg-light">
		<div class="form-group">
			<label for="nombre">Nombre:</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
				</div>
				<input type="text" class="form-control" placeholder="Ingrese nombre" id="nombre" name="registroName">
			</div>
		</div>

		<div class="form-group">
			<label for="nombre">Correo Electronico:</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
				</div>
				<input type="email" class="form-control" placeholder="Ingrese su correo" id="email" name="registroEmail">
			</div>
		</div>

		<div class="form-group">
			<label for="nombre">Contraseña:</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
				</div>
				<input type="password" class="form-control" placeholder="Ingrese su contraseña" id="pwd" name="registroPassword">
			</div>
		</div>

		<?php 

		/*==============================================================
		=	FORMA EN QUE SE INSTANCIALA CLASE UHN METODO NO ESTATICO   =
		===============================================================*/

		/*
			$registro = new ConroladorFormularios();
			$registro->ctrRegistro();
		*/

		/*===========================================================
		=	FORMA EN QUE SE INSTANCIALA CLASE UHN METODO ESTATICO   =
		============================================================*/

			$registro = ConroladorFormularios::ctrRegistro();
			if($registro == "ok") {
				// Limpia el almacenamiento que tiene el navegador a la hora de cargar datos. Para evitar duplicados
				echo '<script>
					if(window.history.replaceState) {
						window.history.replaceState(null, null, window.location.href);
					}
				</script>';

				echo '<div class="alert alert-success">El usuario ha sido registrado!</div>';
			}

		?>

		<button type="submit" class="btn btn-primary">Enviar</button>
	</form>
</div>
<div class="d-flex justify-content-center text-center">
	<form action="" method="post" class="p-5 bg-light">
		<div class="form-group">
			<label for="nombre">Correo Electronico:</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
				</div>
				<input type="email" class="form-control" placeholder="Ingrese su correo" id="email" name="ingresoEmail">
			</div>
		</div>

		<div class="form-group">
			<label for="nombre">Contraseña:</label>
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
				</div>
				<input type="password" class="form-control" placeholder="Ingrese su contraseña" id="pwd" name="ingresoPassword">
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

			$ingreso = new ConroladorFormularios; // deja de ser estatico
			$ingreso->ctrIngreso();
			

		?>

		<button type="submit" class="btn btn-primary">Ingresar</button>
	</form>
</div>
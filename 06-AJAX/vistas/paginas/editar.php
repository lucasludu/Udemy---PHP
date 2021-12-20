<?php

	if(isset($_GET['token'])) {

		$item = "token";
		$valor = $_GET['token'];
		$usuario = ConroladorFormularios::ctrSeleccionarRegistros($item, $valor);

	}

?>

<div class="d-flex justify-content-center text-center">
	<form action="" method="post" class="p-5 bg-light">
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
				</div>
				<input type="text" class="form-control" value="<?php echo $usuario["nombre"]; ?>" placeholder="Ingrese nombre" id="actualizarName" name="actualizarName">
			</div>
		</div>

		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
				</div>
				<input type="email" class="form-control" value="<?php echo $usuario["email"]; ?>" placeholder="Ingrese su correo" id="actualizarEmail" name="actualizarEmail">
			</div>
		</div>

		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
				</div>
				<input type="password" class="form-control" placeholder="Ingrese su contraseña" id="pwd" name="actualizarPassword">
				<input type="hidden" name="passwordActual" value="<?php echo $usuario["password"]; ?>">
				<input type="hidden" name="tokenUsuario" value="<?php echo $usuario["token"]; ?>">
				<input type="hidden" name="idUsuario" value="<?php echo $usuario["id"]; ?>">
			</div>
		</div>

		<?php

			$actualizar = ConroladorFormularios::ctrActualizarRegistro();
			if($actualizar == "ok") {
				echo '
				<script>
					if(window.history.replaceState) {
						window.history.replaceState(null, null, window.location.href);
					}
					var datos = new FormData();
					datos.append("validarToken", "'.$usuario["token"].'");
					$.ajax({
						url: "ajax/formularios-ajax.php",
						method: "POST",
						data: datos,
						cache: false,
						contentType: false,
						processData: false,
						dataType: "json",
						success: function(respuesta) {
							$("#actualizarName").val(respuesta["nombre"]);
							$("#actualizarEmail").val(respuesta["email"]);
						}
					})
				</script>';

				echo '<div class="alert alert-success">El usuario ha sido actualizado!</div>
					<script>
						setTimeout(function() {
							window.location = "index.php?pagina=inicio";
						}, 2000);
					</script>
				';
			}
					
			if($actualizar == "error") {
				echo '<script>
					if(window.history.replaceState) {
						window.history.replaceState(null, null, window.location.href);
					}
				</script>';

				echo '<div class="alert alert-danger">Error al actualizar el usuario</div>';
			}
		?>

		<button type="submit" class="btn btn-primary">Actualizar</button>
	</form>
</div>
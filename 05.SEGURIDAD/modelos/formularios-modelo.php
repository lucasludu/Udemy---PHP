<?php 

require_once("conexion.php");

class ModeloFormulario {

	/*=============================================
	=            		REGISTRO	              =
	=============================================*/
	
	static public function mdlRegistro($tabla, $datos) {
		# statement : declaracion
		/*
			bindParam() Vincula una variable de PHP a un parametro de sustitucion con nombre o signo de interrogación correspondiente
			de la sentencia SQL que fue usada para preparar la sentencia. Este codigo PDO::PARAM_STR evita que se suba codigo SQL en 
			el formulario sino que lo subiria como una cadena de texto (SQL_INJECTION).

			prepare() Prepara una sentencia SQL para ser ejecutada por el metodo PDOStatement::execute(). La sentencia SQL puede contener 0
			o mas marcadores de parametros con nombre (:name) o signos de interrogacion (?) por los cuales los valores reales serán sustituidos 
			cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parametros.
		*/
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(token, nombre, email, password) VALUES (:token, :nombre, :email, :password)");

		$stmt->bindParam(":token", $datos['token'], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos['password'], PDO::PARAM_STR);

		if($stmt->execute()) {
			return "ok";
		} else {
			print_r(Conexion::conectar->errorInfo());
		}
		$stmt->close(); // se corta la conexion
		$stmt = null; // una vez cortada devuelve null
	}

		/*=============================================
		=         	SELECCIONAR REGISTROS             =
		=============================================*/

	static public function mdlSeleccionarRegistros($tabla, $item, $valor) {
		if($item == null && $valor == null) {
			$stmt = Conexion::conectar()->prepare("SELECT *, date_format(fecha, '%d/%m/%Y') as fecha FROM $tabla ORDER BY nombre DESC");
			$stmt->execute();
			return $stmt->fetchAll(); // FetchAll --> Devuelve todos los registros
		} else {
			$stmt = Conexion::conectar()->prepare("SELECT *, date_format(fecha, '%d/%m/%Y') as fecha FROM $tabla WHERE ($item=:$item) ORDER BY nombre DESC");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch(); // Fetch --> Devuelve un solo registro
		}
		$stmt->close(); 
		$stmt = null; 
	}


	/*=============================================
	=            		ACTUALIZAR	              =
	=============================================*/
	
	static public function mdlActualizarRegistro($tabla, $datos) {
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET token=:token, nombre=:nombre, email=:email, password=:password WHERE id=:id");

		$stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos['password'], PDO::PARAM_STR);
		$stmt->bindParam(":token", $datos['token'], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos['id'], PDO::PARAM_INT);

		if($stmt->execute()) {
			return "ok";
		} else {
			print_r(Conexion::conectar->errorInfo());
		}
		
		$stmt->close(); // se corta la conexion
		$stmt = null; // una vez cortada devuelve null
	}

	/*=============================================
	=            		ELIMINAR	              =
	=============================================*/

	static public function mdlEliminarRegistro($tabla, $valor) {
		
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE token=:token");
		$stmt->bindParam(":token", $valor, PDO::PARAM_INT);

		if($stmt->execute()) {
			return "ok";
		} else {
			print_r(Conexion::conectar->errorInfo());
		}
		
		$stmt->close(); // se corta la conexion
		$stmt = null; // una vez cortada devuelve null
	}


	/*=============================================
	=		 ACTUALIZAR INTENTOS FALLIDOS	      =
	=============================================*/
	
	static public function mdlActualizarIntentosFallidos($tabla, $valor, $token) {
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET intentos_fallidos=:intentos_fallidos WHERE token=:token");

		$stmt->bindParam(":intentos_fallidos", $valor, PDO::PARAM_INT);
		$stmt->bindParam(":token", $token, PDO::PARAM_STR);


		if($stmt->execute()) {
			return "ok";
		} else {
			print_r(Conexion::conectar->errorInfo());
		}
		
		$stmt->close(); // se corta la conexion
		$stmt = null; // una vez cortada devuelve null
	}


}


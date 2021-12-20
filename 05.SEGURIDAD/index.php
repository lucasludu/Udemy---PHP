<?php 

/*
	El INDEX: En él mostramos la salida de las vistas al usuario y también a través de él enviamos
	distintas acciones que el usuario envie al controlador.
*/
	/*
		require() establece que el codigo del archivo invocado es requerido, es decir, obligatorio para
		el funcionamiento del programa, por ello, si el archivo especificado en la funcion require() no se 
		encuentra, saltará un error "PHP fatal error" y el programa PHP se detendrá.
	
		require_once() funciona de la misma forma que su respectivo, salvo que, al usar la vercion _once
		se impide la carga de un mismo archivo mas de una vez.	
		Si requiero el mismo codigo mas de una vez se corre el riesgo de redeclaraciones de variables,
		funciones o clases.
	*/
	require_once("controladores/plantilla-controladora.php");
	require_once("controladores/formularios-controladora.php");
	require_once("modelos/formularios-modelo.php");


/*
	require_once("modelos/conexion.php");
	$conexion = Conexion::conectar();
	echo '<pre>'; print_r(conexion); echo '</pre>';
*/

	$plantilla = new ControladorPlantilla();
	$plantilla->ctrTraerPlantilla();

// Se recomienda no cerrar la etiqueta PHP en los controladores y modelos, es una buena forma de protegernos.
// Pueden agregar codigo JS
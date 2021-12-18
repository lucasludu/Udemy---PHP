<?php
	
	# Clase
// Modelo que se usa para crear objetos que comparten mismo comportamiento, estado e identidad.

class Automovil {

	# Propiedades
	// Caracteristicas que pueden tener un objeto

	public $marca;
	public $modelo;

	# Método
	/* 	
		Algoritmo asociado a un objeto que indica la capacidad de lo que éste puede hacer.
		La unica diferencia entre método y función es que llamamos método a las funciones de una 
		clase (en POO), mientras que llamamos funciones a los algoritmos de la programación
		estructurada
	*/

	public function mostrar() {
		echo "<p>Hola sou un $this->marca, modelo $this->modelo</p>";
	}

}

	# Objeto
	// Una entidad provista de métopdo o mensajes a los cuales responde propiedades con valores concretos.

$a = new Automovil();
$a->marca = "Toyoa";
$a->modelo = "Corolla";

$a->mostrar();


$b = new Automovil();
$b->marca = "Hyundai";
$b->modelo = "Accent Vision";

$b->mostrar();

?>
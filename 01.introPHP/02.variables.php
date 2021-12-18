<?php

# Variable Númerica.
$numero = 5;
echo "Esto es una variable número: $numero<br>";
var_dump($numero);
echo "<br><br>";

# Variable de texto.
$palabra = "palabra";
echo "Esto es una variable de texto: $palabra<br>";
var_dump($palabra);
echo "<br><br>";

# Variables Booleanas
$boolean = true; // Si pongo false, no aparece NADA
echo "Esto es una variable booleana: $boolean<br>";
var_dump($boolean);
echo "<br><br>";

# Variable Arreglo
$colores = ["Rojo", "Amarillo"];
echo "Esto es una variable arreglo: $colores[0]<br>";
var_dump($colores);
echo "<br><br>";

# Variable Arreglo con propiedades
$verduras = ["verdura1"=>"lechuga", "verdura2"=>"tomate"];
echo "Esto es una variable arreglo con propiedades: $verduras[verdura1]<br>";
var_dump($verduras);
echo "<br><br>";

# Variables Objetos
$frutas = (object)["fruta1"=>"manzana", "fruta2"=>"pera"];
echo "Esto es una variable objeto: $frutas->fruta1<br>";
var_dump($frutas);
echo "<br><br>";



?>
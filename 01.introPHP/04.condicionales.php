<?php 

	# Condiciones
$a = 5;
$b = 10;

if($a > $b) {
	echo "A es mayor que B";
} else if($a == $b) {
	echo "A es igual que B";
} else {
	echo "A es menor que B";
}

echo "<br><br>";

	# Switches
$dia = "sabado";
switch ($dia) {
	case 'sabado':
		echo "Voy a salir de joda!";
		break;
	case 'domingo':
		echo "Voy hacer un asado!";
	default:
		echo "Tengo que estudiar :S";
		break;
}

echo "<br><br>";

	# Ciclo while
$n = 1;
while($n <= 5) {
	echo $n;
	$n++;
}

echo "<br><br>";

	# Ciclo Do While
$p = 1;
do {
	echo $p;
	$p++;
} while($p <= 5);

echo "<br><br>";

	# Ciclo FOR
for($i = 1; $i <= 5; $i++) {
	echo $i;
}

?>
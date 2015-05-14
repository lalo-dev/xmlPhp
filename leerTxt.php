 <?php
$lineas = file("mx.txt");

foreach($lineas as $linea){
	$linea = explode("|",$linea);
	echo $linea[0].'----'.$linea[1];
	echo '<br/>';
}
?> 
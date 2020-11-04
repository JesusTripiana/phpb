<html>
<head>
	<meta charset="UTF-8">
	<title>Datos del Pais</title>
</head>
<body> 
<h1>Ejercicio 7</h1>
	<hr>
<?php 
	include_once 'infoPaises.php';

$paisAleatorio = array_rand($paises,2);

foreach ($paisAleatorio as $pais){
    echo "País : ".$pais." , con ".number_format($paises[$pais]['Poblacion'], 0, ',', '.'). " habitantes <br/>";
    echo "Ciudades: ";
    foreach($ciudades[$pais] as $ciudad){
        echo $ciudad." ";
    }
    echo "<br/>Vínculo a google maps: ";
?>
	<a href="https://www.google.es/maps/place/<?= $pais?>">Maps</a><br>
<?php
break;
}
?>	 

</body>
</html>
<html>
<head>
<meta charset="UTF-8">
<title>Paises y ciudades</title>
</head>
<body> 

<?php 
// Incluyo infoPaises.php 
include_once 'infoPaises.php';

//Genero un FOREACH para recorrer las tablas y obtener la poblacion mas alta
$poblacionMax = 0;
$paisMax = "";
foreach ($paises as $pais => $informacion){
    
    if ($informacion['Poblacion'] > $poblacionMax){
        $poblacionMax = $informacion['Poblacion'];
        $paisMax = $pais;
    }
}

echo $paisMax." es el pais con mayor numero de habitantes, para ser exactos ".number_format($poblacionMax, 0, ',', '.')."<hr>";
    
?>
<table border = 2">
	<tr>
		<td>Ciudades: </td>
		<?php 
		  $TablaCiudades = $ciudades[$paisMax];
		  foreach ($TablaCiudades as $capitales){
		      echo '<td>'.$capitales.'</td>';
		  }
		?>
	</tr>
</table>
</body>
</html>
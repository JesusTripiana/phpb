
<?php $periodicos = [
    "El Marca" => "https://www.marca.com/",
    "Gigantes" => "https://www.gigantes.com/",
    "El As" => "https://as.com/",
    "El Pais" => "https://elpais.com/",
    "NBAmaniacs" => "https://www.nbamaniacs.com/"
];
?>


<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>Ejercicio 3</h1>
	<hr>
	<ul>
		<li> El medio elegido es: 
		<?php 
// 		Forma de mostrar mas de un medio de forma aleatoria, si a ARRAY_RAND aparte del array 
// 		se le pasa 1 numero genera esa candidad de claves aleatorias.

//		$clavemedio = array_rand($medios,2);
// 		foreach ($clavemedio as $valor){
// 		    echo "<p>El Medio recomendado es: <a href=\"". $medios[$valor]. "\">$valor</a></p>";
// 		}
		    $medioElegido = array_rand($periodicos);
		    echo "<a name='periodico' href='$periodicos[$medioElegido]'>$medioElegido</a>";
		    ?>
		</li>
	</ul>	
  </body>
</html>

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
		    $medioElegido = array_rand($periodicos);
		    echo "<a name='periodico' href='$periodicos[$medioElegido]'>$medioElegido</a>";
		    ?>
		</li>
	</ul>	
  </body>
</html>
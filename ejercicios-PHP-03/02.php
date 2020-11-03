<!-- Crear un array que almacene 5 cadenas con el nombre de periódicos y sus enlaces para
acceder. El array será asociativo con el nombre del periódico como clave y su URL como
valor. (LOS ENLACES TIENEN QUE FUNCIONAR CORRECTAMENTE) -->

<?php 
$periodicos = [
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
    <h1>Ejercicio 2</h1>
	<hr>
	<ul>
		<?php foreach ($periodicos as $nombre => $contenido){
		    echo "<li><a name='periodico' href='$contenido'>$nombre</a></li>";}?>
	</ul>	
  </body>
</html>
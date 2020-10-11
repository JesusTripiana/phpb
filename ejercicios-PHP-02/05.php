
<?php 

function generarHTMLTable($row, $col, $borde, $contenido) {
    echo '<table style="border:'.$borde.'px solid black;border-collapse:collapse">';
    for ($i=0;$i<$row;$i++){
        echo '<tr style="border:'.$borde.'px solid black;border-collapse:collapse">';
        for ($j=0;$j<$col;$j++){
            echo '<td style="border:'.$borde.'px solid black;border-collapse:collapse">'.$contenido.'</td>';
        }
        echo '</tr>';
    }
        echo '</table>';
}
?>

<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>Ejercicio 5</h1>
	<hr>
	<?php 
	$row=random_int(1, 7);
	$col=random_int(1,7);
	$borde=2;
	$contenido='HOOLAA!!';
	
	generarHTMLTable($row, $col, $borde, $contenido);
	?>
	
  </body>
</html>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    
<!--Obtener un número al azar entre 1 y 9 y generar una pirámide con ese número de peldaños. -->
<!--Utilizar la marca <code></code> para que la visualización no se deforme por el tamaño de los espacio o -->
<!--una estilo con tipo de letra monospace. -->

   
  </head>
  <body>
		<?php
		
            $n1 = random_int(1,9);
            $n2 = $n1-1;
        ?>
		<code>
		<?php 
		for ($i = 1; $i <= $n1;$i++){
		    for ($j = $n2; $j > 0; $j--){
		        echo "&nbsp";
		    }
		    $n2--;
		    for($k = 1; $k <=2*$i -1; $k++){
		      echo "*";
		    }
		    echo "<br/>";
		}
        ?>
		</code>
		<hr>
		<?php show_source(__FILE__)
		// swow_source(__FILE__) imprime por pantalla el codigo del archivo.
		?> 
		<hr>
  </body>
</html>

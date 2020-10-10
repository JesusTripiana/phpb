<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">   
  </head>
  <body>
	<?php
        /*
        * Obtener un número al azar entre 1 y 9 y generar una la escalera numérica del tamaño indicado alternando colores entre rojo y azul.

         */
        $num1 = random_int(1,9);

        for($i=1;$i<=$num1;$i++){
            $color = $i%2 != 0 ? "blue":"red";
            echo "<em style='color:$color'>";
            for ($j=0;$j<$i;$j++){
            echo  $i;
            }
        echo '</em>';
        echo '</br>';
        }
    ?>

  </body>
</html>

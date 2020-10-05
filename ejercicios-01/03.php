
<?php
/*
 * Obtener un número al azar entre 1 y 9 y generar una pirámide con ese número de peldaños.
Utilizar la marca <code></code> para que la visualización no se deforme por el tamaño de los espacio o
 una estilo con tipo de letra monospace.


 */
$num1 =9; //random_int(1,9);
$espa =(int)$num1/2;

for($i=1;$i<=$num1;$i++){
    for($e=0;$e<$espa;$e++){
        echo "&nbsp";
    }
        for ($j=1;$j>=$i;$j++){
            if($j%2 != 0){
                echo "<code><font face='monospace'>*</font></code> ";
            }
            
        }
   
    
    $espa--;
    echo "</br>";
    }

?>


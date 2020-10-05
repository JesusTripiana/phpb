
<?php
/*
 *  Definir dos variables asignándoles un valor entero aleatorio entre 1 y 10 y 
 *  mostrar su suma, su resta, su división, su multiplicación, módulo
 *   y potencia (ciclo for)
 *  
 */
$num1 = random_int(1,10);
$num2 = random_int(1,10);
echo "1º Número: $num1</br>";
echo "2º Número: $num2</br>";
echo $num1.'+'.$num2.' = '.($num1+$num2)."</br>";
echo $num1.'-'.$num2.' = '.($num1-$num2)."</br>";
echo $num1.'*'.$num2.' = '.($num1*$num2)."</br>";
echo $num1.'/'.$num2.' = '.($num1/$num2)."</br>";
echo $num1.'%'.$num2.' = '.($num1%$num2)."</br>";
$expo = 1;
for ($i=1;$i<$num2;$i++){
    $expo *=$num1;
}
echo $num1.'**'.$num2.' = '.($expo)."</br>";

?>

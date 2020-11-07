
<?php
$matriz=array('lunes','martes','miércoles','jueves','viernes','sábado','domingo');
echo count($matriz).'<br><br>'; // devulve el numero de elementos del array
var_dump($matriz);
?>
<hr>
<?php 
//          ELIMINAR ELEMENTOS

echo array_pop($matriz).'<br><br>'; // elimina el ultimo elemento del array y devuelve su valor
var_dump($matriz);
?>
<hr>
<?php 
echo array_shift($matriz).'<br><br>'; // elimina el primer elemento del array y devuelve su valor
var_dump($matriz);
?>
<hr>
<?php 
//          INSERTAR ELEMENTOS

echo array_push($matriz, 'domingo').'<br><br>'; // inserta el elemento en la ultima posicion del array y devuelve la cantidad de elementos
var_dump($matriz);
?>
<hr>
<?php 
echo array_unshift($matriz, 'lunes').'<br><br>'; // inserta el elemento en la primera posicion del array y devuelve la cantidad de elementos
                                                 // solo permite elementos con KEY numerica
var_dump($matriz); 
?>
<hr>

<?php 
//          EXTRACCION DE ELEMENTOS

$input = array("a", "b", "c", "d", "e");
echo 'Array original <br>';
print_r($input);
echo ' <br><br>';
echo 'Extrae elementos desde la posicion 2 al final <br>';
$output = array_slice($input, 2); // devuelve c, d, y e Extrae los elementos desde la posicion 2 hasta el final
print_r($output);
echo ' <br><br>';
echo 'Muestra el array original sin cambios <br>';
print_r($input);
echo '<br><br>';// muestra a , b , c , d , y e
echo 'Extrae elementos desde la posicion 2 empezando por el final solo 1 elemento <br>';
$output = array_slice($input,-2, 1); // devuelve d
print_r($output);
echo '<br><br>';
echo 'Extrae los elementos desde la posicion 0 a la 3 sin contar dicha posicion <br>';
$output = array_slice($input, 0, 3); // devuelve a, b, y c
print_r($output);
echo '<br><br>';
echo 'Muestra 2 elementos empezando por la posicion -1 (ultima posicion) sin mostrar dicha posicion -1 (sin modificar el array)<br>';
print_r(array_slice($input, 2,-1)); // muestra 0=> c , 1 => d
echo '<br><br>';
echo 'Muestra el array original sin cambios <br>';
print_r($input); // muestra a , b , c , d , y e
?>
<hr>

<?php 
//          EXTRACCION Y SUSTITUCION 
echo '<br><br>';
$festivos = array_splice($matriz,5); // guarda sabado y domingo
print_r($matriz); // muestra lunes, martes,.. viernes
echo '<br><br>';
print_r($festivos); // muestra sabado y domingo
echo '<br><br>';
print_r(array_splice($matriz,1,2,'Huelga'));// muestra lo que elimina : martes, miercoles
echo '<br><br>';
print_r($matriz); // muestra lunes, huelga, jueves, viernes
echo '<br><br>';
$matriz1=array('altura'=>185,'peso'=>85,'pelo'=>'moreno'); // array asociativo
print_r(array_splice($matriz1,1,2,array('Alemania' , 'Varon')));// muestra lo que elimina: peso y pelo
echo '<br><br>';
print_r($matriz1); // muestra lo que queda : altura => 185 0 => alemania 1=> varon
?>
<hr>





















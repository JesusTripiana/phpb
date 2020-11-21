<pre>
<?php
/* 
 * Ejemplos de Adición de matrices 
 */
$m1 = ["Hola","Pepe","Luis"];
$m2 = ["Hola","Ana"];
$m2[6] = "Manolo";

echo "Matrices Iniciales \n";
print_r($m1);
print_r($m2);
echo "<hr>";
// Añade donde no hay un valor previo 
$mr = $m1 + $m2;
print_r($mr); echo "<hr>";

// Ojo esta operación depende del orden de los factores
$mr = $m2 + $m1;
print_r($mr);echo "<hr>";

// Añade al array las posiciones que no tiene
$m3 = ["Silvia"];
$m3 += $m1;
print_r($m3);echo "<hr>";

//Los mismo con array asociativos 
$ma = [ "Madrid" => "10", 12, "Sevilla" =>[3,10]];
print_r($ma);echo "<hr>";
$ma += $m1;
print_r($ma);echo "<hr>";

echo " Prueba de array_rand ";
$m1 = ['a','e','i','o','u'];
    
// Obtengo posiciones aleatorioa o claves 
$mr = array_rand($m1,3);
print_r($mr);

foreach ($mr as $valor){
    echo "$valor --> letra = ".$m1[$valor]."<br>";
}
?>





</pre>
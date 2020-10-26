<!-- Rellenar un array con 20 números aleatorios entre 1 y 10 y mostrar el contenido del -->
<!-- array mediante una tabla de una fila en HMTL. Mostrar a continuación el valor máximo, -->
<!-- el mínimo y el valor que mas veces se repite. (Nota definir funciones para cada caso) -->
<?php 
    function calcularMax($tabla):int {
        $valorMax=$tabla[0];
        foreach ($tabla as $valor){
            if ($valor > $valorMax){
                $valorMax=$valor;
            }
        }
        return $valorMax;
    }
    
    function calcularMin($tabla):int {
        $valorMin=$tabla[0];
        foreach ($tabla as $valor){
            if ($valor < $valorMin){
                $valorMin=$valor;
            }
        }
        return $valorMin;
    }
    
    function valorMasRepetido ($tabla):int {
        $maxrepe = 0;
        $valor =0;
        for ($i = 0; $i < sizeof($tabla); $i++) {
            $veces = 0;
            for ($j = 0; $j < sizeof($tabla); $j++) {
                if ($tabla[$i] == $tabla[$j]) {
                    $veces++;
                }
            }
            if ($veces > $maxrepe) {
                $valor = $tabla[$i];
            }
        }
        return $valor;
    }
  
  define ('CANTIDADNUM',20);
  $numAleatorio=[];
  for ($i=0;$i<CANTIDADNUM;$i++){
        $numAleatorio[]=random_int(1, 10);
  } 
?>

<html>
  <head>
    <meta charset="UTF-8">
    <style type="text/css">
        table,tr,td{
          border: 1px solid black;
          border-collapse:collapse;
        }
    
    </style>
  </head>
  <body>
    <h1>Ejercicio 1</h1>
	<hr>
	<table>
		<tr>
		<?php foreach ($numAleatorio as $contenido){
		    echo '<td>'.$contenido.'</td>';} ?>
		</tr>
	</table>
	<p><?= 'El número más alto de la tabla es: '.calcularMax($numAleatorio);?></p>
	<p><?= 'El número más bajo de la tabla es: '.calcularMin($numAleatorio);?></p>
	<p><?= 'El número que más se repite es: '.valorMasrepetido($numAleatorio);?></p>
	
  </body>
</html>
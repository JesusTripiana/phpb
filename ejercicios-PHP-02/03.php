<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>Ejercicio 3</h1>
	<hr>
	<?php 
	   require_once ('funcionesRef.php');
	   
	   $num1=random_int(1,10);
	   $num2=random_int(1,10);
	   echo "1° número: $num1<br>";
	   echo "2° número: $num2<br><br>";
	   
	   $resultado = 0;
	   suma($num1, $num2, $resultado);
	   echo $num1.' + '.$num2.' = '.$resultado.'<br>';
	   
	   resta($num1, $num2, $resultado);
	   echo $num1.' - '.$num2.'&nbsp = '.$resultado.'<br>';
	   
	   dividir($num1, $num2, $resultado);
	   echo $num1.' / '.$num2.'&nbsp = '.$resultado.'<br>';
	   
	   multiplicar($num1, $num2, $resultado);
	   echo $num1.' * '.$num2.'&nbsp = '.$resultado.'<br>';
	   
	   modulo($num1, $num2, $resultado);
	   echo $num1.' % '.$num2.' = '.$resultado.'<br>';
	   
	   potencia($num1, $num2, $resultado);
	   echo $num1.' ** '.$num2.' = '.$resultado;
	?>
  </body>
</html>
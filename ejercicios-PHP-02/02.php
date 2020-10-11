<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>Ejercicio 2</h1>
	<hr>
	<?php 
	   require_once ('funcionesVar.php');
	   
	   $num1=random_int(1,10);
	   $num2=random_int(1,10);
	   echo "1° número: $num1<br>";
	   echo "2° número: $num2<br><br>";
	   
	   $resultado=suma($num1, $num2);
	   echo $num1.' + '.$num2.' = '.$resultado.'<br>';
	   
	   $resultado=resta($num1, $num2);
	   echo $num1.' - '.$num2.'&nbsp = '.$resultado.'<br>';
	   
	   if ($num2==0){
	       echo 'No se puede dividir por 0.<br>';
	   }else{
	       $resultado=dividir($num1, $num2);
	       echo $num1.' / '.$num2.'&nbsp = '.$resultado.'<br>';
	    }
	       
	   $resultado=multiplicar($num1, $num2);
	   echo $num1.' * '.$num2.'&nbsp = '.$resultado.'<br>';
	   
	   if ($num2==0){
	       echo 'No se puede realizar el modulo si el divisor es 0.<br>';
	   }else{
	       $resultado=modulo($num1, $num2);
	       echo $num1.' % '.$num2.' = '.$resultado.'<br>';
	   }
	   
	   $resultado=potencia($num1, $num2);
	   echo $num1.' ** '.$num2.' = '.$resultado;
	?>
  </body>
</html>
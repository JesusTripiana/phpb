<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>Ejercicio 1</h1>
	<hr>
	<?php 
	   function elMayor($A,$B,&$C) {
	       if ($A>$B){
	           $C=$A;
	       }elseif ($B>$A){
	           $C=$B;
	       }else{
	           $C=0;
	       }
	   }
	       
	   $A= random_int(1, 50);
	   $B= random_int(1, 50);
	   $C=random_int(1, 50);
	    
	   elMayor($A, $B, $C);
	   echo 'Variables pasadas por valor <b>$A</b> y <b>$B</b>.<br> 
             Variable pasada por referencia <b>$C</b>.<br>
             El numero mayor de los valores '.$A.' y '.$B.' es '.$C.'.';
	    
	?>
  </body>
</html>
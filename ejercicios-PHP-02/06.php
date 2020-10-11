<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <h1>Ejercicio 6</h1>
	<hr>
	<h4> Almenas de *</h4>
	<?php 
	   $almenas=random_int(1, 7);
	   for($row=0;$row<2;$row++){
	           for($col=0;$col<$almenas*5+1;$col++){
	               if($row==0 || $row==1){
	                   if ($col%5 == 0){
	                       echo '&nbsp';
	                   }else{
	                       echo '*';
	                   }
	               }
	           }
	       echo '<br>';
	   }
	   echo '&nbsp';
	   
	   for ($end=1;$end<(4*$almenas)+$almenas;$end++){
	       echo '*';
	   }
	?>
	<br>
	<hr>
	<h4>Almenas de Ladrillo</h4>
	<p style="font-size: 35px">
	<?php 
	
	   for($row=0;$row<2;$row++){
	           for($col=0;$col<$almenas*5+1;$col++){
	               if($row==0 || $row==1){
	                   if ($col%5 == 0){
	                       echo '&nbsp';
	                   }else{
	                       echo '&#x2632;';
	                   }
	               }
	           }
	       echo '<br>';
	   }
	   echo '&nbsp';
	   
	   for ($end=1;$end<(4*$almenas)+$almenas;$end++){
	       echo '&#x2632';
	   }
	?>
	</p>
	
  </body>
</html>
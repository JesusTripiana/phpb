<html>
  <head>
    <meta charset="UTF-8">
    <link href="estilos.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <h1>Ejercicio 4</h1>
	<hr>
	<br>
	<?php 
	   define("NUMCREAR",50);
	   define("NUMALT",100);
	   
	   $num= random_int(1,NUMALT);
	   $numMax=$num;
	   $numMin=$num;
	   $media=$num;// para que sume tambien el primer numero.
	   
	   for ($i=1;$i<NUMCREAR;$i++){
	       if ($numMax<$num){
	           $numMax=$num;
	       }
	       if ($numMin>$num){
	           $numMin=$num;
	       }
	       $media += $num;
	       $num= random_int(1,NUMALT);
	   }
	?>
	
	<table>
		<tr>
			<th colspan="2" style="background-color: black;color:white">Generación de 50 valores aleatorios</th>
		</tr>
		<tr>
			<td style="width:250px">Máximo</td>
			<td class="dere"><?php echo $numMax; ?></td>
		</tr>
		<tr>
			<td>Mínimo</td>
			<td class="dere"><?php echo $numMin; ?></td>
		</tr>
		<tr>
			<td>Media</td>
			<td class='dere'><?php echo $media/NUMCREAR; ?></td>
		</tr>
	</table>
	
  </body>
</html>
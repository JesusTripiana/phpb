<html>
  <head>
    <meta charset="UTF-8">
    <link href="estilos.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <h1>Ejercicio 6</h1>
	<hr> 
  	<div id="paquete">
  	  <div id ="titulo">
  		<h1>TABLA DE MULTIPLICAR</h1>
  		</div>
  		<?php $num=random_int(0,10);?>
  		<div id="caja">
  		<table>
  			<tr>
  				<th><?php echo "Tabla del $num"?></th>
  				<th></th>
  			</tr>
  			<?php 
  			for ($i=0; $i<=10;$i++){ ?>
  			    <tr>
  					<td><?php echo $num." x ".$i." = "?></td>
  					<td><?php echo $num*$i ?></td>
  				</tr>
  			<?php }?>
  		</table>
  	  </div>
  	</div>
  </body>
</html>
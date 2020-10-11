<html>
  <head>
    <meta charset="UTF-8">
    <link href="estilos.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <h1>Ejercicio 7</h1>
	<hr>
	<h4>1º Versión  elegir entre 5 posibles valores: rojo,verde, azul, blanco y negro.</h4>
	<div>
  	  <div class="titulo">
  		<h1>TABLA DE MULTIPLICAR</h1>
  		</div>
  		<?php 
  		    define('ROJO','#ff0000');
  		    define('VERDE','#009933');
  		    define('AZUL','#002699');
  		    define('NEGRO','#000000');
  		    define('BLANCO','#ffffff');
  		?>
  		<div class="caja">
  		<table>
  			<?php 
  			for ($row=0;$row<10;$row++){
  			    echo '<tr style="widht:30px;height:30px">';
  			    for ($col=0;$col<10;$col++){
  			           echo '<td style="background-color:'.VERDE.'"></td>';
  			    }
  			}
  			?>
  		</table>
  	  </div>
  	</div>
	
  </body>
</html>
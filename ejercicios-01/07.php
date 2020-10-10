<html>
  <head>
    <meta charset="UTF-8">
   <meta http-equiv="refresh" content="2"/> <!--  Actualiza la pagina cada 2 segundos -->
  </head>
  <body>
    <h1>Ejercicio 7</h1>
	<hr>
	<?php
    $num1=random_int(100,500);
    $num2=random_int(100,500);
    $num3=random_int(100,500);
    ?>
    <table style="background-color:red; width:<?php echo "$num1" ?>px">
    	<tr>
    		<td style="height:30px"><?php echo "Rojo($num1)"?></td>
    	</tr>
    </table>
    <table style="background-color:green; width:<?php echo "$num2" ?>px">
    	<tr>
    		<td style="height:30px"><?php echo "Verde($num2)"?></td>
    	</tr>
    </table>
    <table style="background-color:blue; width:<?php echo "$num3" ?>px">
    	<tr>
    		<td style="height:30px"><?php echo "Azul($num3)"?></td>
    	</tr>
    </table>
  </body>
</html>
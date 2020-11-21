<html>
	<head>
		<meta charset="UTF-8">
		<title>Paises y ciudades</title>
		<style type="text/css">
            table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            }
         </style>
	</head>
	<body> 
    	<h1>Ejercicio 9</h1>
		<hr>
		<h1> Tabla de temperaturas </h1>
		<table style='border: 1px solid black; border-collapse: collapse;'>
		
		<?php 
		$temperaturas = [ 6, 10, 12, 14,16 ,20 ,25 , 30, 18, 15, 14, 8];
		$meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
		$mesTemperatura = array_combine($meses,$temperaturas); // combino los arrays con la funcion mediante array1 para KEY y array2 para VALOR
		foreach ($mesTemperatura as $mes => $temp){ ?>
    		<tr><td> <?= $mes ?></td><td>
    		<?php 
    		for ($i = 0; $i < $temp; $i++) {
            echo "<img src ='./imagenes/cuadradoRojo.png' style = width:14px;>";
            }
            echo  "  ".$temp. " ºC </td></tr>";
        } ?>
		</table>
	</body>
</html>
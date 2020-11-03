
<?php 
$deportes = [
    "Karate" => "./imagenes/karate.jpeg",
    "Baloncesto" => "./imagenes/balonces.jpg",
    "Beisbol" => "./imagenes/beisbol.jpg",
    "Rugby" => "./imagenes/rugby.jpg",
    "WaterPolo" => "./imagenes/waterpolo.jpeg"
]
?>

<html>
  <head>
    <meta charset="UTF-8">
    <style type="text/css">
        table,th, td{
          border: 2px solid black;
          border-collapse:collapse;
        }
    
    </style>
  </head>
  <body>
    <h1>Ejercicio 4</h1>
	<hr>
	<table>
		<tr>
			<th><b>Deporte</b></th>
			<th><b>Logo</b></th>
		</tr>
		<?php foreach ($deportes as $clave => $valor){?>
			 <tr>
		     	<td><?= $clave ?></td>
		   	 	<td><img src=<?=$valor?> style="width:80px;height:60px;padding:4px;"></td>
		   	 </tr>
		<?php } ?>
	</table>
  </body>
</html>
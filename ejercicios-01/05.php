<html>
  <head>
    <meta charset="UTF-8">
    <style>
        table, td, tr, th{
            border: 1px solid black;
            border-collapse:collapse;
        }
        
        #t tr:nth-child(even) {
            background-color: #eee;
        }
        td, th {
            padding:5px;
        }
        .cabe{
            background-color:#aaa;
            color:blue; 
        }
       
    
    </style>
</head>
<body>  
	<h1>Ejercicio 5</h1>
	<hr> 
	<table id="t">
		<tr>
			<th class="cabe">Operacion</th>
			<th class="cabe">Resultado</th>
		</tr>
		
		<?php
		$n1 =  random_int(1,10);
		$n2 =  random_int(1,10);
		echo "Numero 1 = $n1<br>";
		echo "Numero 2 = $n2 <br>";
		?>
		<br>
		<tr>
			<td><?php echo "$n1 + $n2"?></td>
			<td style="text-align:right"><?php echo ($n1+$n2)?></td>
		</tr>
		<tr>
			<td><?php echo "$n1 - $n2"?></td>
			<td style="text-align:right"><?php echo ($n1-$n2)?></td>
		</tr>
		<tr>
			<td><?php echo "$n1 * $n2"?></td>
			<td style="text-align:right"><?php echo ($n1*$n2)?></td>
		</tr>
		<tr>
			<td><?php echo "$n1 % $n2"?></td>
			<td style="text-align:right"><?php echo ($n1%$n2)?></td>
		</tr>
		<tr>
			<td><?php echo "$n1 ** $n2"?></td>
			<td style="text-align:right"><?php echo ($n1**$n2)?></td>
		</tr>
	
	</table>
</body>
</html>
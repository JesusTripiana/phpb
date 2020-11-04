<html>
	<head>
		<meta charset="UTF-8">
		<title>Paises y ciudades</title>
		<style type="text/css"> 
		
		table,th,td{
		border: 3px solid black;
		border-collapse: collapse; 
		padding: 5px;
        margin:15px;
        }
        
        td{
        color:blue;
        }
        
		</style>
	</head>
	<body> 
	
	<?php
    // Incluyo infoPaises.php 
    include_once 'infoPaises.php';
    ?>
    <h1>Ejercicio 8</h1>
	<hr>
    <h3>Tabla Descriptiva de Paises</h3>
	<table>
    	<tr>
    		<th><b>Pais</b></th>
    		<th><b>Capital</b></th>
    		<th><b>Poblacion</b></th>
    		<th><b>Ciudades</b></th>
    	</tr>
    	
	<?php 
    foreach ($paises as $pais => $info){
        ?>
        
     <tr>
     <td><?= $pais?></td>
     <td><?=$info['Capital']?></td>
     <td><?=number_format($info['Poblacion'],0, ',' , '.')?></td> 
     <td>
     
     <?php 
     foreach ($ciudades[$pais] as $ciudad){
         echo $ciudad.',';}
     ?>
     
     </td> </tr>
     
   <?php }?>
   
    </table>
	</body>
</html>
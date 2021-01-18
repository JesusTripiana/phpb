
<?php include_once "accesoDatos.php"; ?> 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="container" style="width: 380px;">
<div id="header">
<h1>E-TIENDA</h1>
</div>
<div id="content">
<?= isset($mensaje) ? $mensaje : ''?>

<?php 
   isset($mensaje1) ? $mensaje1 : '';
   if (isset($pedidos)){ 
        $total = 0;
       ?>	
    	<table border=1><th>Producto</th><th>Precio</tr>
    		<?php foreach ($pedidos as $cliente ) { ?>
        	<tr>
        	<td><?=$cliente['producto']   ?></td>
        	<td><?=$cliente['precio']   ?></td>     
        	</tr>
   	 	 
    <?php 
       $total+=$cliente['precio'];
       } ?>
       <td><b>TOTAL PEDIDOS</b></td>
       <td><?= $total ?></td>
     </table>  
   <?php } ?>

</div>
</div>
</body>
</html>

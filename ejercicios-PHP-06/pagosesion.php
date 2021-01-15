<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Forma de pago</title>
</head>
<body>
<div style="text-align:center"> 

	<?php 
	   session_start();
	   
	   if (isset($_GET['nuevatarjeta'])){ // si la tarjeta es nueva cambio los valores de la sesion
	       $tarjetaSelec = $_GET['nuevatarjeta'];
	       $_SESSION['tarjeta'] = $tarjetaSelec;
	   }else{ // sino, asigno el valor de la sesion a la variable.
	       if (isset($_SESSION['tarjeta'])){
	           $tarjetaSelec= $_SESSION['tarjeta'];
	       }
	   }
	   
	   if (isset($_SESSION['tarjeta'])){?>
	   		<h2>FORMA DE PAGO SELECCIONADA</h2><br>
	   		<img alt="Modo de pago" src="imagenes/<?=$tarjetaSelec ?>.gif"> 
	   <?php }else{?>
	   			<h2>SELECCIONE FORMA DE PAGO </h2><br>
	<?php }?>




<h2>SELECCIONE UNA NUEVA TARJETA DE CREDITO </h2><br> 
<a href="?nuevatarjeta=cashu"><img  src='imagenes/cashu.gif' /></a>&nbsp; 
<a href="?nuevatarjeta=cirrus1"><img  src='imagenes/cirrus1.gif' /></a>&nbsp; 
<a href="?nuevatarjeta=dinersclub"><img  src='imagenes/dinersclub.gif' /></a>&nbsp; 
<a href="?nuevatarjeta=mastercard1"><img  src='imagenes/mastercard1.gif'/></a>&nbsp;  
<a href="?nuevatarjeta=paypal"><img  src='imagenes/paypal.gif' /></a>&nbsp; 
<a href="?nuevatarjeta=visa1"><img  src='imagenes/visa1.gif' /></a>&nbsp;  
<a href="?nuevatarjeta=visa_electron"><img  src='imagenes/visa_electron.gif'/></a> 	<br>

</div>
</body>
</html>
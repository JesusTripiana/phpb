<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Forma de pago</title>
</head>
<body>
<div style="text-align:center"> 
<?php 
if(isset($_GET['nuevatarjeta'])){
    $tarjeta = $_GET['nuevatarjeta'];
    setcookie('tipotarjeta',$tarjeta,time()+60); // Nombre,Valor,tiempo de validacion de cookie  CREACION DE LA COOKIE
    
}else{
    if(isset($_COOKIE["tipotarjeta"])){
        $tarjeta = $_COOKIE["tipotarjeta"];
    }
}
if(isset($tarjeta)){
    echo '<h2> La forma de pago es:</h2><br>';
    echo "<img src='imagenes/$tarjeta.gif'/>";
}else {
    echo " <H2> NO TIENE FORMA  DE PAGO ASIGNADA ES</H2> </br> ";
    echo "<br><br>";
}

?>

<h2>SELECCIONE UNA NUEVA TARJETA DE CREDITO </h2><br> 
<a href="?nuevatarjeta=cashu"><img  src='imagenes/cashu.gif' /></a>&nbsp; 
<a href="?nuevatarjeta=cirrus1"><img  src='imagenes/cirrus1.gif' /></a>&nbsp; 
<a href="?nuevatarjeta=dinersclub"><img  src='imagenes/dinersclub.gif' /></a>&nbsp; 
<a href="?nuevatarjeta=mastercard1"><img  src='imagenes/mastercard1.gif'/></a>&nbsp;  
<a href="?nuevatarjeta=paypal"><img  src='imagenes/paypal.gif' /></a>&nbsp; 
<a href="?nuevatarjeta=visa1"><img  src='imagenes/visa1.gif' /></a>&nbsp;  
<a href="?nuevatarjeta=visa_electron"><img  src='imagenes/visa_electron.gif'/></a> 	<br>
<input input type="submit" name= "borrar" value="borrar">	
</div>
</body>
</html>
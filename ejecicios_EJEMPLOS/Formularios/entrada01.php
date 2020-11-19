<html>
	<body>
	
<?php 
if ($_SERVER['REQUEST_METHOD']=='GET'){ //si procesa por GET muestra el formulario?> 

    <form action="entrada01.php" method="POST">
    	Usuario:<input type="text" name="usuario" width="10"><br>
    	<input type="submit" value="enviar">
    </form>
    
<?php }else { // Se ejecuta cuando ha recibido el formulario por POST?>

	<h1 align="center">Bienvenido <?= $_POST['usuario']?></h1>
	<p align="center"> Pulsa <a href="tienda.php">aqui</a> para continuar .....</p>
	
	<?php }?>
	
	</body>
</html>

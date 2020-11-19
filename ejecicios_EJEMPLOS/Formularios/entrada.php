
<html>
	<head>
	<title>Entrada.php</title> 
	</head>
	<body>
	<?php 
	if($_SERVER['REQUEST_METHOD']=='POST'){ // valida el formulario si llega por metodo POST
	    $user = $_POST['usuario'];
	    if (strlen($user) >= 5){ // comprueba que la longitud sea >= a 5
	        echo "<h1 align='center'>Bienvenido $user </h1>";
	        echo "<p align='center'>Pulsa <a href='tienda.php'>aqui</a> para continuar ....";
	    }else {$error='Al menos 5 caracteres';}
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'GET' || isset($error)){ // Si es por GET o existe ERROR muestra el formulario
	    echo "<form action='entrada.php' method = 'POST'>";
	    echo "Usuario <input type='text' name='usuario' width='10'";
	    if (isset($error)){
	        echo "value='$user'> $error <br>"; // Muestra el mensaje de error
	    }else{
	        echo "> <br>";
	    }
	    echo "<input type='submit' value='Enviar Formulario'>";
	}
        
    ?>
	</body>
</html>

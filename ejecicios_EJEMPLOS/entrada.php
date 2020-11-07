
<html>
	<head>
	<title>Entrada.php</title> 
	</head>
	<body>
	<?php 
            // PDF 3.3 Formularios
            
            //----- Si método GET -> muestra formulario y sí es POST -> Valida y procesa el formulario

        if ($_SERVER['REQUEST_METHOD'] == 'POST') // ........ Valida formulario
            { $user= $_POST['usuario'];
            if ( strlen($user) >= 5 ) // comprueba longitud del nombre dado
                { echo "<h1 align='center'> Bienvenido $user </h1>";
                echo "<p align='center'> Pulsa <a href='tienda.php'>aquí</a> para continuar .... </p>";
                }
            else
                { $error='Al menos 5 caracteres'; }
        }
        
        if ( $_SERVER['REQUEST_METHOD']=='GET' or isset($error) ) // Si recibe el formulario por GET o existe $error (MUESTRO EL FORMULARIO)
            { echo "<form action='entrada.php' method='POST'> ";
              echo "Usuario <input type='text' name='usuario' width='10' ";
              if ( isset($error) ) // si existe $error 
                    { echo "value = ' ". $user ." ' > $error <br>";} // muestra mensaje de error
              else
                    { echo '> <br>';} // si no, muestra el formulario vacio
                    
              echo "<input type='submit' value='Enviar Formulario' >"; // muestra el boton de enviar
              }
    ?>

<hr>
<?php show_source(__FILE__); ?>
<hr>
	</body>
</html>

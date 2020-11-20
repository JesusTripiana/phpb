<html>
<head>
<title>Ejemplo de formulario INCLUIDO</title>
</head>
<body>
<?php 
// Si recibo por POST ( Compruebo y proceso el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user= $_POST['usuario'];
    // Comprobación el nombre de usuario debe tener 5 o más caracteres
    if (strlen($user) >= 5) 
    { echo "<h1 align='center'> Bienvenido $user </h1 > ";
    
    } else 
       { $error="Nombre de usuario erróneo.";
    }
}

// Si no es un envio de datos o estos tiene errores
// Muestro el formulario y los datos erróneos si los hay
if ($_SERVER['REQUEST_METHOD'] == 'GET' or isset($error)) 
{ 
?>
<!-- $_SERVER['PHP_SELF'] hace referencia al documento que se esta ejecutando en este momento -->
   <form action="<?=$_SERVER['PHP_SELF']?>" method='post' >
     Usuario 
    <input type='text' name='usuario' width='10' value='<?= isset($user)?$user:""?>'>
    <?=isset($error)?$error:""?>
    <br>
    <input type='submit' value='Enviar Formulario' >
    </form> 
<?php
} // muestra mensaje de error
    


?>
</body>
</html>

<?php 

function campoVacio ($valor) {
    return empty(trim($valor));
}

function comprobarMayusculas($cadena):bool{
    $arraycade = str_split($cadena);
    $esta = false;
    foreach ($arraycade as $valor){
        if (ctype_upper($valor)){
            $esta = true;
            break;
        }
            
    }
    return $esta;
}

function comprobarMinusculas($cadena):bool{
    $arraycade = str_split($cadena);
    $esta = false;
    foreach ($arraycade as $valor){
        if (ctype_lower($valor)){
            $esta = true;
            break;
        }  
    }
    return $esta;
}

function comprobarDigito($cadena):bool{
    $arraycade = str_split($cadena);
    $esta = false;
    foreach ($arraycade as $valor){
        if (ctype_digit($valor)){
            $esta = true;
            break;
        }
    }
    return $esta;
}

function comprobarAlfanumerico($cadena):bool{
    $arraycade = str_split($cadena);
    $esta = false;
    foreach ($arraycade as $valor){
        if (!ctype_alnum($valor)){
            $esta = true;
            break;
        }
    }
    return $esta;
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="estilos.css" rel="stylesheet" type="text/css" />
</head>
<body class="align">
		<div class="grid">
			<div id="login">
			<?php 
			if ($_SERVER['REQUEST_METHOD']=='GET'){?>
			<h2><span class="fontawesome-lock"></span>Formulario NIF</h2>
     		<form action="registrar.php" method="post">

        	<fieldset>
        	<p><label for="nombre"> Nombre:</label></p>
        	<p><input type="text" name="nombre"/></p>
        	<p><label for="correo"> Email:</label></p>
        	<p><input type="email" name="correo"/></p>
        	<p><label for="pwd1"> Introduzca el password:</label></p>
        	<p><input type="text" name="pwd1"/></p>
        	<p><label for="pwd2"> Vuelva a introducirlo:</label></p>
        	<p><input type="text" name="pwd2"/></p>  
			<p><input type="submit" value="Enviar"></p>
			</fieldset>
        	</form>
        	</div>
   		</div>
 </body>
</html>
			<?php
			exit();
			}?>
<h2><span class="fontawesome-lock"></span>Formulario Procesado</h2>			
<fieldset>
<?php 

foreach ($_POST as $clave => $valor) {  // extraigo las claves y valores del array $_POST
    if (campoVacio($valor)){
        echo "<p>El campo $clave esta vacio</p> ";
        exit;
    }
}
// No es un email
if ( !filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)){
    echo "<p> No es un email correcto.</p> ";
    exit;
}

// Validar si las contraseñas son iguales

if (  $_POST['pwd1'] != $_POST['pwd2'] ){
    echo "<p> Las contraseñas deben ser iguales </p>";
    exit;
}

$clave = $_POST['pwd1'];
if (  strlen($clave) < 8 ){
    echo "<p>Tamaño de la contraseña debe ser igual o superior a 8 caracteres en total</p>";
    exit;
}

if ( !comprobarMinusculas($clave) || !comprobarMayusculas($clave)){
    echo "<p> Debe haber mayúsculas y minúsculas. </p>";
    exit;
}
if ( !comprobarDigito($clave)){
    echo "<p> Debe haber algun dígito.</p>";
    exit;
}

if ( !comprobarAlfanumerico($clave)){
    echo " <p>No hay nigún caracter no alfanumérico <p>";
    exit;
}

echo "<p> Sus datos son correctos. <br> Ha sido registrado en el sistema.</p>";

?>
<fieldset>
</div>
</div>
</body>
</html>
			
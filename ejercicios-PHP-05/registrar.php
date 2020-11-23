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
			if ($_SERVER['REQUEST_METHOD']=='POST'){
			    $msg = "";
			    $error="";
			    $nombre = "";
			    $correo = "";
			    $contrasena1 = "";
			    $contrasena2 = "";
			    
			    if (isset($_REQUEST['nombre'])){
			        $nombre = $_REQUEST['nombre'];
			    }else{
			        $error = "El campo nombre esta vacio.<br>";
			    }
			    
			    if(isset($_REQUEST['correo'])){
			        if(filter_var($_REQUEST['correo'],FILTER_VALIDATE_EMAIL)){
			            $correo = $_REQUEST['correo'];
			        }else{
			            $error .= ' El email introducido es incorrecto.<br> '; 
			        }
			    }else{
			        $error = "El campo email esta vacio.<br>";
			    }
			    
			}
			
			
			
			
			if ($_SERVER['REQUEST_METHOD']=='GET' || isset($error)){?>
			<h2><span class="fontawesome-lock"></span>Formulario NIF</h2>
     		<form action="registrar.php" method="post">

        	<fieldset>
        	<p><label for="nombre"> Nombre:</label></p>
        	<p><input type="text" name="nombre"/></p>
        	<p><label for="correo"> Email:</label></p>
        	<p><input type="email" name="correo"/></p>
        	<p><label for="pwd1"> Introduzca el password:</label></p>
        	<p><input type="password" name="pwd1"/></p>
        	<p><label for="pwd2"> Vuelva a introducirlo:</label></p>
        	<p><input type="password" name="pwd2"/></p>
			<p><?= (isset($error))?$error:'' ?></p>   
			<p><input type="submit" value="Enviar"></p>
			</fieldset>
        	</form>
			<?php }?>
			</div>
   		</div>
 </body>
</html>

<?php 

function validarPassword($clave):string{
    
}

?>
			
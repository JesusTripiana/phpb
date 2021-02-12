<?php if(isset($edit) && isset($usu) && is_object($usu)): ?>
	<h1>Editando usuario <?=$usu->nombre?></h1>
	<?php $url_action = base_url."usuario/save&id=".$usu->id; ?>

	<?php else: ?>
		<h1>Registrarse</h1>
		
	<?php $url_action = base_url."usuario/save"; ?>
<?php endif; ?>


<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
	<strong class="alert_green">Registro completado correctamente</strong>
	
		<!-- compruebo si es administrador o usuario para redirigir a una vista o a otra con una recarga de la pagina de 4 segundos solo visualizando
		el mensaje de REGISTRO COMPLETADO CORRECTAMENTE-->
		<?php if (isset($_SESSION["admin"])){
			header("Refresh:4; url=".base_url."usuario/index");
		
		}else{
			header("Refresh:4; url=".base_url."");
		
		}
		Utils::deleteSession('register');
		die();
	
	?>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
	<strong class="alert_red">Registro fallido, introduce bien los datos</strong>
<?php endif; 
 //Utils::deleteSession('register'); ?>



<form action="<?=$url_action?>" method="POST">
	<label for="nombre">Nombre</label>
	<input type="text" name="nombre" value="<?=(isset($edit) && isset($usu) && is_object($usu))? $usu->nombre:" ";?>" required/> <!--Preguntar a Alberto como hacer que 
																											falle el formulario para comprobar si hace algo-->
	
	<label for="apellidos">Apellidos</label>
	<input type="text" name="apellidos" value="<?=(isset($edit) && isset($usu) && is_object($usu))? $usu->apellidos:" ";?>" required/>
	
	<label for="email">Email</label>
	<input type="email" name="email" value="<?=(isset($edit) && isset($usu) && is_object($usu))? $usu->email:" ";?>" required/>
	
	<label for="password">Contraseña</label>
	<input type="password" name="password" required/>

	<label for="password2">Confirme su Contraseña</label>
	<input type="password" name="password2" required/>
	
	<?php Utils::deleteSession('register');// elimino la sesion aqui para mostrar los datos si ya estan rellenos y son erroneos
		  Utils::deleteSession('nombre');
	?>

	<input type="submit" value="Registrarse" />
</form>


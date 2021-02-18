
<?php if(isset($_SESSION['editar'])): ?>
	<h1>Editando usuario 
	
	<?php if(isset($usu) && is_object($usu)){
		echo $usu->nombre.'</h1>';
		$url_action = base_url."usuario/save&id=".$usu->id;
	}else{echo '</h1>';}
	?>

<?php else: ?>
		<h1>Registrarse</h1>
		
	<?php $url_action = base_url."usuario/save"; ?>
<?php endif; ?>

	

<?php if (isset($_SESSION['msgERROR'])):?>
	<strong class="alert_red"><?= $_SESSION['msgERROR']?></strong>
	
<?php 
	Utils::deleteSession('msgERROR');
endif;?>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
	<strong class="alert_green">Registro completado correctamente</strong>
	
		<!-- compruebo si es administrador o usuario para redirigir a una vista o a otra con una recarga de la pagina de 4 segundos solo visualizando
		el mensaje de REGISTRO COMPLETADO CORRECTAMENTE-->
		<?php if (isset($_SESSION["admin"])){

			Utils::eliminarSesionesRegistro();
			header("Refresh:4; url=".base_url."usuario/index");
		
		}else{
			header("Refresh:4; url=".base_url."");
			Utils::eliminarSesionesRegistro();
		
		}
		Utils::deleteSession('register');
		die();
	
	?>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
	<strong class="alert_red">Registro fallido, EMAIL ya registrado vuelva a introducir.</strong>
<?php endif; 
 Utils::deleteSession('register'); ?>

<?php // compruebo los datos recibidos en el formulario para mostrar una cosa u otra
 if(isset($_SESSION['nombre'])){
	$nombre = $_SESSION['nombre'];
}elseif (isset($usu) && is_object($usu)) {
	$nombre = $usu->nombre;
}else{
	$nombre = '';
}


if(isset($_SESSION['apellidos'])){
	$apellidos = $_SESSION['apellidos'];
}elseif (isset($usu) && is_object($usu)) {
	$apellidos = $usu->apellidos;
}else{
	$apellidos = '';
}


if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
}elseif (isset($usu) && is_object($usu)) {
	$email = $usu->email;
}else{
	$email = '';
}
?>

<form action="<?=$url_action?>" method="POST">
	
	<label for="nombre">Nombre</label>
	<input type="text" name="nombre" value="<?=$nombre?>" required/>

	<label for="apellidos">Apellidos</label>
	<input type="text" name="apellidos" value="<?=$apellidos?>" required/>
	
	<?php // si el usuario es administrador y editar no existe se muestra 
	if (!isset($_SESSION['editar'])):?>
	<label for="email">Email</label>
	<input type="text" name="email" value="<?=$email?>" required/>
	<?php endif;?>


	<label for="password">Contraseña</label>
	<input type="password" name="password" required/>

	<label for="password2">Confirme su Contraseña</label>
	<input type="password" name="password2" required/>

	<?php  
 	Utils::eliminarSesionesRegistro();
 	?>

	<input type="submit" value="Registrarse" />
</form>

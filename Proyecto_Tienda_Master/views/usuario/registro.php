<?php if(isset($edit) && isset($usu) && is_object($usu)): ?>
	<h1>Editando usuario <?=$usu->nombre?></h1>
	<?php $url_action = base_url."usuario/save&id=".$usu->id; ?>

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
			header("Refresh:4; url=".base_url."usuario/index");
		
		}else{
			header("Refresh:4; url=".base_url."");
		
		}
		Utils::deleteSession('register');
		die();
	
	?>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
	<strong class="alert_red">Registro fallido, EMAIL ya registrado vuelva a introducir.</strong>
<?php endif; 
 Utils::deleteSession('register'); ?>



<form action="<?=$url_action?>" method="POST">
	
	<label for="nombre">Nombre</label>
	<input type="text" name="nombre" placeholder="<?=isset($_SESSION['nombre'])? $_SESSION['nombre']:" ";?>" required/> 

	<label for="apellidos">Apellidos</label>
	<input type="text" name="apellidos" placeholder="<?=isset($_SESSION['apellidos'])? $_SESSION['apellidos']:" ";?>" required/> 
	<!--<input type="text" name="apellidos" value="  <//isset($edit) && (isset($usu) && is_object($usu))? $usu->apellidos:" ";?>" required/>-->
	
	<label for="email">Email</label>
	<input type="email" name="email" placeholder="<?=isset($_SESSION['email'])? $_SESSION['email']:" ";?>" required/> 
	
	<label for="password">Contraseña</label>
	<input type="password" name="password" required/>

	<label for="password2">Confirme su Contraseña</label>
	<input type="password" name="password2" required/>

	<?php  
 	Utils::deleteSession('nombre'); 
	Utils::deleteSession('apellidos');
	Utils::deleteSession('email');
 	?>

	<input type="submit" value="Registrarse" />
</form>

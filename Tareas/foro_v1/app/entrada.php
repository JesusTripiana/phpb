
<form name='entrada' method="POST">

	<fieldset>
	<p><label for="nombre">Nombre:</label></p>
	<p><input type="text" name="nombre" value="<?=(isset($_REQUEST['nombre']))?$_REQUEST['nombre']:''?>"></p>
	
	<p><label for="contraseña">Contraseña: </label></p>
	<p><input type="password" name="contraseña" value="<?=(isset($_REQUEST['contraseña']))?$_REQUEST['contraseña']:''?>"></p>
	
	<input type="submit" name="orden" value="Acceder">
	</fieldset>
	
</form>
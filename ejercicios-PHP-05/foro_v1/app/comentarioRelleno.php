<form name='comentario' method="POST">

	<fieldset>
	<p><label for="tema">Tema:</label></p>
	<p><input type="text" name="tema" placeholder = "Introduzca un asunto" value = " <?= (isset($_REQUEST['tema']))?$_REQUEST['tema'] : '' ?> "></p>
	
	<p><label for="comentario">Comentario:</label></p>
	<p><textarea name="comentario" cols="47" rows ="8" placeholder="Introduzca su comentario"><?= (isset($_REQUEST['comentario']))?$_REQUEST['comentario'] : '' ?></textarea></p>
	
	<input type="submit" name="orden" value="Detalles">
	<input type="submit" name="orden" value="Nueva opinión">
	<input type="submit" name="orden" value="Terminar">
	</fieldset>
	
</form>
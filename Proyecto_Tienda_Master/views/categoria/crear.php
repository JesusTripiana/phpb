
<?php if(isset($edit) && isset($cat) && is_object($cat)): ?>
	<h1>Editar categoria <?=$cat->nombre?></h1>
	<?php $url_action = base_url."categoria/save&id=".$cat->id; ?>

	<?php else: ?>
		<h1>Crear nueva categoria</h1>
	<?php $url_action = base_url."categoria/save"; ?>
<?php endif; ?>


<form action="<?=$url_action?>" method="POST">
	<label for="nombre">Nombre</label>
	<!-- Modificado para que aparezca la categoria a modificar -->
	<input type="text" name="nombre" <?=(isset($edit) && isset($cat))? "placeholder = '$cat->nombre'" : "";?> required /> 
	
	<input type="submit" value="Guardar" />
</form>
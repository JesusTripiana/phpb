<h1>Gestionar categorias</h1>

<a href="<?=base_url?>categoria/crear" class="button button-small">
	Crear categoria
</a>

<?php if(isset($_SESSION['editada'])){ // Modificado
	if(isset($_SESSION['categoria']) && $_SESSION['categoria'] == 'complete' && $_SESSION['editada'] == 'editado'): ?>
	<strong class="alert_green">La categoria se ha editado correctamente</strong>
<?php elseif(isset($_SESSION['categoria']) && $_SESSION['categoria'] != 'complete' && $_SESSION['editada'] = 'Noeditado'): ?>	
	<strong class="alert_red">La categoria NO se ha editado correctamente</strong>
<?php endif;
Utils::deleteSession('editada'); 
Utils::deleteSession('categoria');}	
else{?>

<?php if (isset($_SESSION['categoria']) && $_SESSION['categoria'] == 'complete'): ?>
	<strong class="alert_green">La categoria se ha creado correctamente</strong>
<?php elseif (isset($_SESSION['categoria']) && $_SESSION['categoria'] != 'complete'): ?>	
	<strong class="alert_red">La categoria NO se ha creado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('categoria'); ?>
	
<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
	<strong class="alert_green">La categoria se ha borrado correctamente</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>	
	<strong class="alert_red">La categoria NO SE PUEDE BORRAR por tener articulos asociados</strong></br>
<?php endif; ?>
<?php Utils::deleteSession('delete'); }?>

<table>
	<tr>
		<th>ID</th>
		<th>NOMBRE</th>
		<th>MODELOS</th>
		<th>STOCK TOTAL</th>
		<th>VALOR ALMACEN</th>
		<th>ACCIONES</th>
	</tr>

	<?php 
	
	while($val = $valoresAlmacen->fetch_object()):?>
		<tr>
			<td><?=$val->id;?></td>
			<td><?=$val->nombre;?></td>
			<td><?=$val->numProductos;?></td>
			<td><?=$val->cantidad;?></td>
			<td><?=$val->total;?></td>
			<td>
				<a href="<?=base_url?>categoria/editar&id=<?=$val->id?>" class="button button-gestion">Editar</a>		
				<a href="<?=base_url?>categoria/eliminar&id=<?=$val->id?>" class="button button-gestion button-red">Eliminar</a>	
			</td>
		</tr>
		</tr>
	<?php endwhile; ?>
</table>

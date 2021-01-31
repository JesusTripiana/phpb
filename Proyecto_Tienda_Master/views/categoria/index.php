<h1>Gestionar categorias</h1>

<a href="<?=base_url?>categoria/crear" class="button button-small">
	Crear categoria
</a>

<?php if(isset($_SESSION['editada'])){
	if(isset($_SESSION['categoria']) && $_SESSION['categoria'] == 'complete' && $_SESSION['editada'] == 'editado'): ?>
	<strong class="alert_green">La categoria se ha editado correctamente</strong>
<?php elseif(isset($_SESSION['categoria']) && $_SESSION['categoria'] != 'complete' && $_SESSION['editada'] = 'Noeditado'): ?>	
	<strong class="alert_red">La categoria NO se ha editado correctamente</strong>
<?php endif;
Utils::deleteSession('editada'); }	
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
	<strong class="alert_red">La categoria NO se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); }?>

<table>
	<tr>
		<th>ID</th>
		<th>NOMBRE</th>
		<th>MODELOS</th>
		<th>ACCIONES</th>
	</tr>

	<?php while($cat = $categorias->fetch_object()):?>

		<tr>
			<td><?=$cat->id;?></td>
			<td><?=$cat->nombre;?></td>

		<?php $totalFilas = $modelos->num_rows;
		$cont=0;
        foreach ($modelos as $mod) {
            $cont++;
            if ($cat->id == $mod["categoria_id"]) {?>

				<td><?=$mod["modelos"];?></td>

			<?php break;
            } elseif ($cont == $totalFilas) {?>

				<td>0</td>

				<?php }
        		}?>

			<td>
				<a href="<?=base_url?>categoria/editar&id=<?=$cat->id?>" class="button button-gestion">Editar</a>
				<a href="<?=base_url?>categoria/eliminar&id=<?=$cat->id?>" class="button button-gestion button-red">Eliminar</a>
			</td>
		</tr>
		</tr>
	<?php endwhile; ?>
</table>

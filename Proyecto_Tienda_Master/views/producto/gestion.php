
<h1>Gestión de productos</h1>

<a href="<?=base_url?>producto/crear" class="button button-small">
	Crear producto
</a>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
	<strong class="alert_green">El producto se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'): ?>	
	<strong class="alert_red">El producto NO se ha creado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>
	
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
	<strong class="alert_green">El producto se ha borrado correctamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>	
	<strong class="alert_red">El producto NO se ha borrado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>
	
<table>
	<tr>
		<th>ID</th>
		<th>NOMBRE</th>
		<th>PRECIO</th>
		<th>STOCK</th>
		<th>ACCIONES</th>
	</tr>
	<?php while($pro = $productos->fetch_object()): ?>
		<tr>
			<td><?=$pro->id;?></td>
			<td><?=$pro->nombre;?></td>
			<td><?=$pro->precio;?></td>
			<td><?=$pro->stock;?></td>
			<td>
				<a href="<?=base_url?>producto/editar&id=<?=$pro->id?>" class="button button-gestion">Editar</a>
				<a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>
			</td>
		</tr>
	<?php endwhile; ?>

	<tr>
      <td>Página <?=$_SESSION['pagina']?> de <?=$numPaginas?></td>
      <!-- Primera -->
      <td>
        <form action="gestion" method="post">
          <button type="submit" name="pagina" value="Primera">
          Primera
          </button>
        </form>
      </td>
      <!-- Anterior -->
      <td> 
        <form action="gestion" method="post">
          <button type="submit" name="pagina" value="Anterior">
           << Anterior
          </button>
        </form>
      </td>
      <!-- Siguiente -->
      <td>
        <form action="gestion" method="post">
          <button type="submit" name="pagina" value="Siguiente">
		  Siguiente >>
        </button>
        </form>
      </td>
      <!-- Última -->
      <td > 
        <form action="gestion" method="post">
          <button type="submit" name="pagina" value="Ultima">
		  Última
          </button>
        </form>
      </td> 
	  <tr>
	  <td > 
        <form action="gestion" method="post">
		<label for="numArticulos">Mostrar cantidad de artículos</label>
          <input type="text" name="numArticulos"/>
          
        </form>
      </td>     
	  </tr>     
</table>

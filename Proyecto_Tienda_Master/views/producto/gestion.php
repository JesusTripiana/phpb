
<h1>Gestión de productos</h1>

<a href="<?=base_url?>producto/crear" class="button button-small">
	Crear producto
</a>

<?php if(isset($_SESSION['producto']) && $_SESSION['editar'] && $_SESSION['producto'] == 'complete'): ?>
	<strong class="alert_green">El producto se ha editado correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && !$_SESSION['editar'] && $_SESSION['producto'] != 'complete'): ?>	
	<strong class="alert_red">El producto NO se ha editado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>

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
	 <!-- Parte que muestra el contenido de la tabla  -->
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

		<!-- Parte donde aparecen los botones de paginacion -->
	<tr>
      <td colspan = "2" >Página <?=$_SESSION['pagina']?> de <?=$numPaginas?></td>
      <!-- Primera -->
      <td colspan = "3">
        <form action="gestion" method="post">
          <button type="submit" name="pagina" value="Primera" style = "display:inline-block">
          Primera
          </button>
          <button type="submit" name="pagina" value="Anterior" style = "display:inline-block">
           << Anterior
          </button>
        
          <button type="submit" name="pagina" value="Siguiente" style = "display:inline-block">
		  Siguiente >>
        </button>
        
          <button type="submit" name="pagina" value="Ultima" style = "display:inline-block">
		  Última
          </button>
        </form>
      </td> 
	  </tr>
    <tr>

		<!-- Parte donde se indica si se quiere modificar la cantidad de articulos a mostrar-->
    <td colspan = "5"> <b>Cantidad de artículos a mostrar</b></td>
    </tr>
	  <tr>
      <td colspan = "2"></td>
      <th > 
        <form action="gestion" method="post">
          <input type="text" name="numArticulos"/> 
        </form>
      </th>
      <td colspan = "2"></td>
    </tr>
   
</table>

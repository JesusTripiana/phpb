<h1>Gestionar Usuarios</h1>

<a href="<?=base_url?>usuario/registro" class="button button-small">
	Crear usuario nuevo
</a>
<?php if (isset($_SESSION['editar']) && $_SESSION['editar'] && isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
	<strong class="alert_green">El usuario se ha EDITADO correctamente</strong>
<?php endif; 

Utils::deleteSession('editar');
Utils::deleteSession('register');
?>

<!-- Codigo NUEVO para mostrar confirmacion o no del borrado de usuario-->
<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
	<strong class="alert_green">El usuario se ha borrado correctamente</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>	
	<strong class="alert_red">El usuario NO SE PUEDE BORRAR por tener pedidos pendientes de servir</strong></br>
<?php endif; 
      Utils::deleteSession('delete');?>

<!--Muestro los usuarios registrados en el sistema-->
<table>
	<tr>
		<th>ID</th>
		<th>NOMBRE</th>
		<th>APELLIDOS</th>
		<th>EMAIL</th>
		<th>ROL</th>
        <th>IMPORTE PEDIDOS</th>
        <th>ACCIONES</th>
	</tr>

	<?php 
	
	while($usu = $usuarios->fetch_object()): // tabla modificada?>

		<tr>
			<td>
            <a href="<?= base_url ?>usuario/detalle&id=<?=$usu->id;?>&totalPedidos=<?=$usu->totalPedidos;?>"><?=$usu->id;?></a>
            </td>
			<td><?=$usu->nombre;?></td>
			<td><?=$usu->apellidos;?></td>
			<td><?=$usu->email;?></td>
			<td><?=$usu->rol;?></td>
			<!-- NUMBER_FORMAT da formato a una variable INT, explicado mas detallado en DETALLES usuario-->
            <td><?=number_format($usu->totalPedidos,2,',','.');?> €</td>
			<td>
				<a href="<?=base_url?>usuario/editar&id=<?=$usu->id?>" class="button button-gestion">Modificar</a>		
				<a href="<?=base_url?>usuario/eliminar&id=<?=$usu->id?>" class="button button-gestion button-red">Eliminar</a>	
			</td>
		</tr>
		</tr>
	<?php endwhile; ?>
</table>

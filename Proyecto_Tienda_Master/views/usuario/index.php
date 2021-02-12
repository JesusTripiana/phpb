<h1>Gestionar Usuarios</h1>

<a href="<?=base_url?>usuario/registro" class="button button-small">
	Crear usuario nuevo
</a>

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
	
	while($usu = $usuarios->fetch_object()):?>
		<tr>
			<td><?=$usu->id;?></td>
			<td><?=$usu->nombre;?></td>
			<td><?=$usu->apellidos;?></td>
			<td><?=$usu->email;?></td>
			<td><?=$usu->rol;?></td>
            <td><?=$usu->totalPedidos;?> €</td>
			<td>
            <!--faltan las funciones de Detalles  usuario en el CONTROLER-->
				<a href="<?=base_url?>usuario/detalles&id=<?=$usu->id?>" class="button button-gestion">Usuario Detallado</a>		
				<a href="<?=base_url?>usuario/eliminar&id=<?=$usu->id?>" class="button button-gestion button-red">Eliminar</a>	
			</td>
		</tr>
		</tr>
	<?php endwhile; ?>
</table>

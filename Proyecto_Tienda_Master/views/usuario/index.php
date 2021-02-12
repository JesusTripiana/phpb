<h1>Gestionar Usuarios</h1>

<a href="<?=base_url?>usuario/registro" class="button button-small">
	Crear usuario nuevo
</a>

<!--Muestro los usuarios registrados en el sistema-->
<table>
	<tr>
		<th>ID</th>
		<th>NOMBRE</th>
		<th>APELLIDOS</th>
		<th>EMAIL</th>
		<th>ROL</th>
	</tr>

	<?php 
	
	while($usu = $usuarios->fetch_object()):?>
		<tr>
			<td><?=$usu->id;?></td>
			<td><?=$usu->nombre;?></td>
			<td><?=$usu->apellidos;?></td>
			<td><?=$usu->email;?></td>
			<td><?=$usu->rol;?></td>
			<td>
            <!--faltan las funciones de editar y eliminar usuario en el CONTROLER-->
				<a href="<?=base_url?>usuario/editar&id=<?=$val->id?>" class="button button-gestion">Editar</a>		
				<a href="<?=base_url?>usuario/eliminar&id=<?=$val->id?>" class="button button-gestion button-red">Eliminar</a>	
			</td>
		</tr>
		</tr>
	<?php endwhile; ?>
</table>

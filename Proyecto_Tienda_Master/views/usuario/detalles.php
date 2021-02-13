
<?php 
	// compruebo si el objeto pedidos viene sin contenido
    if ($pedidos->num_rows == 0):
?>
<h3>El usuario no tiene pedidos por el momento</h3>

<?php 
header("Refresh:3; url=".base_url."usuario/index");
die();
endif;?>

<table>
	<tr>
		<th>ID_PEDIDO</th>
		<th>ID_USUARIO</th>
		<th>PROVINCIA</th>
		<th>LOCALIDAD</th>
		<th>DIRECCION</th>
        <th>COSTE</th>
        <th>ESTADO</th>
        <th>FECHA</th>
        <th>HORA</th>
	</tr>

	<?php 
	
	while($ped = $pedidos->fetch_object()): // tabla modificada?>

		<tr>
			<td><?=$ped->id;?></td>
			<td><?=$ped->usuario_id;?></td>
			<td><?=$ped->provincia;?></td>
			<td><?=$ped->localidad;?></td>
			<td><?=$ped->direccion;?></td>
            <td><?=$ped->coste;?> €</td>
            <td><?=$ped->estado;?></td>
            <td><?=$ped->fecha;?></td>
            <td><?=$ped->hora;?></td>
		</tr>
	<?php endwhile; ?>
</table>

<br><h3>El total de pedidos del usuario asciende a <?=$_SESSION['totalPedidos']?> €</h3>
<?php Utils::deleteSession('totalPedidos');?>

<form action="<?=base_url?>usuario/index">
	<input type="submit" value="Volver Atras">
</form>

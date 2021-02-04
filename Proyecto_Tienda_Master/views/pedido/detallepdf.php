<h1>Detalle del pedido</h1><hr>

<?php if (isset($pedido)): ?>

    <h3>Dirección de envio</h3>
		Provincia: <?= $pedido->provincia ?>   <br/>
		Cuidad: <?= $pedido->localidad ?> <br/>
		Direccion: <?= $pedido->direccion ?>   <br/><br/>
    
		
		<h3>Productos del Pedido:</h3>
		<table>
			<tr>
				<th>Nombre</th>
				<th>Precio</th>
				<th>Unidades</th>
			</tr>
			<?php while ($producto = $productos->fetch_object()): ?>
				<tr>
					
					<td>
						<?= $producto->nombre ?>
					</td>
					<td>
						<?= $producto->precio ?>
					</td>
					<td>
						<?= $producto->unidades ?>
					</td>
				</tr>
			<?php endwhile; ?>
            <tr>
            <th>Total a pagar-></th>
            <th><?= $pedido->coste ?> $</th>
            </tr>
            
        </table>

        <h3>Datos del pedido:</h3>
		Estado: <?=Utils::showStatus($pedido->estado)?> <br/>
		Número de pedido: <?= $pedido->id ?>   <br/>        
	<?php endif; ?>
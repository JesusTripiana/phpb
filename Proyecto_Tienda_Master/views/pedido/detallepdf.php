<h1>Detalle del pedido</h1><hr>

<?php if (isset($pedido)): ?>
	<h2>Datos del pedido:</h2>
		Estado: <?=Utils::showStatus($pedido->estado)?> <br/>
		Número de pedido: <?= $pedido->id ?>   <br/>  

	<h3>Datos del Cliente:</h3>
	Identificador: <?= $usr->id ?>   <br/>
		Nombre: <?= $usr->nombre." ".$usr->apellidos ?> <br/>
		Email: <?= $usr->email ?>   <br/><br/>  

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

					<?php // muestro el precio con descuento si el producto esta en OFERTA
						 if($producto->oferta == 'si'){
							echo number_format(($producto->precio*DESCUENTO),2,',','.').' €';
						}else{
								echo number_format($producto->precio,2,',','.').' €';
						}?>
						
					</td>
					<td>
						<?= $producto->unidades ?>
					</td>
				</tr>
			<?php endwhile; ?>
            <tr>
            <th>Total a pagar-></th>
            <th><?=number_format($pedido->coste,2,',','.');?> €</th>
            </tr>
            
        </table>

             
	<?php endif; ?>
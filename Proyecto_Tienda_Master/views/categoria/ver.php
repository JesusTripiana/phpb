<?php if (isset($categoria)): ?>
	<h1><?= $categoria->nombre ?></h1>
	<?php if ($productos->num_rows == 0): ?>
		<p>No hay productos para mostrar</p>
	<?php else: ?>

		<?php while ($product = $productos->fetch_object()): ?>
			<div class="product">
				<a href="<?= base_url ?>producto/ver&id=<?= $product->id ?>">
					<?php if ($product->imagen != null): ?>
						<img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" />
					<?php else: ?>
						<img src="<?= base_url ?>assets/img/camiseta.png" />
					<?php endif; ?>
					<h2><?= $product->nombre ?></h2>
				</a>

				<!--si el producto esta en OFERTA-->
				<?php	if ($product->oferta == 'si'):	?>
					<p><img class="img_carrito" src="<?=base_url?>assets/img/oferta.png" alt="oferta"></p><br>
					<p class="price" style="text-decoration:line-through"><?= number_format($product->precio,2,',','.'); ?> €</p>
					<p class="price" style="color:red"><b><?= number_format($product->precio*DESCUENTO,2,',','.'); ?> €</b></p><br><br><br>
				<?php else: ?>
					<p class="price"><b><?= number_format($product->precio,2,',','.'); ?> €</b></p><br>
				<?php endif; ?>

				<a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a>
			</div>
		<?php endwhile; ?>

	<?php endif; ?>
<?php else: ?>
	<h1>La categoría no existe</h1>
<?php endif; ?>

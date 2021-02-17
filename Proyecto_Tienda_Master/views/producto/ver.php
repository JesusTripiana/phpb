<?php if (isset($product)): ?>
	<h1><?= $product->nombre ?></h1>
	<div id="detail-product">
		<div class="image">
			<?php if ($product->imagen != null): ?>
				<img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" />
			<?php else: ?>
				<img src="<?= base_url ?>assets/img/camiseta.png" />
			<?php endif; ?>
		</div>
		<div class="data">
			<p class='descripcion'><?= $product->descripcion ?> </p><br>
			<!--si el producto esta en OFERTA-->
			<?php	if ($product->oferta == 'si'):	?>
				<p><img style="height: 100px; width: 100px" src="<?=base_url?>assets/img/oferta.png" alt="oferta"></p><br>
				<p class="price" style="text-decoration:line-through"><?= number_format($product->precio,2,',','.'); ?> €</p>
				<p class="price" style="color:red"><b><?= number_format($product->precio*DESCUENTO,2,',','.'); ?> €</b></p><br><br><br>
			<?php else: ?>
				<p class="price"><b><?= number_format($product->precio,2,',','.'); ?> €</b></p><br>
			<?php endif; ?>

			<a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a>
		</div>
	</div>
<?php else: ?>
	<h1>El producto no existe</h1>
<?php endif; ?>

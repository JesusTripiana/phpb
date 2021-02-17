<h1>Algunos de nuestros productos</h1>

<?php while($product = $productos->fetch_object()): ?>
	<div class="product">
		<a href="<?=base_url?>producto/ver&id=<?=$product->id?>">
			<?php if($product->imagen != null): ?>
				<img src="<?=base_url?>uploads/images/<?=$product->imagen?>" />
			<?php else: ?>
				<img src="<?=base_url?>assets/img/camiseta.png" />
				<?php endif; ?>

			<h2><?=$product->nombre?></h2></a>
				<!--Si hay algun producto en OFERTA se muestra -->
			<?php if ($product->oferta == 'si'): ?>
				<p><img style="heigth:50px; width:50px; margin-boton:0px" src="<?=base_url?>assets/img/oferta.png" alt="oferta"></p>
				

				<p class="price" style="text-decoration:line-through"><?= number_format($product->precio,2,',','.'); ?> €</p>
				<p class="price" style="color:red"><b><?= number_format($product->precio*DESCUENTO,2,',','.'); ?> €</b></p><br><br>
		
			<?php else: ?>
				<p><?=number_format($product->precio,2,',','.');?> €</p>
			<?php endif; ?>

		<a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a>
	</div>
<?php endwhile; ?>

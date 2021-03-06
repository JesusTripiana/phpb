<h1>Algunos de nuestros productos</h1>

<?php while($product = $productos->fetch_object()): ?>
	<div class="product">
		<a href="<?=base_url?>producto/ver&id=<?=$product->id?>">
			<?php if($product->imagen != null): ?>
				<img src="<?=base_url?>uploads/images/<?=$product->imagen?>" />
			<?php else: ?>
				<img src="<?=base_url?>assets/img/camiseta.png" />
				<?php endif; ?>

			</a>
				<!--Si hay algun producto en OFERTA se muestra -->
			<?php if ($product->oferta == 'si'): ?>
				<p><img style="height: 60px; width: 60px; float: left;" src="<?=base_url?>assets/img/oferta.png" alt="oferta"></p>
				<h3><?=$product->nombre?></h3>
				
				<p ><b class="price" style="text-decoration:line-through"><?= number_format($product->precio,2,',','.'); ?></b> €
				<b class="price" style="color:red"><?= number_format($product->precio*DESCUENTO,2,',','.'); ?> €</b></p>
		
			<?php else: ?>
				<h2><?=$product->nombre?></h2></a>
				<p><?=number_format($product->precio,2,',','.');?> €</p>
			<?php endif; ?>

			<?php if ($product->stock==0): ?>
				<a class="button">NO DISPONIBLE</a>
			<?php else: ?>
				<a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a>
			<?php endif; ?>
	</div>
<?php endwhile; ?>

<h1>¡¡¡OFERTAS ESPECIALES!!!</h1>

<?php while ($pro = $productosOferta->fetch_object()):?>
  <div class="product">
		<a href="<?=base_url?>producto/ver&id=<?=$pro->id?>">
			<?php if($pro->imagen != null): ?>
				<img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" />
			<?php else: ?>
				<img src="<?=base_url?>assets/img/camiseta.png" />
				<?php endif; ?>

			<h2><?=$pro->nombre?></h2></a>
				
				<p><img style="height: 100px; width: 100px; float: left;" src="<?=base_url?>assets/img/oferta.png" alt="oferta"></p><br>
				<p class="price" style="text-decoration:line-through"><?= number_format($pro->precio,2,',','.'); ?> €</p>
				<p class="price" style="color:red"><b><?= number_format($pro->precio*DESCUENTO,2,',','.'); ?> €</b></p><br><br>

		<a href="<?=base_url?>carrito/add&id=<?=$pro->id?>" class="button">Comprar</a>
	</div>
<?php endwhile; ?>



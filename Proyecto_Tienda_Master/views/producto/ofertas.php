<h1>¡¡¡OFERTAS ESPECIALES!!!</h1>

<?php while ($pro = $productosOferta->fetch_object()):?>
    <div class="product">
        <a href="<?= base_usl?>producto/ver&id=<?=$pro->id?>">

        <?php if($pro->imagen != null): ?>
				<img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" />
		<?php else: ?>
				<img src="<?=base_url?>assets/img/camiseta.png" />
			<?php endif; ?>
        
        <h2><?=$pro->nombre?></h2>
        </a>

        <img src="<?=base_url?>uploads/images/oferta.png"/>
        <h2><?=$pro->nombre?></h2>
    
        <p> 
		<b class="price" style="text-decoration:line-through"><?= $product->precio ?>$</b>
		<b class="price" style="color:red">&nbsp;&nbsp;<?= $product->precio*0.5 ?>$</b> 
		</p> 
		 
		<a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a>
    </div>
<?php endwhile; ?>
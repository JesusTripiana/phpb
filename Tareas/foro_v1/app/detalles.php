<fieldset>
			
				<p><b>Detalles:</b> </p>
				<p>Longitud:  <?= contarletras($_REQUEST['comentario']) ?></p>
				<p>N° de palabras: <?=contarPalabras($_REQUEST ['comentario']) ?></p>
				<p>Letra + repetida: <?= letraMasRepetida($_REQUEST['comentario'])?></p>
				<p>Palabra + repetida: <?= palabraMasRepetida($_REQUEST['comentario']) ?></p>
</fieldset>
<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
   		<link rel="stylesheet" href="assets/css1/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/styles.css" />
		<title>Tienda de Camisetas</title>
	</head>
	<body>
		<div id="container">
			<!-- CABECERA -->
			<header class="row" id="header">
				<div class="col-12"id="logo">
					<img src="assets/img/camiseta.png" alt="Camiseta Logo" />
					<a href="index.php">
						Tienda de camisetas
					</a>
				</div>
			</header>

			<!-- MENU -->
			<nav id="menu">
				<ul>
					<li>
						<a href="#">Inicio</a>
					</li>
					<li>
						<a href="#">Categoria 1</a>
					</li>
					<li>
						<a href="#">Categoria 2</a>
					</li>
					<li>
						<a href="#">Categoria 3</a>
					</li>
					<li>
						<a href="#">Categoria 4</a>
					</li>
					<li>
						<a href="#">Categoria 5</a>
					</li>
				</ul>
			</nav>

			<div id="content">

				<!-- BARRA LATERAL -->
				<aside id="lateral">

					<div id="login" class="block_aside">
						<h3>Entrar a la web</h3>
						<form action="#" method="post">
							<label for="email">Email</label>
							<input type="email" name="email" />
							<label for="password">Contraseña</label>
							<input type="password" name="password" />
							<input type="submit" class="btn btn-outline-danger" value="Enviar" />
						</form>
						
						<ul>
							<li><a href="#">Mis pedidos</a></li>
							<li><a href="#">Gestionar pedidos</a></li>
							<li><a href="#">Gestionar categorias</a></li>
						</ul>
					</div>

				</aside>

				<!-- CONTENIDO CENTRAL -->
				<div id="central">
					<h1>Productos destacados</h1>
					
					<div class="product">
						<img src="assets/img/camiseta.png" />
						<h2>Camiseta Azul Ancha</h2>
						<p>30 euros</p>
						<a href="" class="button">Comprar</a>
					</div>

					<div class="product">
						<img src="assets/img/camiseta.png" />
						<h2>Camiseta Azul Ancha</h2>
						<p>30 euros</p>
						<a href="" class="button">Comprar</a>
					</div>

					<div class="product">
						<img src="assets/img/camiseta.png" />
						<h2>Camiseta Azul Ancha</h2>
						<p>30 euros</p>
						<a href="" class="button">Comprar</a>
					</div>

				</div>
			</div>

			<!-- PIE DE PÁGINA -->
			<footer id="footer">
				<p>Desarrollado por Víctor Robles WEB &copy; <?= date('Y') ?></p>
			</footer>
		</div>
	<script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>
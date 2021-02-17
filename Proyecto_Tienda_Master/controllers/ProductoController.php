<?php
require_once 'models/Producto.php';

class productoController{
	
	public function index(){
		$producto = new Producto();
		$productos = $producto->getRandom(6);
		
		// renderizar vista
		require_once 'views/producto/destacados.php';
	}

	
	public function ver(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
		
			$producto = new Producto();
			$producto->setId($id);
			
			$product = $producto->getOne();
			
		}
		require_once 'views/producto/ver.php';
	}

	// funcion para mostrar todos los productos que en el campo OFERTA esta en 'si'
	public function mostrarProductosOferta(){
		$producto = new Producto();
		$productosOferta = $producto->getProductoOferta();
		
		require_once 'views/producto/ofertas.php';
	}
	
	public function gestion(){
		Utils::isAdmin();
		
		$producto = new Producto();
		
		// Intentar hacer esta parte de paginacion generica para poder añadir en 
		// otras vistas si es necesario
		
		if (!isset($_POST["numArticulos"]) && !isset($_SESSION['numFilasMostrar'])){
			$_SESSION['numFilasMostrar'] = 4;	
		} elseif (isset($_POST["numArticulos"])){
			$numFilasMostrar = intval($_POST["numArticulos"]);
			$_SESSION['numFilasMostrar'] = $numFilasMostrar;
		}
		
		$numPaginas = floor (abs ($producto->count_row() - 1 ) / $_SESSION['numFilasMostrar'] + 1 );
		
		if (!isset($_SESSION['pagina'])){
			$_SESSION['pagina'] = 1;
		}

		if (isset($_POST['pagina'])){
			$pagina = $_POST['pagina'];
		} else {
			$pagina = "Primera";
		}
		if ($pagina == "Primera"){
			$_SESSION["pagina"] = 1;
		}

		if (($pagina == "Anterior") && ($_SESSION['pagina'] > 1)){
			$_SESSION['pagina']--;
		}

		if (($pagina == "Siguiente") && ($_SESSION['pagina'] < $numPaginas)){
			$_SESSION['pagina']++;
		}

		if ($pagina == "Ultima"){
			$_SESSION['pagina'] = $numPaginas;
		}

		$productos = $producto->getAll(($_SESSION['pagina'] -1 ) * $_SESSION['numFilasMostrar'] ,
		$_SESSION['numFilasMostrar'] ); 

		require_once 'views/producto/gestion.php';
	}
	
	public function crear(){
		Utils::isAdmin();
		require_once 'views/producto/crear.php';
	}
	
	public function save(){
		Utils::isAdmin();
		if(isset($_POST)){
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
			$precio = isset($_POST['precio']) ? $_POST['precio'] : false;
			$stock = isset($_POST['stock']) ? $_POST['stock'] : false;
			// añado esta linea para la modificacion de si el producto esta en oferta o no
			$oferta = isset($_POST['oferta'])? $_POST['oferta'] : false;
			$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
			// $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false; 
			
			if($nombre && $descripcion && $precio && $stock && $oferta && $categoria){
				$producto = new Producto();
				$producto->setNombre($nombre);
				$producto->setDescripcion($descripcion);
				$producto->setPrecio($precio);
				$producto->setStock($stock);
				// linea añadida para incluir en objeto PRODUCTO el estado del campo oferta 
				$producto->setOferta($oferta);
				$producto->setCategoria_id($categoria);
				
				// Guardar la imagen
				if(isset($_FILES['imagen'])){
					$file = $_FILES['imagen'];
					$filename = $file['name'];
					$mimetype = $file['type'];

					if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){

						if(!is_dir('uploads/images')){
							mkdir('uploads/images', 0777, true);
						}

						$producto->setImagen($filename);
						move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
					}
				}
				
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					$producto->setId($id);
					$_SESSION["editar"] = true;
					
					$save = $producto->edit();
					
					if(!$save){
						$_SESSION["editar"] = false;
					}

				}else{
					$save = $producto->save();
				}
				
				if($save){
					$_SESSION['producto'] = "complete";
				}else{
					$_SESSION['producto'] = "failed";
				}
			}else{
				$_SESSION['producto'] = "failed";
			}
		}else{
			$_SESSION['producto'] = "failed";
		}
		header('Location:'.base_url.'Producto/gestion');
	}
	
	public function editar(){
		Utils::isAdmin();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$edit = true;
			
			$producto = new Producto();
			$producto->setId($id);
			
			$pro = $producto->getOne();
			
			require_once 'views/producto/crear.php';
			
		}else{
			header('Location:'.base_url.'Producto/gestion');
		}
	}
	
	public function eliminar(){
		Utils::isAdmin();
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$producto = new Producto();
			$producto->setId($id);
			
			$delete = $producto->delete();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
		}
		
		header('Location:'.base_url.'Producto/gestion');
	}
	
}
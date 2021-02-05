<?php
require_once 'models/Categoria.php';
require_once 'models/Producto.php';

class categoriaController{
	
	public function index(){
		Utils::isAdmin();
		$categoria = new Categoria();
		//$categorias = $categoria->getAll();
		$valoresAlmacen = $categoria->getAllValoresAlmacen();
		 
		require_once 'views/categoria/index.php';
	}
	
	public function ver(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			
			// Conseguir categoria
			$categoria = new Categoria();
			$categoria->setId($id);
			$categoria = $categoria->getOne();
			
			// Conseguir productos;
			$producto = new Producto();
			$producto->setCategoria_id($id);
			$productos = $producto->getAllCategory();
		}
		
		require_once 'views/categoria/ver.php';
	}
	
	public function crear(){
		Utils::isAdmin();
		require_once 'views/categoria/crear.php';
	}

	public function editar(){ //Creado por Jesus
		Utils::isAdmin();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$edit = true;
			
			$categorias = new Categoria();
			$categorias->setId($id);
			
			$cat = $categorias->getOne();
			
			require_once 'views/categoria/crear.php'; 
			
		}else{
			header('Location:'.base_url.'categoria/index');
		}
	}
	
	public function save(){ // modificado Jesus
		Utils::isAdmin();
	   
		if (isset($_POST) && isset($_POST['nombre'])){
			$nombre = $_POST['nombre'];

			if ($nombre){
				$categoria = new Categoria();
				$categoria->setNombre($nombre);

				if(isset($_GET['id'])){
					$id = $_GET['id'];
					$_SESSION['editada'] = 'Noeditado';
					$categoria->setId($id);
					
					$save = $categoria->edit();
					if ($save){
						$_SESSION['editada'] = 'editado';
					}else{
						$_SESSION['editada'] = 'Noeditado';
					}
				}else{
					$save = $categoria->save();
				}
				
				if($save){
					$_SESSION['categoria'] = "complete";
				}else{
					$_SESSION['categoria'] = "failed";
				}
			}else{
				$_SESSION['categoria'] = "failed";
			}

		}else{
			$_SESSION['categoria'] = "failed";
		}

		header("Location:".base_url."categoria/index");
	}

	public function eliminar(){
		Utils::isAdmin();
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$categoria = new Categoria();
			$categoria->setId($id);
			
			$delete = $categoria->delete();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
		}
		
		header('Location:'.base_url.'categoria/index');
	}
	
}
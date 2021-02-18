<?php
require_once 'models/Pedido.php'; // include nuevo
require_once 'models/Usuario.php';

class usuarioController{
	
	public function index(){
		//echo "Controlador Usuarios, Acción index"; // linea de codigo de aplicacion inicial
		
		// codigo nuevo -- chequea que sea administrador y crea un objeto usuario con todos los usuarios .
		Utils::isAdmin();
		$usuario = new Usuario();
		$usuarios = $usuario->getAllWithTotal();
		 
		require_once 'views/usuario/index.php';
	}
	
	public function registro(){
		require_once 'views/usuario/registro.php';
	}
	
	public function save(){
		if(isset($_POST)){
			
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;
			$password2 = isset($_POST['password2']) ? $_POST['password2'] : false;

			$_SESSION ['nombre'] = $nombre;
			$_SESSION ['apellidos'] = $apellidos;
			$_SESSION ['email'] = $email;

			if ($password != $password2){
				$_SESSION['msgERROR'] = "Los PASSWORD SON DIFERENTES, vuelva a introducir.";
				header("Location:".base_url.'usuario/registro');
				die();
			}

			if (isset($_GET['id'])){
				$id = $_GET['id'];
				$usuario = new Usuario();
				$usuario->setId($id);
				$usuario->setNombre($nombre);
				$usuario->setApellidos($apellidos);
				$usuario->setPassword($password);

				$_SESSION["editar"] = true;
				
				$save = $usuario->edit();
                if (!$save) {
                    $_SESSION["editar"] = false;
					$_SESSION['register'] = "failed";
                }else {
					$_SESSION['register'] = "complete";
					Utils::deleteSession('nombre');
					Utils::deleteSession('apellidos');
					header("Location:".base_url.'usuario/index');
					die();
                }
				
			}elseif($nombre && $apellidos && $email && $password){
				$usuario = new Usuario();
				$usuario->setNombre($nombre);
				$usuario->setApellidos($apellidos);
				$usuario->setEmail($email);
				$usuario->setPassword($password);
 
				$save = $usuario->save();

				if($save){
					$_SESSION['register'] = "complete";
				}else{
					$_SESSION['register'] = "failed";
				}
			}else{
				$_SESSION['register'] = "failed";
			}
	
		}else {
			$_SESSION['register'] = "failed";
		}
		header("Location:".base_url.'usuario/registro');
	}

	public function editar(){
		Utils::isAdmin();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$_SESSION['editar'] = true;
			
			$usuario = new Usuario();
			$usuario->setId($id);
			
			$usu = $usuario->getOne();
			
			require_once 'views/usuario/registro.php';
			
		}else{
			header('Location:'.base_url.'Producto/gestion');
		}
	}

	public function detalle(){
		Utils::isAdmin();
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			if ($_GET['totalPedidos'] > 0){
				$_SESSION['totalPedidos'] = $_GET['totalPedidos'];
			}
			
			// obtener todos los pedidos de 1 usuario
			$pedido = new Pedido();
			$pedido->setUsuario_id($id);
			$pedidos = $pedido->getAllByUser();
			
			require_once 'views/usuario/detalles.php';
		}else{
			header('Location:'.base_url.'usuario/index');
		}
	}

	public function eliminar(){ // codigo nuevo
		Utils::isAdmin();
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$usuario = new Usuario();
			$usuario->setId($id);
			
			$delete = $usuario->delete();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
		}
		
		header('Location:'.base_url.'usuario/index');
	}
	
	public function login(){
		if(isset($_POST)){
			// Identificar al usuario
			// Consulta a la base de datos
			$usuario = new Usuario();
			$usuario->setEmail($_POST['email']);
			$usuario->setPassword($_POST['password']);
			
			$identity = $usuario->login();
			
			if($identity && is_object($identity)){
				$_SESSION['identity'] = $identity;
				
				if($identity->rol == 'admin'){
					$_SESSION['admin'] = true;
				}
				
			}else{
				$_SESSION['error_login'] = 'Identificación fallida !!';
			}
		
		}
		header("Location:".base_url);
	}
	
	public function logout(){
		if(isset($_SESSION['identity'])){
			unset($_SESSION['identity']);
		}
		
		if(isset($_SESSION['admin'])){
			unset($_SESSION['admin']);
		}
		session_destroy(); // Modificado Alberto (hace que cuando desconecta la sesion se borre el carrito) 
		header("Location:".base_url);
	}
	
} // fin clase
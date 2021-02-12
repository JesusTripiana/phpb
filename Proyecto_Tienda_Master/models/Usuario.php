<?php

class Usuario{
	private $id;
	private $nombre;
	private $apellidos;
	private $email;
	private $password;
	private $rol;
	private $imagen;
	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getApellidos() {
		return $this->apellidos;
	}

	function getEmail() {
		return $this->email;
	}

	function getPassword() {
		return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
	}

	function getRol() {
		return $this->rol;
	}

	function getImagen() {
		return $this->imagen;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function setApellidos($apellidos) {
		$this->apellidos = $this->db->real_escape_string($apellidos);
	}

	function setEmail($email) {
		$this->email = $this->db->real_escape_string($email);
	}

	function setPassword($password) {
		$this->password = $password;
	}

	function setRol($rol) {
		$this->rol = $rol;
	}

	function setImagen($imagen) {
		$this->imagen = $imagen;
	}

	public function getAll(){
		$usuarios = $this->db->query("SELECT * FROM usuarios ORDER BY id DESC");
	 return $usuarios;
 	}

	 // funcion NUEVA para tener los datos de la vista INDEX de USUARIOS
	 public function getAllWithTotal(){

		 $usuarios = $this->db->query("SELECT p.usuario_id AS id, usu.nombre, usu.apellidos, usu.email, usu.rol, SUM(p.coste) as totalPedidos 
		 							   FROM usuarios usu, pedidos p WHERE usu.id = p.usuario_id GROUP BY 1 
									   UNION 
									   SELECT id, nombre, apellidos, email, rol, 0 AS totalPedidos 
									   FROM usuarios WHERE id NOT IN(SELECT usuario_id FROM pedidos);");
	  
	  return $usuarios;
	 }

	public function save(){
		$sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', null);";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	public function login(){
		$result = false;
		$email = $this->email;
		$password = $this->password;
		
		// Comprobar si existe el usuario
		$sql = "SELECT * FROM usuarios WHERE email = '$email'";
		$login = $this->db->query($sql);
		
		
		if($login && $login->num_rows == 1){
			$usuario = $login->fetch_object();
			
			// Verificar la contraseña
			$verify = password_verify($password, $usuario->password);
			
			if($verify){
				$result = $usuario;
			}
		}
		
		return $result;
	}

	public function getOne(){ // codigo nuevo
		$usuario = $this->db->query("SELECT * FROM usuarios WHERE id = {$this->getId()}");
		return $usuario->fetch_object();
	}
	
	public function delete(){ // codigo nuevo
		
		$sql = "DELETE FROM usuarios WHERE id={$this->getId()}";
		$delete = $this->db->query($sql);
		
		$result = false;
		if($delete){
			$result = true;
		}
	
	return $result;
}
	
}
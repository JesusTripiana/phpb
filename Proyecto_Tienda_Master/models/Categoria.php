<?php

class Categoria{
	private $id;
	private $nombre;
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

	function setId($id) {
		$this->id = $id;
	}

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	public function getAll(){
		   $categoria = $this->db->query("SELECT * FROM categorias ORDER BY id DESC");
		return $categoria;
	}
	
	
	public function getAllValoresAlmacen(){ // Funcion NUEVA

		 $categoria = $this->db->query("SELECT c.id AS id, c.nombre AS nombre, SUM(p.stock*p.precio) AS total, SUM(p.stock) AS cantidad,
		COUNT(p.id) AS numProductos FROM categorias c, productos p WHERE c.id LIKE p.categoria_id GROUP BY 1 
		UNION 
		SELECT id, nombre, 0 AS total, 0 AS cantidad, 0 AS numProductos FROM categorias
		WHERE id NOT IN (SELECT categoria_id FROM productos);"); 

		return $categoria;
	}

	public function getOne(){
		$categoria = $this->db->query("SELECT * FROM categorias WHERE id={$this->getId()}");
		return $categoria->fetch_object();
	}

	public function edit(){
		$sql = "UPDATE categorias SET nombre = '{$this->getNombre()}' WHERE id = {$this->getId()};"; // modificado id por getId

		$save = $this->db->query($sql);

		$result = false;
		if ($save){
			$result = true;
		}
		return $result;
	}
	
	public function save(){
		$sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}');";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	public function delete(){ // creado por Jesus
		
			$sql = "DELETE FROM categorias WHERE id={$this->getId()}";
			$delete = $this->db->query($sql);
			
			$result = false;
			if($delete){
				$result = true;
			}
		
		return $result;
	}

}
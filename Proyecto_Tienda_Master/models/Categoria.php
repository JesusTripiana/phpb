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
	
	public function getModelos(){ // Creado por Jesus
		$categoria = $this->db->query("SELECT categoria_id, COUNT(nombre) AS modelos FROM productos GROUP BY categoria_id ORDER BY categoria_id DESC ;");
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
		
			$sql = "DELETE FROM categoria WHERE id={$this->id}";
			$delete = $this->db->query($sql);
			
			$result = false;
			if($delete){
				$result = true;
			}
		
		return $result;
	}

}
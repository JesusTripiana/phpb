<?php

class Utils{
	
	public static function deleteSession($name){
		if(isset($_SESSION[$name])){
			$_SESSION[$name] = null;
			unset($_SESSION[$name]);
		}
		
		return $name;
	}
	
	public static function isAdmin(){
		if(!isset($_SESSION['admin'])){
			header("Location:".base_url);
		}else{
			return true;
		}
	}
	
	public static function isIdentity(){
		if(!isset($_SESSION['identity'])){
			header("Location:".base_url);
		}else{
			return true;
		}
	}
	
	public static function showCategorias(){
		require_once 'models/Categoria.php';
		$categoria = new Categoria();
		$categorias = $categoria->getAll();
		return $categorias;
	}
	
	public static function statsCarrito(){
		$stats = array(
			'count' => 0,
			'total' => 0
		);
		
		if(isset($_SESSION['carrito'])){
			$stats['count'] = count($_SESSION['carrito']);
            foreach ($_SESSION['carrito'] as $producto) {
				// $producto['producto'] es un objeto tipo PRODUCTO, el cual recorro para comprobar
				// si la KEY es == oferta y si esta en oferta aplico el descuento (comprobar con var_dum $producto)
                foreach ($producto['producto'] as $key=>$value) {
					if ($key == 'oferta' && $value == 'si') {
						$stats['total'] += ($producto['precio']*DESCUENTO)*$producto['unidades'];
						//var_dump($stats['total']);
						break;
						
					} elseif($key == 'oferta' && $value == 'no'){
						$stats['total'] += $producto['precio']*$producto['unidades'];
						break;
					}
					
                }
              
			}
		}
		
		return $stats;
	}
	
	public static function showStatus($status){
		$value = 'Pendiente';
		
		if($status == 'confirm'){
			$value = 'Pendiente';
		}elseif($status == 'preparation'){
			$value = 'En preparación';
		}elseif($status == 'ready'){
			$value = 'Preparado para enviar';
		}elseif($status = 'sended'){
			$value = 'Enviado';
		}
		
		return $value;
	}

	public static function comprobarFecha($fecha1,$fecha2){
		$dato = false;
		$date1=date_create($fecha1);
		$date2=date_create($fecha2);
		$diff=date_diff($date1,$date2);
		$dias = $diff->format("%R%a days");
	
		if ($dias>=0){
			$dato = true;
		} 
		return $dato;
    }

	public static function eliminarSesionesRegistro(){
			Utils::deleteSession('nombre'); 
			Utils::deleteSession('apellidos');
			Utils::deleteSession('email');
	}
	
}


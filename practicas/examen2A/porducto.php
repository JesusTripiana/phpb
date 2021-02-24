
<?php
// creacion sencilla de una clase PRODUCTO con metodos magicos.

class Producto{

    private $producto_no;
    private $descripcion;
    private $precio_actual;
    private $stock_disponible;

    // Metodos magicos para getter y setter

    public function __set($nombre,$valor){
        $class = get_class($this);
        $nombre = strtolower($nombre); // se ponen los nombres en mayusculas ya que en la base de datos estan asi y estan en minusculas no funcionan las consultas
        if(property_exists($class,$nombre)){
            $this->$nombre = $valor; // le asignas al campo de igual nombre en la BD el valor pasado por parametro.
        }
    }

    public function __get($nombre){
        $class = get_class($this);
        $nombre = strtolower($nombre);
        if (property_exists($class,$nombre)){
            return $this->$nombre;
        }

    }

}

?>
<?php 
class cliente {
    
    private $numped;
    private $cod_cliente;
    private $producto;
    private $precio;
    
    // Getter con método mágico
    public function __get($atributo){
        if(property_exists($this, $atributo)) {
            return $this->$atributo;
        }
    }
    // Setter con método mágico 
    public function __set($atributo,$valor){
        if(property_exists($this, $atributo)) {
            $this->$atributo = $valor;
        }
    }
}
?>
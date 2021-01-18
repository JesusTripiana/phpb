<?php 
// Este archivo maneja la parte relativa a la base de datos.
include_once "cliente.php";
include_once "pedido.php";


class accesoDatos {
    
    private static $modelo = null;
    private $dbh = null;
    private $stmt = null;
    
    //SELECT * FROM `clientes` WHERE nombre LIKE 'jesus' AND clave LIKE 'jesus' | esta consulta devulve la tabla completa de un cliente
    private static $select_Cliente = "SELECT * FROM `clientes` WHERE nombre LIKE ? AND clave LIKE ?";
    
    // consulta que obtiene el listado de los productos y precio del cliente solicitado.
    private static $select_Listado_Pedidos = "SELECT producto,precio FROM `pedidos` WHERE cod_cliente LIKE ?";
    
    // consulta que obtiene el total de los pedidos de un cliente concreto.
    // private static $select_Suma_Precio = "SELECT SUM(precio) FROM `pedidos` WHERE cod_cliente LIKE ?";
    
    private static $select_Veces = "SELECT veces FROM clientes WHERE nombre LIKE ?";
    // Consulta que actualiza la columna veces del cliente logueado
    private static $update_Actualiza_Veces = "UPDATE clientes SET veces = veces+1 WHERE nombre LIKE ?;";
    
    
    
    
    public static function initModelo(){
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }
    
    private function __construct(){
        
        try {
            $dsn = "mysql:host=localhost;dbname=etienda;charset=utf8";
            $this->dbh = new PDO($dsn, "root", "root");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Error de conexión ".$e->getMessage();
            exit();
        }
    }
    
    public function obtenerCliente ($nombre,$clave):array{
        $tCliente =[];
        $stmt = $this->dbh->prepare(self::$select_Cliente);
        $stmt->bindValue(1,$nombre);
        $stmt->bindValue(2,$clave);
        // Devuelvo una tabla asociativa
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if($stmt->execute()){
            //Inserto en el array 
            while ($fila = $stmt->fetch()){
                $tCliente[] = $fila;
            }
        }
        return $tCliente;
    }
    
    public function obtenerPedidos ($cod_cliente):array{
        $tPedidos =[];
        $stmt = $this->dbh->prepare(self::$select_Listado_Pedidos);
        $stmt->bindValue(1,$cod_cliente);
        // Devuelvo una tabla asociativa
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if($stmt->execute()){
            //Inserto en el array
            while ($fila = $stmt->fetch()){
                $tPedidos[] = $fila;
            }
        }
        return $tPedidos;
    }
    
    public function obtenerVeces ($nombre):array{
        $tVeces =[];
        $stmt = $this->dbh->prepare(self::$select_Veces);
        $stmt->bindValue(1,$nombre);
        // Devuelvo una tabla asociativa
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if($stmt->execute()){
            //Inserto en el array
            while ($fila = $stmt->fetch()){
                $tVeces[] = $fila;
            }
        }
        return $tVeces;
    }
    
    public  function actualizarVeces($nombre){
        $mensaje = "";
        $stmt = $this->dbh->prepare(self::$update_Actualiza_Veces);
        $stmt = bindValue(1,$nombre);
        $stmt->execute();
        if($stmt->rowCount()==1){
            $mensaje = "Veces aumentada en 1.";
        }else{
            $mensaje = "Error al actualizar";
        }
        return $mensaje;
    }
    
    // Evito que se pueda clonar el objeto.
    public function __clone()
    {
        trigger_error('La clonación no permitida', E_USER_ERROR);
    }
    
}
?>
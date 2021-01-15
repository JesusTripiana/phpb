<?php 
// Este archivo maneja la parte relativa a la base de datos.
include_once "cliente.php";
include_once "pedido.php";


class AccesoDatos {
    
    private static $modelo = null;
    private $dbh = null;
    private $stmt = null;
    
    //SELECT * FROM `clientes` WHERE nombre LIKE 'jesus' AND clave LIKE 'jesus' | esta consulta devulve la tabla completa de un cliente
    private static $select0 = "SELECT * FROM `clientes` WHERE nombre LIKE ? AND clave LIKE ?";
    
    // consulta que obtiene el listado de los productos y precio del cliente solicitado.
    private static $select1 = "SELECT producto,precio FROM `pedidos` WHERE cod_cliente LIKE ?";
    
    // consulta que obtiene el total de los pedidos de un cliente concreto.
    private static $select2 = "SELECT SUM(precio) FROM `pedidos` WHERE cod_cliente LIKE ?";
    
    
    
    
    public static function initModelo(){
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }
    
    private function __construct(){
        
        try {
            $dsn = "mysql:host=localhost;dbname=etienda;charset=utf8";
            $this->dbh = new PDO($dsn, "root", "test");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Error de conexión ".$e->getMessage();
            exit();
        }
    }
    
    
    public function logearse (){
        $stmt = $this->dbh->prepare(self::$select0);
        $stmt->bindValue(1,$_POST['login']);
        $stmt->bindValue(2,$_POST['passwd']);
        // Devuelvo una tabla asociativa
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if ( $stmt->execute() ){
            if ( $fila = $stmt->fetch()) {
                echo " $fila[Nombre]: Bienvenido al sistema <br>";
                $fila['veces']++;
                $consulta = "UPDATE cliente SET veces = $fila[veces] where clave ='$_POST[psswd]'";
                if ($dbh->exec($consulta) == 0){
                    echo " ERROR UPDATE en la BD ".print_r($dbh->errorInfo())."<br>";
                }
                echo " Has entrado $fila[veces] veces <br>";
                
            } else {
                echo "El identificador y/o la contraseña no son correctos.<br>";
                
            }
        } else {
            echo " ERROR de consulta a la BD ".print_r($dbh->errorInfo())."<br>";
        }
    }
    
    
}
?>
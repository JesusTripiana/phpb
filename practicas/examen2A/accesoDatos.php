<?php

include_once 'porducto.php';

/*
Acceso a Datos con BD y patron SINGLETON
*/

class AccesoDatos{

    private static $modelo = null; // variable de creacion BD
    private $dbh = null; // variable de conexion BD
    private $stmt = null; // variable para consultas BD

    public static function initModelo(){
        if (self::$modelo == null){
            self::$modelo = new AccesoDatos(); // instancias la clase
        }
        return self::$modelo;
    }

    // Creacion de la conexion a la BD mediante PDO
    private function __construct(){

        try {
            $dsn = "mysql:host=localhost;dbname=Empresa;charset=utf8";
            $this->dbh = new PDO($dsn,"root","root");
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexion ". $e->getMessage();
            exit();
        }
    }

    // Realizo las funciones para las consultas a la BD

    public function obtenerListaProductos():array{
        $tobjproductos=[]; // creo un array vacio
        $stmt = $this->dbh->prepare("SELECT * FROM PRODUCTOS WHERE PRODUCTO_NO NOT IN (SELECT PRODUCTO_NO FROM PEDIDOS);"); // todos los productos que el ID_PRODUCTO no este en pedidos.
        $stmt->setFetchMode(PDO::FETCH_CLASS,'Producto');
        if ($stmt->execute()){
            while($obj = $stmt->fetch()){
                $tobjproductos[]=$obj;
            }
        }
        return $tobjproductos;

    }

    public function actualizarPrecios($lista):int{
        $cont=0; // contador de filas afectadas
        $stmt = $this->dbh->prepare("UPDATE PRODUCTOS SET PRECIO_ACTUAL=PRECIO_ACTUAL*0.90 WHERE PRODUCTO_NO = ?");

        // Devuelvo una tabla de objetos
        foreach ($lista as $producto_no) {
            $stmt->bindValue(1,$producto_no);
            if($stmt->execute()){ // no se guarda el resuntado en ninguna variable puesto que se esta actualizando la BD
                $cont++; // solo cuento las filas afectadas
            }
        }
        return $cont;
    }

    // fucion que evita que se pueda clonar el objeto
    public function __clone(){
        trigger_error('Clonacion no permitida',E_USER_ERROR);
    }

}

?>
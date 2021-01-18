
<?php 
//consulta el modelo y envia la informacion a la vista
include_once 'accesoDatos.php';

if (isset($_POST['nombre']) && ($_POST['passwd'])){
    $conexdb = accesoDatos::initModelo();
    $nombre = $_POST['nombre'];
    $clave = $_POST['passwd'];
    $cliente = $conexdb->obtenerCliente($nombre,$clave);
    if (count($cliente) == 0){
        $nombre = '';
        $clave = '';
        echo "Usuario o contraseña incorrecto, vuelva a introducir";
        header("Refresh:3; url=./acceso.html");
    }else{
        $pedidos = $conexdb->obtenerPedidos($cliente[0]['cod_cliente']);
        $mensaje = 'Bienvenido usuario: '.$cliente[0]['nombre'].'<br/>Has entrado '.$cliente[0]['veces'].' veces en nuestra web';
        //$mensaje1 = actualizarVeces($cliente[0]['nombre']);
        include_once 'vistapedidos.php';
    }
    
}else{
    echo "Intoduzca usuario o contraseña.";
    header("Refresh:3; url=./acceso.html");
}


?>
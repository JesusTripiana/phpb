<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicar descuento</title>
</head>
<body>
<h1>BAJAR PRECIOS</h1>

<?php 

 include_once 'porducto.php';
 include_once 'accesoDatos.php';

 $ac = AccesoDatos::initModelo(); //conexion a la BD

 if (isset($_POST['orden']) && isset($_POST['tproductos'])){

     $fechaactual = date("d-m-Y"); // obtener fecha actual en DIAS-MESES-ANOS
     if(isset($_COOKIE['fecha'])){
         $fechaCookie = $_COOKIE['fecha'];
         if ($fechaactual == $fechaCookie) { // si la COOKIE tiene la misma fecha 
             echo "Esta operacion solo se puede realizar una vez al dia </body></html>";
             exit;
         }
     }
     setcookie("fecha",$fechaactual,time()+3600*24); // creacion del COOKIE que se elimina a las 24 horas

     $tProductoNoActualizar = $_POST['tproductos'];
     $ac->actualizarPrecios($tProductoNoActualizar);
 }


//obtengo la lista de productos antes de imprimirla en la tabla
$tproductos = $ac->obtenerListaProductos(); 
 
 ?>

    <form name='entrada' method="post">
        <table border=1>
        <tr>
        <th></th>
        <th>no</th>
        <th>Descripcion del Producto</th>
        <th>Stock</th>
        <th>Precio</th>
        </tr>
        <?php foreach ($tproductos as $pro):?> <!-- foreach para mostrar las columnas con cada valor -->
        <tr>
        <td> <input type="checkbox" name="tproductos[]" value="<?= $pro->producto_no ?>"> </td> <!-- Le asigno el PRODUCTO_NO al value para despues saber por que producto consultar a la BD -->
        <td> <?= $pro->producto_no ?> </td>
        <td> <?= $pro->descripcion ?> </td>
        <td> <?= $pro->stock_disponible ?></td>
        <td> <?= $pro->precio_actual ?></td>
        </tr>
        <?php endforeach; ?>
        </table>

        <input type="submit" name='orden' value="ACTUALIZAR">
    
    </form>
    
</body>
</html>
<html>
<head>
<title></title>
</head>
<body>
<?php 
$dServidor='Desarrollo en entorno servidor';
$dCliente = 'Desarrollo en entorno cliente';
$ingles = 'Ingles GS';
$empres = 'Empresas e iniciativa emprendedora';
$dInterfaces = 'Diseño de interfaces Web';

$tabla = <<<instruc
    
    <th><h3 style='color:red'> Horario</h3></th>
    <table border='1'>
        <tr>
            <td> /-\</td>
            <td>Lunes</td>
            <td>Martes</td>
        </tr>
        <tr>
            <td>8:30 9:20</td>
            <td>$dCliente</td>
            <td>$dServidor</td>
        </tr>
        <tr>
            <td>9:25 10:15</td>
            <td>dCliente</td>
            <td>$empres</td>
        </tr>
        <tr>
            <td>10:20 11:10</td>
            <td>$ingles</td>
            <td>$empres</td>
        </tr>
    </table>
instruc;

echo $tabla;
?>
</body>
</html>

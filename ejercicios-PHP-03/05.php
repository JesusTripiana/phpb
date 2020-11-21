<?php 
    function generarNumero(array $numeros):int {
        $repetido = true;
        $num = 0;
        while ($repetido){
            $num=random_int(1,49);
            $repetido = in_array($num, $numeros); // funcion que indica si existe 1 valor dado dentro de un array
        }
       return $num;
    }
    
//     function comprobarRepetido(int $num, array $valores):bool {
        
// //          FORMA MANUAL DE COMPROBAR
// //         $esta=false;
// //         foreach ($valores as $valor){
// //             if($valor == $num){
// //                 $esta=true;
// //             }
// //         }
// //         return $esta;
//            }

    
define ('PARTIDA',6);
$bonoloto =[];
for ($i=0;$i<PARTIDA;$i++){
    $bonoloto [] = generarNumero($bonoloto);
}
$complementario = $bonoloto[count($bonoloto)-1];
asort($bonoloto);
?>

<html>
  <head>
    <meta charset="UTF-8">
    <style type="text/css">
        table, td{
          border: 2px solid black;
          border-collapse:collapse;
          margin:3px;
        }
        td{
            padding:5px;
            color:blue;
        }
    </style>
  </head>
  <body>
    <h1>Ejercicio 5</h1>
	<hr>
	<b>Juego de la BONOLOTO</b>
	<table>
		<tr>
		<?php foreach ($bonoloto as $clave => $valor){
		    if ((count($bonoloto)-1)!=$clave){
		        echo '<td>'.$valor.'</td>';
		    }
		}?> 	
		<td><?= 'Complementario '.$complementario?></td>
		</tr>
	</table>
  </body>
</html>
<?php 
    function realizarTirada() {
        $tirada=random_int(1, 6);
        return $tirada;
    }
    
    function completarPartida(&$jugador){
       
        for ($i=0;$i<5;$i++){
            $jugador[$i]=realizarTirada();
        }
    }
    
    function valorDibujo($valor){
        $cadena = 'Error';
        switch ($valor){
            case 1: $cadena = UNO;break;
            case 2: $cadena = DOS;break;
            case 3: $cadena = TRES;break;
            case 4: $cadena = CUATRO;break;
            case 5: $cadena = CINCO;break;
            case 6: $cadena = SEIS;break;
        }
        return $cadena;
    }
    
    function calcularResultado($partida) {
        sort($partida);
        $suma=0;
        for ($i=1;$i<sizeof($partida)-1;$i++){
            $suma+=$partida[$i];
        }
        return $suma;
    }
    
    function calculoGanador($jugador1,$jugador2) {
        $ganador= -1;
        if ($jugador1[sizeof($jugador1)-1] > $jugador2[sizeof($jugador2)-1]){
            $ganador=1;
        }elseif ($jugador1[sizeof($jugador1)-1] < $jugador2[sizeof($jugador2)-1]){
            $ganador=2;
        }else{
                $ganador=0;
            }
            return $ganador;
    }
    
    

?>
<html>
  <head>
    <meta charset="UTF-8">
    <style type="text/css">
    
    .tamano{
        font-size:160px;
        border:15px solid;
    }
    
    </style>
  </head>
  <body>
  	<h1>CINCO DADOS</h1>
  	<p>Actualice la página para mostrar otra partida.</p>

<?php
define('UNO','&#x2680');
define('DOS','&#x2681');
define('TRES','&#x2682');
define('CUATRO','&#x2683');
define('CINCO','&#x2684');
define('SEIS','&#x2685');

$jugador1=[];
$jugador2=[];

completarPartida($jugador1);
completarPartida($jugador2);
?>
<p>
<table>
    	<tr>
    		<td><b>Jugador 1</b></td>
    		<?php foreach ($jugador1 as $contenido){
    		      echo '<td class="tamano" style="border-color:red">'.valorDibujo($contenido).'</td>';    
    		}
    		
    		$jugador1[]=calcularResultado($jugador1);
    		
    		echo '<td><b>'.$jugador1[sizeof($jugador1)-1].'puntos</b></td>';
    		?>	
    	</tr>
    	<tr>
    		<td><b>Jugador 2</b></td>
    		<?php foreach ($jugador2 as $contenido){
    		      echo '<td class="tamano" style="border-color:blue">'.valorDibujo($contenido).'</td>';    
    		}
    		
    		$jugador2[]=calcularResultado($jugador2);
    		
    		echo '<td><b>'.$jugador2[sizeof($jugador2)-1].'puntos</b></td>';
    		?>	
    	</tr>
    	
</table>
<?php

$ganador=calculoGanador($jugador1, $jugador2);
$msg="<b>Resultado: </b>";
switch ($ganador){
    case 0:  $msgGanador = " ¡¡Empate!!";break;
    case 1:  $msgGanador = " Ha ganado el jugador 1.";break;
    case 2:  $msgGanador = " Ha ganado el jugador 2.";break;
}
echo $msg.$msgGanador;

?>

 </body>
</html>
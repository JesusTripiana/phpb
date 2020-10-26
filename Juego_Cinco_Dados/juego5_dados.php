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
    
    table, tr,td{
     padding: 0 auto;
     margin: 0 auto;
     height:10px;
     
    }
    body{
        text-align:center;
        font-size:16px;
    }
    
    .formato{
    font-size: 160px; 
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
    	<tr style=" text-align:center">
    		<td>Jugador 1</td>
    		<?php foreach ($jugador1 as $contenido){
    		      echo '<td class="formato" style="border-color:red">'.valorDibujo($contenido).'</td>';    
    		}
    		
    		$jugador1[]=calcularResultado($jugador1);
    		
    		echo '<td>'.$jugador1[sizeof($jugador1)-1].'puntos</td>';
    		?>	
    	</tr>
 </table>
 <table>
    	<tr>
    		<td>Jugador2</td>
    		<?php foreach ($jugador2 as $contenido){
    		      echo '<td style=" font-size: 160px; border:15px solid blue">'.valorDibujo($contenido).'</td>';    
    		}
    		
    		$jugador2[]=calcularResultado($jugador2);
    		
    		echo '<td>'.$jugador2[sizeof($jugador1)-1].'puntos</td>';
    		?>	
    	</tr>
    	
</table>
<?php

$ganador=calculoGanador($jugador1, $jugador2);
switch ($ganador){
    case 0: echo "¡¡Empate!!";break;
    case 1: echo "Ha ganado el jugador 1.";break;
    case 2: echo "Ha ganado el jugador 2.";break;
}

?>

 </body>
</html>
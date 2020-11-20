<?php 
    function generarValor() {
        return random_int(1,3);
    }
    
    function valorDibujo($valor){
        $cadena = 'Error';
        switch ($valor){
            case 1: $cadena = PIEDRA1;break;
            case 2: $cadena = PAPEL;break;
            case 3: $cadena = TIJERAS;break;
            case 4: $cadena = PIEDRA2;break;
        }
        return $cadena;
    }
    
    function calculoGanador($jugador1,$jugador2){
        $ganador = -1;
        if ($jugador1 == PIEDRA1 && $jugador2 == PIEDRA2){
            $ganador = 0;
        }elseif ($jugador1 == $jugador2){
            $ganador = 0;
        }
        
        switch ($jugador1){
            case PIEDRA1: if ($jugador2 == TIJERAS) $ganador = 1; break;
            case PAPEL: if ($jugador2 == PIEDRA2) $ganador = 1; break;
            case TIJERAS: if ($jugador2 == PAPEL) $ganador = 1; break;
        }
        
        if ($ganador != 1){
            if ($ganador != 0){
                $ganador = 2;
            } 
        }
        
        return $ganador;
    }

?>

<html>
  <head>
    <meta charset="UTF-8">
    <link href="estilos.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
  	<h1>¡Piedra, papel, tijera!</h1>
  	<p>Actualice la página para mostrar otra partida.</p>
  	<?php
    define ('PIEDRA1',  "&#x1F91C;");
    define ('PIEDRA2',  "&#x1F91B;");
    define ('TIJERAS',  "&#x1F596;");
    define ('PAPEL',    "&#x1F91A;");

    $jugador1 = generarValor();
    $jugador2 = generarValor();
    if ($jugador2 == 1){
        $jugador2 = 4;
    }
    
    $jugador1 = valorDibujo($jugador1);
    $jugador2 = valorDibujo($jugador2);
    ?>
    <table>
    	<tr>
    		<th>Jugador1</th>
    		<th>Jugador2</th>
    	</tr>
    	<tr>
    		<td><?php echo $jugador1;?></td>
    		<td><?php echo $jugador2;?></td>
    	</tr>
    
    </table>
    <?php 
    $ganador = calculoGanador($jugador1,$jugador2);
    switch ($ganador){
        case 0: echo '<b>¡¡Empate!!</b>';break;
        case 1: echo '<b>Ha ganado el jugador 1</b>';break;
        case 2: echo '<b>Ha ganado el jugador 2</b>';break;
    }
    
    ?>
  </body>
</html>
  
  
  
  
  
  
  
  
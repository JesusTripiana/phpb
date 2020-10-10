<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">   
  </head>
  <body>

	<?php
        $contnum=0;
        $cont6=0;
        $numAntes=0;
        $star = microtime(true);
        while(true){  
            $num = random_int(1,10);
            $contnum++;
            if ($num==6){
                if ($numAntes==6){
                    $cont6++;
                }else{
                    $cont6=1;
                }
            }else{
                $cont6=0;
            }
            if ($cont6==3){
                break;
            }
            $numAntes = $num;
         }
         
         $totalTiempo = microtime(true)-$star;
         echo "Han salido tres 6 seguidos tras generar ".$contnum.' numeros en </br>';
         echo "el total de segundos es ".($totalTiempo*1000)." milisegundos.";
         
       ?>

	</body>
</html>

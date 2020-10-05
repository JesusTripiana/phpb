<?php
    $contnum=0;
   while(true){
       $star = microtime(true);
       $num = random_int(1,10);
       $contnum++;
       if ($num==6){
           $cont++;
       }else{
           $cont=0;
       }
       if ($cont==3){
           break;
       }
       }
    echo "Han salido tres 6 seguidos tras generar ".$contnum.' numeros en ';
    printf('%.1f milisegundos',$star);
?>


<?php
function suma($num1,$num2,&$resu) {
   $resu = $num1+$num2;
}

function resta($num1,$num2,&$resu) {
    $resu = $num1-$num2;
}

function dividir($num1,$num2,&$resu) {
        $resu = $num1/$num2;
}

function multiplicar($num1,$num2,&$resu) {
    $resu = $num1*$num2;
}

function modulo($num1,$num2,&$resu) {
        $resu = $num1%$num2;
}

function potencia($num1,$num2,&$resu) {
    $num3=1;
    for ($i=1;$i<=$num2;$i++){
        $num3*=$num1;
    }
    $resu = $num3;
}

?>

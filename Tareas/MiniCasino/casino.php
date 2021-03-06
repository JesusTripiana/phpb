<html>
<head>
<meta charset="UTF-8">
<title>Casino</title>
</head>
<body>
<?php
session_start();
$cantidadVisitas = 1;
if ( isset( $_COOKIE['vecesVisitado'])){ // se comprueba siempre al principio
    $cantidadVisitas = $_COOKIE['vecesVisitado'];
}

if (! isset($_SESSION['saldo'])) { //Si la variable SALDO no existe y la variable IMPORTEINICIAL esta vacia
    if ( empty($_POST['importeInicial'])) { // primera visita
        ?>
        <h2> BIENVENIDO AL CASINO</h2> <br>
        Esta es su <?= $cantidadVisitas ?>º visita.<br>
        <form method="post">
		Introduzca el dinero con el que desea jugar:
		 <input name="importeInicial" type="number">
		</form>
		</body>
		</html>
        <?php
        exit(); // muestras formulario y finalizas SCRIPT 
    } else { // se ejecuta cuando IMPORTEINICIAL tiene algun valor
    $_SESSION['saldo'] = $_POST['importeInicial'];
    header("Refresh:0");
    }
}

if (isset($_POST["jugar"])) {
    $cantidad = $_POST["cantidad"];
    if ($cantidad > $_SESSION['saldo']) {
        echo "Error: no dispone de $cantidad euros suficientes en cuenta. <br> ";
    } else {
        $apuesta = $_POST['apuesta'];
        $numSecreto = random_int(1, 100);
        $resultado = esParImpar($numSecreto);
        echo " RESULTADO DE LA APUESTA : " . $resultado . "<br>";
        $resultadoJuego = calcularGanador($apuesta, $resultado); // comparo la opcion del usuario y la opcion aleatoria
        echo $resultadoJuego."<br>";
        if ($resultadoJuego == "Ganaste"){
            $_SESSION["saldo"] = $_SESSION["saldo"] + $cantidad;
        }else{
            $_SESSION["saldo"] = $_SESSION["saldo"] - $cantidad;
        }
    }  
} 

if (isset($_POST["terminar"]) || ($_SESSION["saldo"] == 0) ) {
    echo "Muchas gracias por jugar con nosotros. <br> ";
    echo "Su resultado final es de ".$_SESSION['saldo']." Euros <br>";
    $cantidadVisitas++;
    setcookie("vecesVisitado",$cantidadVisitas, time()+ 30 * 24 * 3600); // Un mes
    session_destroy();
    exit();
}
    
function esParImpar($num):string{
    if($num%2 == 0){
        $msg = "Par";
    }else{
        $msg = "Impar";
    }
    return $msg;
}

function calcularGanador($decisionUsuario, $resultadoBanca):string{
    $resultadoFinal = ($decisionUsuario == $resultadoBanca)? "Ganaste" : "Perdiste";
        
    return $resultadoFinal;
    
}
?>

Dispone de  <?= $_SESSION["saldo"] ?> para jugar
<form method="POST">
Cantidad a apostar:<input name="cantidad" type="number"> <br>
Tipo de apuesta: 
<input  type="radio"   name="apuesta" value="Par" checked='checked'> Par
<input  type="radio"   name="apuesta" value="Impar"> Impar <br><br>
<button name="jugar" value="jugar" > Apostar cantidad </button>
<button name="terminar"   value="terminar"   > Abandonar el Casino </button>
</form>

</body>
</html>

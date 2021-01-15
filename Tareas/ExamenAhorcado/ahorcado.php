<html>
<head>
<meta charset="UTF-8">
<title>Palabra Oculta</title>
</head>
<body>
<form>
 Introduzca una letra <input type="text" size="1"  maxlength="1" name="letra" autofocus>
</form>

<?php

define('MAXFALLOS', 6);

include_once 'funciones.php';
session_start();

$ganadas = 0;
// Si existe el COOKIE obtengo las partidas ganadas
if ( isset($_COOKIE['ganadas'])){
    $ganadas = $_COOKIE['ganadas'];
}

// INICIO NO HAY PALABRA ELEGIDA (NUEVA PARTIDA)
if (! isset($_SESSION['palabrasecreta'])) {
    $_SESSION['palabrasecreta'] = elegirPalabra();
    $_SESSION['letrasusuario'] = "";
    $_SESSION['fallos'] = 0;
    echo " NUEVA PARTIDA <br>";
    
    if ( $ganadas > 0 ){ // imprime si se ha ganado alguna partida
        echo " Has ganado $ganadas partidas.<br>";
    }
}


if (isset($_REQUEST['letra'])) { // si el usuario a introducido alguna letra
    $letra =  $_REQUEST['letra']; // asigno el valor 
    if (comprobarLetra($letra, $_SESSION['palabrasecreta']) == false) { // si falla
        $_SESSION['fallos'] ++; // incremento los fallos
        if ($_SESSION['fallos'] >= MAXFALLOS) { // compruebo si es igual o mayor al tope
            echo " Superado el máximo número de fallos. Has perdido <br> ";
            session_destroy();
            echo "<a href=\"" . $_SERVER['PHP_SELF'] . "\"> Otra partida </a> </body></html>"; // se crea un enlace a la pagina inicial
            exit(); // finaliza el SCRIPT
        }
    } else { // si acierta 
        // Anoto la letra 
        $_SESSION['letrasusuario'] .= $letra; // se indica .= por ser un STRING (FORMA DE PHP DE CONCATENAR STRING)
    }
}


$palabramostrar = generaPalabraconHuecos($_SESSION['letrasusuario'], $_SESSION['palabrasecreta']); // asigno el resultado de la funcion
echo " PALABRA :  $palabramostrar </br> "; //muestro el resultado
if ($palabramostrar == $_SESSION['palabrasecreta']) {
    $ganadas++;
    echo " Enhorabuena has ganado. Ya son $ganadas partidas ganadas.<br>";
    // Actualizo el cookie
    setcookie("ganadas",$ganadas, time()+ 2 * 7 * 24 * 3600); // vence en 2 semanas
    session_destroy();
    echo "<a href=\"" . $_SERVER['PHP_SELF'] . "\"> Otra partida </a> </body></html>"; // se crea un enlace a la pagina inicial
    exit();
} else  {
    echo " Has cometido " . $_SESSION['fallos'] . " fallos <br>"; // muestro la cantidad de fallos cometidos
}

?>
</body>
</html>





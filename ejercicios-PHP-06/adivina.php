<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="estilos.css" rel="stylesheet" type="text/css" />
</head>
<body class="align">
		<div class="grid">
			<div id="login">
<?php 
define ('INTENTOSMAX',5);
session_start();

if (!isset($_SESSION['numAleatorio'])){ // si no existe la variable sesion 
    $_SESSION['numAleatorio']=random_int(1,20); // la creas
    $_SESSION['intentos']=0; // creas la cantidad de intentos
    
}else{
    if (isset($_REQUEST['numUser'])){
        $numUsuario = $_REQUEST['numUser']; // guardas el contenido de sesion en una variable para trabajar con ella
        $numOculto = $_SESSION['numAleatorio']; // misma accion que lo anterior
        $_SESSION['intentos']++; // incrementas los intentos de la variable de sesion
        $msgIntentos= 'Nº de intentos: '.$_SESSION['intentos'].'<br>';
        if ($numOculto == $numUsuario){
            echo "Muy bien has acertado.<br>"; // si aciertas borras la sesion
            session_destroy();
            echo 'Se va a generar un nuevo número.';
            header("Refresh:3");
            exit();
        }else{
            if ($_SESSION['intentos'] >= INTENTOSMAX){
                echo "Has agotado tus oportunidades<br>";
                session_destroy();
                echo 'Se va a generar un nuevo número.';
                header("Refresh:3");
                exit();
            }else{
                if($numOculto > $numUsuario){
                    $msg = "Tu número es mas bajo.";
                }else{
                    $msg = "Tu número es más alto.";
                }
            }
        }
    }
}

?>
			<h2><span class="fontawesome-lock"></span>ADIVINA EL NÚMERO</h2>
     		<form method="get">
        	<fieldset>
        	<p><?= (isset($msgIntentos))?$msgIntentos:"";?></p>
        	<p><label for="numUser"> Inserte 1 número:</label></p>
        	<p><input type="number" name="numUser"/></p>
        	<p><?=(isset($msg))?$msg:""; ?></p>
        	</fieldset>
        	</form>
        	</div>
   		</div>
 </body>
</html>
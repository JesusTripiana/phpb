<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body class="align">
		<div class="grid">
			<div id="login">
			

	<?php 
        $datosAcceso = array('pepe'=>1234, 'manolo'=>'manolo', 'luis' => 4321);


        //----- Si método GET -> muestra formulario y sí es POST -> Valida y procesa el formulario

        if($_SERVER['REQUEST_METHOD'] == 'POST'){ // ........ Valida formulario
            $usuario = $_POST['usr'];
            $password = $_POST['pwd'];
            $usuaEncontrado = false;
            $paswEncontrado = false;
            foreach ($datosAcceso as $nombre =>$clave){
                if ($usuario == $nombre && $password == $clave){
                    $usuaEncontrado = true;
                    $paswEncontrado = true;
                }
             }
            if ($usuaEncontrado && $paswEncontrado){
                 echo '<h2><span class="fontawesome-lock"></span>Formulario Procesado</h2>';
                 echo "<fieldset><p> Bienvenido al sistema $usuario <p></fieldset>";
            }
            else{
                 $error = "Usuario o password incorrectos. Vuelva a introducirlos.";
            }
        }

        if ($_SERVER['REQUEST_METHOD']== 'GET' || isset($error)){ 
                include_once '01_1.php';
        }
         ?>
 			</div> <!-- end login -->

  		</div>
	</body>
</html>


<?php 
define('TIEMPOVENCIMIENTO',7*24*3600); //tiempo de validez indicado en ejercicio

$edad = '';
$sexo = '';
$deportes = [];

// si existe el campo ACCION se comprueba que accion se ha seleccionado 
if (isset($_GET['accion'])){
    switch ($_GET['accion']){
        case 'confirmar':
            if (isset($_GET['edad'])){
                $edad = $_GET['edad'];
                setcookie('edad',$edad,TIEMPOVENCIMIENTO);
            }
            if (isset($_GET['sexo'])){
                $sexo = $_GET['sexo'];
                setcookie('sexo',$sexo,TIEMPOVENCIMIENTO);
            }
            if (isset($_GET['deportes'])){
                $deportes = $_GET['deportes'];
                var_dump($deportes);
                
                setcookie('deportes',implode(",",$deportes),TIEMPOVENCIMIENTO); // genera un STRING de 1 array lo separa por ","
            }
            break;
            
        case 'eliminar' :
            // cambio las variables a vacias
            $edad="";
            $genero="";
            $deportes=[];
            // elimino las cookies poniendo el tiempo de expiracion en negativo
            setcookie('edad'    ,$edad,time() -100);
            setcookie('sexo'  ,$genero, time() -100);
            setcookie('deportes',implode(",",$deportes), time() -100);
            
    }
 }
// else{
//     if ( isset($_COOKIE['edad'])){
//         $edad = $_COOKIE['edad'];
//     }
//     if ( isset($_COOKIE['sexo'])){
//         $sexo=$_COOKIE['sexo'];
//     }
//     if ( isset($_COOKIE['deportes'])){
//         $deportes=explode(",",$_COOKIE['deportes']);// rellena la tabla deportes con el contenido del STRING que contiene la cookie
//     }
    
// }

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="estilos.css" rel="stylesheet" type="text/css" />
</head>
<body class="align">
		<div class="grid">
			<div id="login">
			<h2><span class="fontawesome-lock"></span>SUS DATOS ALMACENADOS</h2>
			
     		<form method="get">
        	<fieldset>
        	<p><label for="edad"> Indique su edad:</label></p>
        	<p><input type="number" name="edad" value="<?=isset($edad)?$edad:'' ?>"/></p>
        	<p><label for="sexo"> Mujer</label>
        	<input type="radio" name="sexo" value='M' <?=($sexo=='M')?"checked= \"checked\"":""; ?>/> <!-- Las barras \ hacen el tratan al cararter que le sigue como un caracter y no como un caracter especial -->
        	<label for="sexo"> Hombre</label>
        	<input type="radio" name="sexo" value='H' <?=($sexo=='H')?"checked= \"checked\"":""; ?>/></p>
        	<p><label>Deportes</label></p>
			<select name="deportes[]" multiple="multiple">
			<option value="Futbol"     <?= in_array("Futbol"     ,$deportes)?"selected=\"selected\"":"";   ?> >Fútbol</option>
			<option value="Tenis"      <?= in_array("Tenis"      ,$deportes)?"selected=\"selected\"":"";    ?> >Tenis</option>
			<option value="Ciclismo"   <?= in_array("Ciclismo"   ,$deportes)?"selected=\"selected\"":""; ?> >Ciclismo</option>
			<option value="Otros"      <?= in_array("Otros"      ,$deportes)?"selected=\"selected\"":"";    ?> >Otros</option>
			</select></p>	
        	<br>
        	<button name="accion" value="confirmar"> Almacenar valores </button>
   			<button name="accion" value="eliminar"> Eliminar valores </button>
        	</fieldset>
        	</form>
        	
        	</div>
   		</div>
 </body>
</html>
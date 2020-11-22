<?php 

if (($_SERVER['REQUEST_METHOD'] == "GET")){
    include_once '05.html';
}else{
    $nombre = "";
    $apellido = "";
    $edad = ""; 
    $sexo = "";
    $hobbies = [];
    $msg = "";

    if (isset($_POST['nombre'])){
        $nombre = limpiarEntrada($_POST['nombre']);
    }

    if (isset($_POST['apellido'])){
        $apellido = limpiarEntrada($_POST['apellido']);
    }
    
    if (isset($_POST['edad'])){
        $edad = $_POST['edad'];
    }
    
    if (isset($_POST['sexo'])){
        $sexo = $_POST['sexo'];
    }
    
    if (isset($_POST['hobbies'])){
        $hobbies = limpiarArrayEntrada($_POST['hobbies']);
    }
    
    $msg = ($sexo == 'H')? "Bienvenido": "Bienvenida";
    $msg .= añadirpre()." ".$nombre." ".$apellido;
    
    if (!isset($_POST['hobbies'])){
        $msg .= " no tiene aficiones de nuestra lista.";
    }else{
        if (count($hobbies)==1){
            $msg .= " su aficion es ".$hobbies[0].'.';
        }else{
            $msg .= " sus aficiones son ";
        }
        for($i = 0; $i < count($hobbies)-1;$i++){
            $msg .= $hobbies[$i].',';
        }
        $msg .= ' y '.$hobbies[$i].'.';
        
        }
        
        echo '<p>'.$msg.'</p>';
 }

function limpiarEntrada(string $entrada):string{
    $salida = trim($entrada); // Elimina espacios antes y después de los datos
    $salida = stripslashes($salida); // Elimina backslashes \
    $salida = htmlspecialchars($salida); // Traduce caracteres especiales en entidades HTML
    return $salida;
}

// Función para limpiar todos elementos de un array
function limpiarArrayEntrada(array &$entrada):array{
    $tsalida=[];
    foreach ($entrada as $key => $value ) {
        $tsalida[$key] = limpiarEntrada($value);
    }
    return $tsalida;
}

function añadirpre():string {
    $añadir ="";
    if ($_POST['edad'] == 5 ){
        $añadir = ($_POST['sexo'] == "H" )?" Don":" Doña";
    }
    return $añadir;
}
?>
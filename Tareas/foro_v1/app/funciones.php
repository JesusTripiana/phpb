<?php 
function usuarioOk($usuario,$contrasena):bool{
    $usuarioCorrecto = false;
    $contrasenaCorrecta = false;
    $todoOk = false;
    $longitud = strlen($usuario);
    
    if ($longitud >= 8){
        $usuarioCorrecto = true;
    }
    $contrasenaInvertida = strrev($usuario);
    if ($contrasena == $contrasenaInvertida){
        $contrasenaCorrecta= true;
    }
    if ($contrasenaCorrecta && $usuarioCorrecto){
        $todoOk = true;
    }
    
    return $todoOk;
}

function contarLetras($cadena):int{
    return strlen($cadena);
}

function contarPalabras($cadena):int{
    return str_word_count($cadena,0);
}

function letraMasRepetida($cadena):string{
   $letra = '';
    $letras = count_chars($cadena,1); // cuenta la letra mas repetida devolviendo la letra en ASCII como clave y las veces como valor
    asort($letras); // ordeno conservando las claves
    $letra = chr(array_key_last($letras)); // obtengo la ultima posicion del array que es la que tiene el valor mas alto, extraigo su valor y lo traduzco del codigo ASCII
    return $letra; 
}

function palabraMasRepetida($cadena):string{
    $palabra = '';
    $palabras = str_word_count($cadena,1); // devuelve array con las palabras encontradas
    $palabrasveces = array_count_values($palabras); // devuelve array con la palabra como key y las veces que aparece como valor
    asort($palabrasveces);  // ordeno conservando las claves
    $palabra = array_key_last($palabrasveces); // obtengo la ultima posicion del array que es el que tiene el valor mas alto.
    return $palabra;
}
?>
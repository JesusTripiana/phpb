<?php


/*
 *  Devuelve una palabra al azar del array de palabras
 */
function elegirPalabra(){
    static $tpalabras = ["Madrid","Sevilla","Murcia","Malaga","Mallorca","Menorca"];
   
   return $tpalabras[array_rand($tpalabras)];  // funcion que escoge un valor aleatorio de un array
}

/*
 * Devuelve true o false si la letra se encuentra en la cadena
 */
function comprobarLetra($letra,$cadena):bool{
    return !( strpos ( $cadena , $letra ) === false );  // si la condicion devuelve true (funcion(FALSE)===FALSE) se cambia el valor por no encontrar, de otra forma la letra esta encontrada.
}

/*
 * Devuelve una cadena donde aparecen las letras de la cadenapalabra en su posición si
 * cada letra se encuentra en la cadenaletras
 * 
 * Ej  generaPalabraconHuecos("aeiou"    ,"hola pepe") -->"-o-a--e-e"
 *     generaPalabraconHuecos("abcdefghi ","hola pepe") -->"h--a -e-e"
 * 
 */


function generaPalabraconHuecos ( $cadenaletras, $cadenapalabra):string {
    
    // Genero una cadena resultado inicialmente con todas las posiciones con -
    $resu = $cadenapalabra;
    for ($i = 0; $i<strlen($resu); $i++){
        $resu[$i] = '-';
    }
    // Rellenar la cadena resu
    
    for ($i = 0; $i<strlen($cadenapalabra); $i++){ // cuento hasta la longitud de la cadena
        
        if ( strpos ($cadenaletras,$cadenapalabra[$i]) !== false){ // si el valor devuelto de la funcion es diferente de FALSE (encuentra la letra)
            $resu[$i]= $cadenapalabra[$i]; // asigno el valor de la posicion $i al resultado en la misma posicion.
        }
    }
    return $resu;
}

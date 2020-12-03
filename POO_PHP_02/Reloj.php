<?php
namespace POO_PHP_02;

class Reloj
{
    private $segundos;
    private $formato24;
    
    public function __construct ( int $hora, int $minutos, int $segundos){
        
    }
    
    // Mostrar la hora: genera un String con el  formado de hora  22:30:23
    // o 10:30:23 pm si el atributos Formato24 es falso
    
    public function mostrar(){
        
        return "";
    }
    
    // Cambiar formato24, recibe un valor true si quiero formato de
    // 24 o falso si quiero de 12
    public function  cambiarFormato24( bool $formato24){
        
    }
    
    // Incrementa en un segundo el valor de reloj
    public function tictac (){
        
    }
    
    // Comparar Hora, recibe como parámetro otro objeto Reloj
    // y me devuelve el número de segundos que tienen de diferencia
    
    public function comparar ( Reloj $otroreloj){
        
        return 0;
    }
}


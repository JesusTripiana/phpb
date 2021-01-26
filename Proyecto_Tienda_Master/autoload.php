<?php

function controllers_autoload($classname){
	$classname =  ucwords($classname);  // CAMBIADO POR Alberto para GNU/Linux 
	include 'controllers/' . $classname . '.php';
}

spl_autoload_register('controllers_autoload');
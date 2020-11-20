<?php 
    define('DIRECTORIO', '/home/tripiana/Escritorio/imgusers');
    define('TAMANOMAXIMO'    ,300000);
    define('TAMANOMAXFICHERO',200000);
    
    $codigosErrorSubida = [
        0 =>  'Subida correcta',
        1 =>  'El tamaño del archivo excede el admitido por el servidor',
        2 =>  'El tamaño del archivo excede el admitido por el cliente',
        3 =>  'El archivo no se pudo subir completamente',
        4 =>  'No se seleccionó ningún archivo para ser subido',
        6 =>  'No existe un directorio temporal donde subir el archivo',
        7 =>  'No se pudo guardar el archivo en disco',
        8 =>  'Una extensión PHP evito la subida del archivo',
        9 =>  'El formato no esta permitido',
        10 => 'El tamaño del archivo supera el tamaño máximo permitido',
        11 => 'La cantidad de archivos supera el máximo permitido '.(TAMANOMAXIMO/1000).'KB'
    ]
?>
    
 <html>
 	<head>
 	<meta charset="UTF-8">
 	<title>Guardado de Imagenes</title>
 	</head>
 	<body>
 		<?php 
 		if($_SERVER['REQUEST_METHOD'] == "GET"){?>
 			<form  enctype="multipart/form-data" method="post">
                 <input type="hidden" name="MAX_FILE_SIZE" value="200000" /> <!--  200Kbytes -->
    			<label for="imagen1"> Imagen 1 a subir:</label> <input name="imagen1" type="file" /> <br />
    			<label for="imagen2">Imagen 2 a subir:</label> <input name="imagen2" type="file" /> <br />
    			<label for="imagen3">Imagen 2 a subir:</label> <input name="imagen3" type="file" /> <br />
    			<input type="submit" value="Subir archivo" />
    		</form>  
 		<?php 
//  		Si el formulario entra por GET muestro el formulario, sino (POST) lo proceso 
 		}else{
 		    if (contarFicherosSubidos() == 0){
 		        echo ("ERROR: No se ha indicado ningun ningún fichero a subir ");
 		        header("Refresh:3");
 		        exit();
 		    }
 		    
 		    $tablaArchivos=[];
 		    foreach ($_FILES as $archivo => $propiedad){
 		        if (isset($archivo) && $propiedad['name'] != ""){
 		            $resu = comprobarImagen($propiedad);
 		            if ($resu == 0){
 		                $tablaArchivos[$propiedad['name']] = [$propiedad['size'], $propiedad['tmp_name']];
 		            }else{
 		                $msg = "ERROR al subir el archivo <b>". $propiedad['name']."</b><br>";
 		                $msg .= $codigosErrorSubida[$resu]."<br>";
 		                echo $msg;
 		                header("Refresh:3");
 		            }
 		        }
 		    }
 		    
 		    $tamanoTotal = calcularTamanoTotal($tablaArchivos);
 		    if ($tamanoTotal > TAMANOMAXIMO){
 		        echo $codigosErrorSubida[11];
 		        header("Refresh:3");
 		        exit();
 		    }
 		    
 		    foreach ($tablaArchivos as $nombre => $valor){
 		        if (moverADestino($nombre,$valor[1])){
 		            echo " Se ha copiado el archivo <b> " . $nombre . '</b><br />';
 		        } else{
 		            echo " No se puede guardar el archivo <b> ".$nombre."</b><br>";
 		        }
 		    }
 		}
 		
 		function contarFicherosSubidos():int {
 		    $contadorficheros =0;
 		    foreach ($_FILES as $propiedades) {
 		        if ( $propiedades['name'] != "") 
 		            $contadorficheros++;
 		    }
 		    return $contadorficheros;
 		}
 		
 		function comprobarImagen($imagenPropiedades):int {
 		    $error = $imagenPropiedades['error'];
 		    
 		    if($error == 0){
 		        $tipoFichero = $imagenPropiedades['type'];
 		        if ($tipoFichero != "image/jpeg" && $tipoFichero != "image/png"){
 		            $error = 9;
 		        } else if($imagenPropiedades['size'] > TAMANOMAXFICHERO){
 		            $error = 10;
 		        }
 		    }
 		    return $error;
 		}
 		
 		function calcularTamanoTotal($tablaArchivos):int {
 		    $total = 0;
 		    foreach ($tablaArchivos as $valor){
 		        $total += $valor[0]; // indice donde se encuentra SIZE
 		    }
 		    return $total;
 		}
 	
 		function moverADestino($nombreArchivo,$ficheroTemporal):bool{
 		    if ( file_exists(DIRECTORIO.'/'.$nombreArchivo)){
 		        return false;
 		    }else{
 		            return move_uploaded_file($ficheroTemporal, DIRECTORIO.'/'.$nombreArchivo);
 		        }
 		}
 		
 		?>
 		
 	</body>
 </html>
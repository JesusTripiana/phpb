<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="estilos.css" rel="stylesheet" type="text/css" />
</head>
<body class="align">

  <div class="grid">

    <div id="login">

      <h2><span class="fontawesome-lock"></span>Procesando Formulario</h2>
      <fieldset>

		<?php 
		$nombre = "";
		$clave = "";
		$color = "";
		$publicidad = "";
		$idiomas = [];
		$anioEstudios = "";
		$codigoPost = [];
		$comentarios = "";
		
		if (isset($_REQUEST['nombre'])){
		    $nombre = $_REQUEST['nombre'];
		}
		
		if (isset($_REQUEST['pwd'])){
		    $clave = $_REQUEST['pwd'];
		}
		
		if (isset($_REQUEST['color'])){
		    $color = $_REQUEST['color'];
		}
		
		if (isset($_REQUEST['publicidad'])){
		    $publicidad = 'SI publicidad';
		}else{
		    $publicidad = 'NO publicidad';
		    }
		    
		if (isset($_REQUEST['idiomas'])){
		     $idiomas = $_REQUEST['idiomas'];
		}else{
		    $idiomas[] = 'No habla idiomas'; 
		}
		
		if (isset($_REQUEST['selAnioFinEstudios'])){
		    $anioEstudios = $_REQUEST['selAnioFinEstudios'];
		}
		
		if (isset($_REQUEST['codigosPostales'])){
		    $codigoPost = $_REQUEST['codigosPostales'];
		}
		
		if (isset($_REQUEST['textoComentarios'])){
		    $comentarios = $_REQUEST['textoComentarios'];
		}
        ?>
        
        <p>Nombre: <?= $nombre?></p>
        <p>Clave: <?= $clave?></p>
        <p>Semaforo: <?= $color?></p>
        <p>Publicidad: <?= $publicidad?></p>
        <p>Idiomas: <?php 
        foreach ($idiomas as $valor){
            echo $valor.', ';
        }
        ?></p>
        <p>Año de fin de estudios: <?= $anioEstudios?></p>
        <p>Lista de codigos postales de provincias:
        <?php 
        foreach ($codigoPost as $valor){
            echo $valor.' ';
        }
        ?> 
        </p>
        <p>Comentarios: <?= $comentarios?></p>
 	  </fieldset>
 	  </div>
   </div>
 </body>
</html>
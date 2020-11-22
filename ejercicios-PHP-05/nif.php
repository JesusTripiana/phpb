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
	$nif = '';
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	    if(is_numeric($_POST['nif'])){
	        if(strlen($_POST['nif']) == 8){ // utilizo la funcion STRLEN puesto que la variable esta creada como STRING
	            $nif = $_POST['nif'];
	            $nif.= '-'.calcularLetra($nif);
	            ?>
	            <h2><span class="fontawesome-lock"></span> NIF COMPLETADO</h2>
	     		<fieldset>
        		<p><?= $nif?></p>
        		</fieldset>
	        <?php }else{
	               $error = 'Los datos introducidos son erroneos, introduzca solo los numeros del NIF.';
	                } 
	    }    
	}
	
	if ($_SERVER['REQUEST_METHOD'] == 'GET' || isset($error)){
	?>
      <h2><span class="fontawesome-lock"></span>Formulario NIF</h2>
      <form action="nif.php" method="post">

        <fieldset>
        <p><label for="nif"> Introduzca el NIF sin letra:</label></p>
        <p><input type="text" name="nif"/></p>
        <p><?= (isset($error))?$error:''?></p>
        </fieldset>
        </form>
        <?php }?>
     </div>
   </div>
 </body>
</html>


<?php 

function calcularLetra($numero):string{
    $letras = ['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E',];
    return $letras[$numero%23];
}
?>

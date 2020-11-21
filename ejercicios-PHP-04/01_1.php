<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body class="align">
		<div class="grid">
			<div id="login">
			<h2><span class="fontawesome-lock"></span>Formulario de Acceso</h2>

			<form name='entrada' method="POST" action="01.php">
				 <fieldset>
				 
				<p><label for="usr">Nombre:</label></p>
				<p><input type="text" name="usr" size="20"></p>
				<p><label for="pwd">Contraseña:</label></p>
				<p><input type="password" name="pwd" size="20"></p>
				<p><input type="submit" name="orden" value="Entrar"></p>
				<?php 
				
				if (isset($error)){
				    echo '<br><p>'.$error.'</p>';
				}
				
				?>
				</fieldset>
      		</form>

    		</div> <!-- end login -->

  		</div>
</body>
</html>

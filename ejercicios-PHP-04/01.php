<html>
	<body>
		<table width="250">
		

	<?php 
        $datosAcceso = array('pepe'=>1234, 'manolo'=>'manolo', 'luis' => 4321);


        //----- Si método GET -> muestra formulario y sí es POST -> Valida y procesa el formulario

        if($_SERVER['REQUEST_METHOD'] == 'POST'){ // ........ Valida formulario
            $usuario = $_POST['usr'];
            $password = $_POST['pwd'];
            $usuaEncontrado = false;
            $paswEncontrado = false;
            foreach ($datosAcceso as $nombre =>$clave){
                if ($usuario == $nombre && $password == $clave){
                    $usuaEncontrado = true;
                    $paswEncontrado = true;
                }
             }
            if ($usuaEncontrado && $paswEncontrado){
                 echo "<h1 align='center'> Bienvenido $usuario </h1>";
            }
            else{
                 $error = "Usuario o password incorrectos. Vuelva a introducirlos.";
            }
        }

        if ($_SERVER['REQUEST_METHOD']== 'GET' || isset($error)){ ?>
    
   			 <form action="01.php" method="post">
    		<tr> <td>Usuario:</td><td><input type="text" name="usr" size="14" maxlength="12"></td></tr>
   			<tr><td>Password:</td><td><input type="password" name="pwd" size="14" maxlength="12"></td></tr>
    		<tr><td colspan="2" align="center"><input type="submit" value="Validar"></td></tr>
    
   <?php if (isset($error)){
        echo '<tr><td colspan="2" align="center">'.$error.'</tr></td>';
    }?>
    
    	</form>
    
	<?php }?>
 
		</table>
	</body>
</html>

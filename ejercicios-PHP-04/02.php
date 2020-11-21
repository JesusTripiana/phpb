
		<?php 
            // Crear página que simule un calculadora sencilla, mediante un único archivo 02.php que
            // mostrará un formularios con dos campos numéricos y 4 botones con los 4 tipos de
            // operaciones + - * / posibles. Se incluirá también 3 controles de tipo radio que indicarán
            // como queremos que se muestre el resultado en decimal, binario o hexadecimal.
            // El programa php debe comprobar que se han recibido los dos valores numéricos y
            // detectará el error de intento de división por cero. Mostrará el resultado calculado según el
            // formato elegido. Por omisión se mostrará en decimal.
            
		   //FUNCIONES AUXILIARES
		   
		function calcularResultado($valor1,$valor2,$operador):float{
		    $resultado=0;
		    switch ($operador) {
		        case '+':
		            $resultado = $valor1 + $valor2;
		            break;
		        
		        case '-':
		            $resultado = $valor1 - $valor2;
		            break;
		            
		        case '*':
		            $resultado = $valor1 * $valor2;
		            break;
		        case '/':
		            $resultado = $valor1 / $valor2;
		            break;
		    }
		    return $resultado;
		}
		
		function calcularFormato($valor,$formato){
		    $resultado=0;
		    switch ($formato){
		        case "bin":
		          $resultado = decbin($valor); // pasa de decimal a binario
		          break;
		        case "hex":
		          $resultado = dechex($valor); // pasa de decimal a hexadecimal
		          break;
		        default:
		          $resultado = $valor;
		          break;
 		    }
 		    return $resultado;
		}
		
		
		if (isset($_GET['operacion'])){
		    $num1= $_GET['num1'];
		    $num2 = $_GET['num2'];
		    $operador = $_GET['operacion'];
		    $formato = $_GET['formato'];
		    
		    $error = false;
		    if ( !is_numeric ($num1) || !is_numeric ($num2) ){ // si alguno de los campos NO son numericos
		        $error = true;
		        $msg = "Alguno de los campos introducidos no es numerico.";
		    }
		    
		    if ($num2 == 0 && $operador == '/'){
		        $error = true;
		        $msg = 'Division por 0, no se puede realizar.';
		    }
		    
		    if (!$error){ // si no existe el error
		        $resultadoOp = calcularResultado($num1,$num2,$operador); // calcula el resultado
		        $resultadoFinal = calcularFormato($resultadoOp,$formato); // Le da el formato indicado
		        $msg =  "El resultado es: ".$resultadoFinal;
		    }
		}

         ?>
         
<!DOCTYPE html>
<html>
	<head>
<meta charset="UTF-8">
<link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body class="align">
		<div class="grid">
			<div id="login">
			<h2><span class="fontawesome-lock"></span>Calculadora</h2>
		
			<form action="02.php" method="get">
			<fieldset>
				 
				<p><label for="num1">N° 1</label></p>
				<p><input type="text" name="num1" size="6" value="<?=isset($num1)?$num1:''?>"></p> <!-- si existe num1, se lo asigno a value, sino (pongo 1 espacio) -->
				<p><label for="num2">N° 2</label></p>
				<p><input type="text" name="num2" size="6" value="<?=isset($num2)?$num2:''?>"></p>
			
				<p style="display:inline-block"><button name='operacion' value='+'> +</button></p>  <!-- Los BUTTON envian el formulario directamente -->
				<p style="display:inline-block"><button name='operacion' value='-'> -</button></p>
				<p style="display:inline-block"><button name='operacion' value='*'> *</button></p>
				<p style="display:inline-block"><button name='operacion' value='/'> /</button></p>
				
				<p><input type="radio" name="formato" value="dec" 
				<?=(!isset($formato) || $formato =="dec")? "checked='checked'":""?> > Decimal </p>  <!-- Preguntas secuenciales para la asignacion de valores al CHECKED -->
				<p><input type="radio" name="formato" value="hex"
				<?=(isset($formato) && $formato =="hex")? "checked='checked'":""?> > Hexadecimal </p>
				<p><input type="radio" name="formato" value="bin"
				<?=(isset($formato) && $formato =="bin")? "checked='checked'":""?> > Binario </p>
			
				<?= isset($msg)?"<p>".$msg."</p>":""?><br>
			</fieldset>
			</form>
			</div> <!-- end login -->

  		</div>
	</body>
</html>

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
		          $resultado = decbin($valor);
		          break;
		        case "hex":
		          $resultado = dechex($valor);
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
		    if ( !is_numeric ($num1) || !is_numeric ($num2) ){
		        $error = true;
		        $msg = "Alguno de los campos no es numerico.";
		    }
		    
		    if ($num2 == 0 && $operador == '/'){
		        $error = true;
		        $msg = 'Division por 0, no se puede realizar.';
		    }
		    
		    if (!$error){
		        $resultadoOp = calcularResultado($num1,$num2,$operador);
		        $resultadoFinal = calcularFormato($resultadoOp,$formato);
		        $msg =  "El resultado es: ".$resultadoFinal;
		    }
		}

         ?>
         
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<div>
			<div >
				<h1>Calculadora</h1>
			</div>
		<div >
		<table width="400">
			<form action="02.php" method="get">
				<tr><td>N° 1</td><td><input type="text" name="num1" size="6" value="<?=isset($num1)?$num1:''?>"> </td></tr> <!-- si existe num1, se lo asigno a value, sino (pongo 1 espacio) -->
				<tr><td>N° 2</td><td><input type="text" name="num2" size="6" value="<?=isset($num2)?$num2:''?>"></td></tr>
				<tr><td></td></tr>
				<tr><td colspan="3" align="center">
					<button name='operacion' value='+'> +</button>  <!-- Los BUTTON envian el formulario directamente -->
					<button name='operacion' value='-'> -</button>
					<button name='operacion' value='*'> *</button>
					<button name='operacion' value='/'> /</button>
				</td></tr>
				<tr><td colspan="2" align="center">
					<input type="radio" name="formato" value="dec" 
					<?=(!isset($formato) || $formato =="dec")? "checked='checked'":""?> > Decimal </td>  <!-- Preguntas secuenciales para la asignacion de valores al CHECKED -->
					<td><input type="radio" name="formato" value="hex"
					<?=(isset($formato) && $formato =="hex")? "checked='checked'":""?> > Hexadecimal </td>
					<td><input type="radio" name="formato" value="bin"
					<?=(isset($formato) && $formato =="bin")? "checked='checked'":""?> > Binario </td>
				</tr>
				</form>
				</table>
				<?= isset($msg)?$msg:""?><br>
			</div>
		</div>
	</body>
</html>
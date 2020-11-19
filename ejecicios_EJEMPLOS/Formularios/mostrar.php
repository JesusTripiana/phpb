<html>
<body>
<?php 
$a = $_POST['c1'];
$b = $_POST['c2'];
$c = $_POST['c3'];
$d = $_POST['sexo'];
$e = $_POST['ck1'];
$f = $_POST['ck2'];
$nota = $_POST['nota'];
$g = $_POST['color'];
$h = $_POST['idiomas'];
$k = $_POST['b1'];
$k2 = $_POST['b2'];

echo "c1=$a c2=$b c3=$c <br>";
echo "sexo=$d ck1=$e ck2=$f<br>";
echo "$nota <br>";
echo "color = $g <br>";

foreach ($h as $lengua){
    echo "$lengua <br>";
}

if (isset($k)){
    echo "Se pulso el boton aceptar";
}
if (isset($k2)){
    echo "Se pulso el boton enviar";
}
?>
</body>
</html>
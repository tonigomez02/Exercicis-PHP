<?php
//Cambio de tipo
/*$yessir = 32;
settype($yessir, "string");
var_dump($yessir);*/

function duplicarAL($var) {
    $temp = $var * 2;
}
$variable = 5;
duplicarAL($variable);
echo "El valor de la variable \$temp es: $temp <br>";
//salida : no tiene valor

function duplicarAG($var) {
    global $temp;
    $temp = $var * 2;
}
$variable = 5;
duplicarAG($variable);
echo "El valor de la variable \$temp es: $temp <br>";

$x=5;
$y=10;
function myTest()
{
    $GLOBALS['y']= $GLOBALS['x'] + $GLOBALS['y'];
}
myTest();
echo $y; // outputs 15

function variableGlobal(){
    global $probando;
    $probando="Hola Mundo cruel";
}
variableGlobal();
echo $probando;

echo "\n Hello \r \"toni\" <br>";

$mivar = "Hola!";
echo strlen($mivar); // Muestra 4
echo strlen("Hola Mundo!"); // Muestra 11

echo substr($mivar, 0, 2);

$array = array(
    "a",
    "b",
    6 => "c",
    "d",
);
echo "<br>";
foreach ($array as $key => $value){
    echo "$key : $value <br>";
}


$funcs = get_defined_functions();
echo count($funcs ['internal']);



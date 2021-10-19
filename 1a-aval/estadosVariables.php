<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        table{
            border: 1px solid black;
            align-content: center;
        }
        td{
            padding: 20px
        }

        th{
            padding: 20px;
        }

    </style>
</head>
<body>
<?php

$salida = "<table><tr><th>Contenido de \$var</th> <th>isset(\$var)</th> <th>empty(\$var)</th> <th>(bool) \$var</th></tr>";
$arratValores = array(null, 0, true, false, "0", "", "foo", array());
$variable;
$return_configurada;
$return_vacia;
$return_booleana;

function configurada($var) {
    if(isset($var)){
        return "True";
    } else {
        return "False";
    }
}

function vacia($var) {
    if(empty($var)){
        return "True";
    } else {
        return "False";
    }
}

function booleana($var) {
    if((bool) $var === true){
        return "True";
    } else {
        return "False";
    }
}


foreach ($arratValores as $valorArray){
    $variable = $valorArray;
    $return_configurada = configurada($variable);
    $return_vacia = vacia($variable);
    $return_booleana = booleana($variable);

    $salida .= "<tr><td>var = $variable</td><td>$return_configurada</td> <td>$return_vacia</td> <td>$return_booleana</td> </tr>";
}
$salida .= "</table>";
echo "<p>configurada($variable)</p>";
echo $salida;



?>
</body>
</html>

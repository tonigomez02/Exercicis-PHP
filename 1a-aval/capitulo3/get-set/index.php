<?php

spl_autoload_register(function ($clase) {
    include 'clases/' . $clase . '.php';
});

$obj1 = new A();
$obj1->publica = 4;
echo "El valor de la variable publica es: " . $obj1->publica . "\n";
$obj1->protegida = 5;
echo "El valor de la variable protegia es: " . $obj1->protegida . "\n";
$obj1->privada1 = 6;
echo "El valor de la variable privada1 es: " . $obj1->privada1 . "\n";
$obj1->privada2 = 7;
echo "El valor de la variable privada2 es: " . $obj1->privada2 . "\n";
$obj1->privada3 = 8; //No le doy acceso
echo "El valor de la variable privada3 es: " . $obj1->privada3;

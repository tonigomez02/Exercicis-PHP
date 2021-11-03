<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
$nombre = "";
$edad = "";
$email = "";
if(isset($_GET["submit"])){
    $nombre = $_GET["nombre"];
    $edad = $_GET["edad"];
    $email = $_GET["email"];
    echo    "Nombre: $nombre <br>"
        . "Edad: $edad <br>"
        . "Email: $email <br>";
} else {

}

?>
<h2>Rellena este formulario</h2>
<form>
    <input name="nombre">
    <input name="edad">
    <input name="email">
    <input type="submit" name="submit">
</form>

</body>
</html>

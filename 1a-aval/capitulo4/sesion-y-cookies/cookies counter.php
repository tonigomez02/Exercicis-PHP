<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
error_log(0);
if (isset($_COOKIE["veces"])) {
    setcookie("veces", $_COOKIE[ "veces" ] + 1,);
    echo "Numero de visitas: " . $_COOKIE["veces"];
} else {
    setcookie("veces", 1);
    echo "Bienvenido, primera vez";
}

?>
</body>
</html>


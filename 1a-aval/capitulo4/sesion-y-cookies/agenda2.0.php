<?php

session_start();

?>


<html>
<head>
    <title>Agenda</title>
    <style>

    </style>
</head>
<body>
<main>

    <h1>Agenda de contactos</h1>
    <form>
        <p>Nombre: </p><input type="text" name="nombre"/>
        <p>Telefono: </p> <input type="text" name="telefono"/>
        <input id="enviar" type="submit" name="submit" value="Enviar"/>
    </form>

    <?php
    error_reporting(0);

    if (isset($_GET["submit"])) {

        $errores = [];
        $agenda = [];
        $nombre = filter_input(INPUT_GET, "nombre");
        $telefono = filter_input(INPUT_GET, "telefono");

        if (!empty($nombre)) {
            if (!empty($telefono)) {
                if (array_key_exists($nombre, $agenda)) {
                    echo 'Contacto actualizado' . "<br>";
                } else {
                    echo "Contacto añadido" . "<br>";
                }
                $_SESSION["agenda"][$nombre] = $telefono;
            } else if (array_key_exists($nombre, $_SESSION["agenda"])) {
                unset($_SESSION["agenda"][$nombre]);
                echo 'Contacto eliminado' . "<br>";
            } else {
                array_push($errores, 'Introduce un telefono');
            }
        } else if (empty($telefono)) {
            array_push($errores, 'Introduce un nombre y un telefono');
        } else {
            array_push($errores, 'Introduce un nombre');
        }

        foreach ($errores as $value) {
            echo "$value <br>";
        }
        imprimirDatos();
    }else{
        imprimirDatos();
    }

    function imprimirDatos()
    {
        foreach ($_SESSION["agenda"] as $key => $value) {
            echo "$key : $value" . "<br>";
        }
    }

    //   session_destroy()
    ?>
</main>
</body>
</html>

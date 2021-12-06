<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width: 600px;
            border: 1px solid black;
            border-radius: 20px;
            margin: 40px auto auto;
        }

        td {
            text-align: center;
            padding: 10px;
        }

        table:first-child {
            background-color: rgb(108, 122, 224);
        }
    </style>
</head>
<body>

<?php

spl_autoload_register(function ($clase) {
    include './' . $clase . '.php';
});

$database = new Database();
$db = $database->getConnection();
$utils = new DBUtils();

if (isset($_POST["enviar"])) {

    $nombre = filter_input(INPUT_POST, "nombre");
    $apellido = filter_input(INPUT_POST, "apellido");
    $telefono = filter_input(INPUT_POST, "telefono");

    if (!empty($nombre)) {
        if (!empty($telefono)) {
            if (!empty($apellido)) {
                if ($utils->find($db, $nombre)) {
                    imprimirFormulario();
                    echo '<p style="text-align: center">Contacto actualizado</p>' . "<br>";
                    $utils->update($db, $nombre, $apellido, $telefono);
                    $utils->read($db);

                } else {
                    $utils->create($db, $nombre, $apellido, $telefono);
                    imprimirFormulario();
                    echo '<p style="text-align: center">Contacto añadido</p>' . "<br>";
                    $utils->read($db);
                }
            } else {
                array_push($errores, 'Introduce un apellido');
            }
        } else if ($utils->find($db, $nombre)) {
            $utils->delete($db, $nombre);
            imprimirFormulario();
            echo '<p style="text-align: center">Contacto eliminado</p>' . "<br>";
            $utils->read($db);
        } else {
            array_push($errores, 'Introduce un telefono');
        }
    } else if (empty($telefono)) {
        array_push($errores, 'Introduce un nombre y un telefono');
    } else {
        array_push($errores, 'Introduce un nombre');
    }
} else {
    imprimirFormulario();
    $utils->read($db);
}


function imprimirFormulario()
{

    ?>
    <form action="" method="post">
        Nombre: <input name="nombre" type="text" placeholder="nombre..."><br>
        Apellido: <input name="apellido" type="text" placeholder="apellido..."><br>
        Telefono: <input name="telefono" type="text" placeholder="telefono...""><br>
        <input name="enviar" type="submit" value="Submit">
    </form>
    <?php
}

?>
</body>
</html>


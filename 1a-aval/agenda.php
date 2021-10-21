<html>
<head>
    <title>Agenda</title>
    <style>
        main{
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: aliceblue;
            border: 1px solid black;
            border-radius: 15px;
            padding: 25px 50px;
            max-width: 345px;
            min-height: 400px;
        }

        body{
            display: grid;
            justify-content: center;
            align-content: space-between;
            margin-top: 40px;
        }

        *{
            font-family: Arial;
        }

        li{
            margin-top: 5px;
        }

        h4{
            margin: 3px;
        }

        input{
            margin: 5px;
        }

        form{
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #enviar{
            align-self: center;
        }
        p{
            margin: 6px;
        }
    </style>
</head>
<body>
<main>
<h1>Agenda de contactos</h1>
<form>

    <?php
    $errores = [];
    $agenda = [];
    $salida = "";

    if (isset($_GET["submit"])) {

        $nombre = array_filter($_GET["nombre"], function ($data) {
            return $data !== "";
        });
        $telefono = array_filter($_GET["telefono"], function ($data) {
            return $data !== "";
        });

        if (!empty($nombre)) {

            if (!empty($telefono)) {
                $agenda = array_push_assoc($agenda, $nombre, $telefono);
                imprimirDatos();
            } else {
                array_push($errores, "Introduce un telefono");
            }

        } elseif (empty($_GET["telefono"])) {
            array_push($errores, 'Introduce un nombre y un telefono');
        } else {
            array_push($errores, 'Introduce un nombre');
        }

        foreach ($errores as $value) {
            echo "$value <br>";
        }
    }
    ?>

    <p>Nombre: </p><input type="text" name="nombre[]"/>
    <p>Telefono: </p> <input type="text" name="telefono[]"/>
    <input id="enviar" type="submit" name="submit" value="Enviar"/>
</form>
<?php
if (empty($agenda)){
    echo '<h4>Lista de contactos vacia</h4>';
}else{
    echo '<h4>Lista de contactos:</h4>';
}
    ?>
<?= $salida ?>

</main>
<?php

function array_push_assoc($array, $key, $value)
{
    for ($i = 0; $i < count($key); $i++) {
        $array[$key[$i]] = $value[$i];
    }
    return $array;
}

function imprimirDatos()
{
    global $salida, $agenda;
    $salida .= "<ul>";
    foreach ($agenda as $nombre => $telefono) {
        $salida .= "<li>$nombre : $telefono</li>";
        echo "<input type='hidden' name='nombre[]' value='$nombre'>";
        echo "<input type='hidden' name='telefono[]' value='$telefono'>";
    }
    $salida .= '</ul>';
}

?>
</body>
</html>

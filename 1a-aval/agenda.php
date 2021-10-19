<
<html>
<head>
    <title>Agenda</title>
</head>
<body>

<form>

    <?php
    $errores = [];
    $agenda = [];
    $salida = "";

    if (isset($_GET["submit"])) {

        if (!empty($_GET["nombre"])) {

            if (!empty($_GET["telefono"])) {

                valoresExisten();
                $salida .= "<ul>";
                foreach ($agenda as $nombre => $telefono) {
                    $salida .= "<li>$nombre : $telefono</li>";
                    echo "<input type='hidden' name='nombre[]' value='$nombre'>";
                    echo "<input type='hidden' name='telefono[]' value='$telefono'>";
                }
                $salida .= '</ul>';
            } else {
                array_push($errores, "Introduce un telefono");
            }
        } elseif (empty($_GET["telefono"])) {
            array_push($errores, 'Introduce un nombre y un telefono');
        } else {
            array_push($errores, 'Introduce un nombre');
        }

        foreach ($errores as $value) {
            echo $value;
        }
    }

    ?>

    <input type="text" name="nombre[]"/>
    <input type="text" name="telefono[]"/>
    <input type="submit" name="submit" value="Enviar"/>
</form>

<?=$salida?>

<?php

function array_push_assoc($array, $key, $value)
{

    for ($i = 0; $i < count($key); $i++) {
        $array[$key[$i]] = $value[$i];
    }
    return $array;
}

function valoresExisten()
{
    global $agenda;
    $nombre = $_GET["nombre"];
    $telefono = $_GET["telefono"];
    $agenda = array_push_assoc($agenda, $nombre, $telefono);
}

?>
</body>
</html>

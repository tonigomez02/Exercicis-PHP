<?php

if (isset($_COOKIE["idioma"])) {
    mostrarContenido1();
} else if (isset($_GET["idioma"])) {
    $idioma = filter_input(INPUT_GET, "idioma");
    setcookie("idioma", $idioma, time() + 80000);
    mostrarContenido2($idioma);

} else {
    ?>

    <h2>Seleccione un idioma</h2>
    <a href="?idioma=es">Español</a>
    <a href="?idioma=en">Ingles</a>

    <?php
}
?>

<?php

function mostrarContenido1()
{
    if ($_COOKIE["idioma"] === "es") {
        echo "Pagina es español";
    } else if ($_COOKIE["idioma"] === "en") {
        echo "Pagina en ingles";
    }
}

function mostrarContenido2($idioma)
{
    if ($idioma === "es") {
        echo "Pagina es español";
    } else if ($idioma === "en") {
        echo "Pagina en ingles";
    }
}



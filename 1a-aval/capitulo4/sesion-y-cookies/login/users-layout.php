<?php
error_reporting(0);
session_start();
if (!isset($_COOKIE["usuario"]) && isset($_SESSION["nombre"])) {
    session_destroy();
} else if (!isset($_SESSION["usuario"]) && !isset($_COOKIE["usuario"])) {
    header("location: login.php");
}
?>

<div>
    <?php echo "Hola " . $_SESSION["nombre"] . "!" ?>
    <h1>Zona de usuarios</h1>
    <a href="./logout.php">Log out</a>
</div>



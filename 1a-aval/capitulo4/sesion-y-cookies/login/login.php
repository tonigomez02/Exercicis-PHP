<?php
error_reporting(0);


session_start();

if (isset($_COOKIE["usuario"])) {
    $_SESSION["nombre"] = $_COOKIE["usuario"];
    header("location: users-layout.php");
} else {
    if (isset($_POST["submit"])) {
        $name = filter_input(INPUT_POST, "name");
        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");

        if ($name !== "") {
            if (isset($_POST["checkbox"])) {
                setcookie("usuario", $name, time() + 80000);
                $_SESSION["nombre"] = $name;
                header("location: users-layout.php");
            } else {
                session_start();
                $_SESSION["nombre"] = $name;
                header("location: users-layout.php");
            }

        } else {
            displayFormulario();
        }

    } else {
        displayFormulario();
    }
}


function displayFormulario()
{
    ?>
    <form action="" method="post">
        Nombre: <input name="name" type="text" placeholder="username..."><br>
        Email: <input name="email" type="text" placeholder="email..."><br>
        Contraseña: <input name="password" type="text" placeholder="password...""><br>
        Recordar: <input name="checkbox" type="checkbox">
        <input name="submit" type="submit" value="Submit">
    </form>
    <?php
}





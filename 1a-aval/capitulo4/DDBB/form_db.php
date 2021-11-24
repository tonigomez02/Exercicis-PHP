<?php /** @noinspection ALL */
require("ddbb connection.php");
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (mysqli_errno($conn)){
    "Error en la conexiom";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form DB</title>
</head>
<body>
<?php
if (isset($_GET["enviar"])) {
    $id = $_GET['id'];
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $email = $_GET['email'];
    $contact_number = $_GET['contact_number'];
    $address = $_GET['address'];
    $password = $_GET['password'];

    $query = "insert into users (id, firstname, lastname, email, contact_number, address, password) 
values ($id,'$firstname','$lastname', '$email', '$contact_number', '$address', '$password')";

    $result = mysqli_query($conn, $query);

    if ($result == false){
        echo "Error en la inserción de datos";
    }else{
        echo "Registros guardados";
    }

} else {
    ?>
    <form>
        ID: <input type="number" name="id" value=""><br>
        Firstname: <input type="text" name="firstname" value=""><br>
        Lastname: <input type="text" name="lastname" value=""><br>
        email: <input type="text" name="email" value=""><br>
        Contact number: <input type="text" name="contact_number" value=""><br>
        Address: <input type="text" name="address" value=""><br>
        Password: <input type="password" name="password" value=""><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
}
?>


</body>
</html>

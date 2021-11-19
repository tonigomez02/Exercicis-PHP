<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload files</title>
</head>
<body>
<?php
if (isset($_POST["submit"])) {

    var_dump($_FILES["archivo"]);
    $temp_name = $_FILES["archivo"]["tmp_name"];
    $name = $_FILES["archivo"]["name"];
    move_uploaded_file($temp_name, __DIR__ . "/files/$name" );


} else {
    displayForm();
}
?>

</body>
</html>
<?php
function displayForm()
{
    ?>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="archivo"><br>
        <input type="submit" name="submit" value="Enviar">
    </form>
    <?php
}

?>



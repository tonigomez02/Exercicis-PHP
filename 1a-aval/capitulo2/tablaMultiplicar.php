<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        table{
            border: 1px solid black;
            margin-right: 10px;
        }

        div{
            display: flex
        }

    </style>
</head>
<body>
<h1><?php echo "Tabla de multiplicar";?></h1>
<div>
    <?php
    for($j = 1; $j <=10; $j++){
        echo '<table>';
        for($i = 1; $i <= 10; $i++){
            $resultat = $j * $i;
            echo "<tr><td>$j *$i = $resultat</td></tr>";
        }
        echo '</table>';
        echo '<br>';
    }
    ?>
</div>
</body>
</html>

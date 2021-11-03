<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
</head>

<body>
    <?php
        // Revisamos si agenda tiene un valor con isset
        if (isset($_GET['agenda'])) {
            $agenda = $_GET['agenda'];
        // Si no existe, la creamos
        } else {
            $agenda = [];
        }

        // Si la super global tiene el valor submit, revisamos los valores introducidos
        if (isset($_GET['submit'])) {

            $nuevo_nombre = filter_input(INPUT_GET, 'nombre');
            $nuevo_telefono = filter_input(INPUT_GET, 'telefono');

            if (empty($nuevo_nombre)) {
                echo "<h2 style='color: red'>Debes introducir un nombre</h2><br>";
            } elseif (empty($nuevo_telefono)) {
                unset($agenda[$nuevo_nombre]);
                echo "<h2 style='color: red'>Has borrado el contacto: " . $nuevo_nombre . " </h2><br>" ;
            } else {
                $agenda[$nuevo_nombre] = $nuevo_telefono; // Agenda[array] --> NuevoNOmbre(clave), nuevo telefono(valor)
            }
        }

    ?>

    <!--FORMULARIO -->
    <h2>Insertar nuevo contacto</h2>
    <form method="GET">
        <div>
            <!-- Insertamos los contactos ya existentes en un input oculto en el formulario -->
            <?php
            foreach ($agenda as $nom => $telf) {
                echo '<input type="hidden" name="agenda[' . $nom . ']" ' . 'value="' . $telf . '">';
            }
            ?>
            <label>Nombre: <input type="text" name="nombre" /></label><br />
            <label>Teléfono: <input type="number" name="telefono" /></label><br />
            <input type="submit" name="submit" value="Insertar"><br />
        </div>
    </form>

    <!-- Mostrar contactos -->
    <h2>Agenda</h2>
    <?php
    function mostrarAgenda(){
        global $agenda; // Acedemos a la variable global agenda, ya que no es local de esta funcion

        if (empty($agenda)) {
            echo "No hay contactos en la agenda, por favor, insértalos";
        } else {
            echo "<ul>";
            foreach ($agenda as $nom => $telf) {
                echo "<li>$nom: $telf</li>";
            }
            echo "</ul>";
        }
        echo "<br>";
        var_dump($agenda);
    }
    mostrarAgenda();

    ?>
</body>

</html>
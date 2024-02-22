<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caso2</title>
</head>
<body>
    <h1>Formulario de Paternidad</h1>
    <form action="Caso2.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <label for="sexo">Sexo:</label>
        <select id="sexo" name="sexo" required>
            <option value="Hombre">Hombre</option>
            <option value="Mujer">Mujer</option>
        </select><br><br>
        
        <label for="num_hijos">Número de Hijos:</label>
        <input type="number" id="num_hijos" name="num_hijos" min="0" required><br><br>
        
        <input type="submit" value="Enviar">
    </form>

    <?php
    // Obtener los datos del formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
    $num_hijos = isset($_POST['num_hijos']) ? $_POST['num_hijos'] : '';

    // Construir la frase según los datos ingresados
    if ($num_hijos == 1) {
        if ($sexo == "Hombre") {
            echo "<p>El señor $nombre tiene 1 hijo.</p>";
        } else {
            echo "<p>La señora $nombre tiene 1 hijo.</p>";
        }
    } elseif ($num_hijos > 1) {
        echo "<p>El señor $nombre tiene $num_hijos hijos.</p>";
    } else {
        if ($sexo == "Hombre") {
            echo "<p>El señor $nombre no tiene hijos.</p>";
        } else {
            echo "<p>La señora $nombre no tiene hijos.</p>";
        }
    }
    ?>
</body>
</html>

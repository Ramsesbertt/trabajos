<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caso1</title>
</head>
<body>
    <h1>Generador de Tickets</h1>
    <form action="Caso1.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <label for="altura">Altura (en cm):</label>
        <input type="number" id="altura" name="altura" required><br><br>
        
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required><br><br>
        
        <label for="juicio">¿Rechaza llevarnos a juicio por daños y un mal mantenimiento?</label><br>
        <input type="radio" id="si" name="juicio" value="si" required>
        <label for="si">Sí</label>
        <input type="radio" id="no" name="juicio" value="no">
        <label for="no">No</label><br><br>
        
        <input type="submit" value="Generar Ticket">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $altura = $_POST['altura'];
        $edad = $_POST['edad'];
        $juicio = $_POST['juicio'];
        
        if ($altura >= 120 && $edad > 16 && $juicio == 'si') {
            $numeroticket = sprintf("%05d", mt_rand(1, 99999));
            echo "<h2>Ticket Generado</h2>";
            echo "<p>$nombre, ticket $numeroticket</p>";
        } elseif ($edad <= 16) {
            echo "<h2>No se pudo Generar el Ticket</h2>";
            echo "<p>Lo sentimos, el usuario es menor a 16 años.</p>";
        } elseif ($altura < 120) {
            echo "<h2>No se puede Generar el Ticket</h2>";
            echo "<p>Lo sentimos, la altura no cumple con el requisito mínimo de 120cm.</p>";
        } else {
            echo "<h2>No se puede Generar el Ticket</h2>";
            echo "<p>Lo sentimos, no se cumplen todos los requisitos para generar el ticket.</p>";
        }
    }
    ?>
</body>
</html>

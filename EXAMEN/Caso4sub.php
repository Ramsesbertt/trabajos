<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Producto</title>
</head>
<body>
    <h2>Formulario para Subir Productos</h2>
    <form action="caso4sub.php" method="post">
        <label for="numero_serie">Número de Serie:</label><br>
        <input type="text" id="numero_serie" name="numero_serie" required><br>
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="precio">Precio:</label><br>
        <input type="number" id="precio" name="precio" step="0.01" required><br>
        <input type="submit" name="submit" value="Subir Producto">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $numero_serie = $_POST['numero_serie'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
    ?>
    <h2>Boleta de Subida de Producto</h2>
    <p><strong>Número de Serie:</strong> <?php echo $numero_serie; ?></p>
    <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
    <p><strong>Precio:</strong> <?php echo $precio; ?></p>
    <?php
    }
    ?>
</body>
</html>

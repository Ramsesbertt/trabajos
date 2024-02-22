<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caso3</title>
</head>
<body>
    <h2>Calculadora Newsletter</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="num_emails">Número de Emails a enviar:</label>
        <input type="number" id="num_emails" name="num_emails" required>
        <br>
        <label for="seguro">¿Desea seguro por cada mensaje?</label>
        <input type="checkbox" id="seguro" name="seguro" value="1">
        <br>
        <button type="submit">Calcular Precio</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numemails = isset($_POST['num_emails']) ? intval($_POST['num_emails']) : 0;
        $seguro = isset($_POST['seguro']) ? intval($_POST['seguro']) : 0;

        if ($numemails <= 2000) {
            $preciobase = 0.0;
        } elseif ($numemails <= 10000) {
            $preciobase = 0.7;
        } else {
            $preciobase = 0.2;
        }

        $recargoseguro = $seguro ? 0.1 : 0.0;

        $preciototal = $preciobase * $numemails + $recargoseguro * $numemails;

        echo "<h2>Precio Total</h2>";
        echo "<p>Número de Emails Enviados: $numemails</p>";
        echo "<p>Precio base por email: S/ $preciobase</p>";
        echo "<p>Recargo por seguro por email: S/ $recargoseguro</p>";
        echo "<h3>Monto Total: S/ $preciototal</h3>";
    }
    ?>
</body>
</html>

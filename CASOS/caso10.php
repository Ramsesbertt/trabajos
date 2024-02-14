<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa de Préstamos</title>
</head>
<body>
    <h1>CASA DE PRÉSTAMOS</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <table>
            <tr>
                <td>Monto Prestado:</td>
                <td><input type="number" name="monto" min="0"></td>
                <td><span style="color: red;"><?php echo isset($mensajeMonto) ? $mensajeMonto : ''; ?></span></td>
            </tr>
            <tr>
                <td>Número de Cuotas:</td>
                <td>
                    <select name="cuotas">
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                            echo "<option value='$i'>Cuota número $i</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" value="Cotizar"></td>
            </tr>
        </table>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $monto = $_POST['monto'];
        $cuotas = $_POST['cuotas'];

        $mensajeMonto = "";
        if (!is_numeric($monto) || $monto <= 0) {
            $mensajeMonto = "Debe registrar correctamente el monto prestado";
        }

        $fechasPago = [];
        $montoMensual = number_format($monto / $cuotas, 2);

        $fechaPago = date('d/m/Y');
        for ($i = 0; $i < $cuotas; $i++) {
            $fechaPago = date('d/m/Y', strtotime("$fechaPago +1 month"));
            $fechasPago[] = $fechaPago;
        }
        
        if (empty($mensajeMonto)) {
            echo "<h2>Boleta de Préstamo</h2>";
            echo "<h3>Número de Cuotas: $cuotas</h3>";
            echo "<h3>Fechas de Pago:</h3>";
            echo "<ul>";
            foreach ($fechasPago as $i => $fecha) {
                echo "<li>Cuota número " . ($i + 1) . ": $fecha</li>";
            }
            echo "</ul>";
            echo "<p>Monto Mensual a Pagar: $$montoMensual</p>";
        }
    }
    ?>
</body>
</html>

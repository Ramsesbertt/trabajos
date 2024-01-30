<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas de Entradas (Teatro)</title>
    <style>
        .boleta {
            border: 1px solid #000;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>VENTAS DE ENTRADAS (TEATRO)</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td>Comprador:</td>
                <td><input type="text" name="comprador" size="30"></td>
            </tr>
            <tr>
                <td>Fecha Actual:</td>
                <td><input type="text" name="fecha" value="<?php echo date('d/m/Y'); ?>" readonly></td>
            </tr>
            <tr>
                <td>N° de Entradas Adultos:</td>
                <td><input type="number" name="cantidad_adultos" min="0"></td>
            </tr>
            <tr>
                <td>N° de Entradas Niños:</td>
                <td><input type="number" name="cantidad_niños" min="0"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Adquirir"></td>
            </tr>
        </table>
    </form>

    <?php
    if(isset($_POST['submit'])){
        $fechaActual = date("Y-m-d");

        $diaSemana = date("N", strtotime($fechaActual));

        switch ($diaSemana) {
            case 1: 
                $precioAdulto = 10.00;
                $precioNiño = 5.00;
                $diaPromocion = "Lunes";
                break;
            case 2: 
                $precioAdulto = 8.00;
                $precioNiño = 4.00;
                $diaPromocion = "Martes";
                break;
            case 3: 
            case 4:
            case 5:
                $precioAdulto = 16.00;
                $precioNiño = 8.00;
                $diaPromocion = "Miércoles a Viernes";
                break;
            case 6: 
            case 7:
                $precioAdulto = 50.00;
                $precioNiño = 45.00;
                $diaPromocion = "Sábado y Domingo";
                break;
        }

        $comprador = $_POST['comprador'];
        $cantidadAdultos = $_POST['cantidad_adultos'];
        $cantidadNiños = $_POST['cantidad_niños'];

        $precioTotalAdultos = $precioAdulto * $cantidadAdultos;
        $precioTotalNiños = $precioNiño * $cantidadNiños;
        $precioTotal = $precioTotalAdultos + $precioTotalNiños;
        ?>

        <div class="boleta">
            <p><strong>Comprador:</strong> <?php echo $comprador; ?></p>
            <p><strong>Costo por Adulto:</strong> $<?php echo number_format($precioTotalAdultos, 2); ?></p>
            <p><strong>Costo por Niño:</strong> $<?php echo number_format($precioTotalNiños, 2); ?></p>
            <p><strong>Día de Promoción:</strong> <?php echo $diaPromocion; ?></p>
            <p><strong>Monto a Pagar:</strong> $<?php echo number_format($precioTotal, 2); ?></p>
        </div>
    <?php } ?>
</body>
</html>

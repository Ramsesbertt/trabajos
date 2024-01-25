<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta de productos</title>
</head>
<body>
    <header>
        <h1>PAGO DE SALARIO DE EMPLEADOS</h1>
        <img src="../img/PRODUCTOS.png" width="600" height="350">
    </header>
    <section>
        <?php

            session_start();

            error_reporting(0);

            $Cliente = isset($_SESSION['cliente']) ? $_SESSION['cliente'] : '';
            $Producto = isset($_SESSION['producto']) ? $_SESSION['producto'] : '';
            $Cantidad = isset($_SESSION['cantidad']) ? $_SESSION['cantidad'] : '';

            $selCocina = '';
            $selRefrigeradora = '';
            $selTelevision = '';
            $selLavadora = '';
            $selRadiograbadora = '';
            $precio = 0;
            $subtotal = 0;
            $descuento = 0;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $Cliente = $_POST['txtCliente'];
                $Producto = $_POST['selCategoria'];
                $Cantidad = $_POST['txtCantidad'];

                $_SESSION['cliente'] = $Cliente;
                $_SESSION['producto'] = $Producto;
                $_SESSION['cantidad'] = $Cantidad;

                switch ($Producto) {
                    case 'cocina 6 Hornillas':
                        $precio = 1200.00;
                        $subtotal = $precio * $Cantidad;
                        if ($subtotal > 10000.00) {
                            $descuento = 0.1;
                        }
                        break;

                    case 'refrigeradora':
                        $precio = 2500.00;
                        $subtotal = $precio * $Cantidad;
                        if ($subtotal > 10000.00) {
                            $descuento = 0.1;
                        }
                        break;

                    case 'television':
                        $precio = 3200.00;
                        $subtotal = $precio * $Cantidad;
                        if ($subtotal > 10000.00) {
                            $descuento = 0.1;
                        } elseif ($subtotal < 1000.00) {
                            $descuento = 0.05;
                        }
                        break;

                    case 'lavadora':
                        $precio = 1000.00;
                        $subtotal = $precio * $Cantidad;
                        if ($subtotal > 10000.00) {
                            $descuento = 0.1;
                        }
                        break;

                    case 'radiograbadora':
                        $precio = 700.00;
                        $subtotal = $precio * $Cantidad;
                        if ($subtotal > 10000.00) {
                            $descuento = 0.1;
                        }
                        break;
                }
            }
        ?>

        <form action="caso6.php" method="post">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="150">Cliente: </td>
                    <td>
                        <input type="text" name="txtCliente" size="60" value="<?php echo $Cliente; ?>"> 
                    </td>   
                </tr>
                <tr>
                    <td>Producto: </td>
                    <td>
                        <select name="selCategoria">
                            <option value="cocina 6 Hornillas" <?php echo $Producto === 'cocina 6 Hornillas' ? 'selected' : '' ?>> Cocina de 6 Hornillas</option>
                            <option value="refrigeradora" <?php echo $Producto === 'refrigeradora' ? 'selected' : '' ?>> Refrigeradora </option>
                            <option value="television" <?php echo $Producto === 'television' ? 'selected' : '' ?>> Television</option>
                            <option value="lavadora" <?php echo $Producto === 'lavadora' ? 'selected' : '' ?>> Lavadora</option>
                            <option value="radiograbadora" <?php echo $Producto === 'radiograbadora' ? 'selected' : '' ?>> Radiograbadora</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="150">Cantidad: </td>
                    <td>
                        <input type="text" name="txtCantidad" size="10" value="<?php echo $Cantidad; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Procesar">
                    </td>
                    <td>
                    </td>
                </tr>
            </table>
        </form>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $montoAPagar = $subtotal - ($descuento * $subtotal);
                echo "<h2>Resultados:</h2>";
                echo "Precio del Producto: $" . number_format($precio, 2) . "<br>";
                echo "Subtotal: $" . number_format($subtotal, 2) . "<br>";
                echo "Monto de Descuento: $" . number_format($descuento * $subtotal, 2) . "<br>";
                echo "Monto a Pagar: $" . number_format($montoAPagar, 2);
            }
        ?>
    </section>
</body>
</html>


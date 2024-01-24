<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OBSEQUIO A CLIENTES</title>
    <link rel="stylesheet" href="/estilo.css">
    <script>
    function validarTicket() {
        var numeroTicket = document.getElementsByName('txtNumeroTicket')[0].value;

        if (numeroTicket > 20 || numeroTicket < 1) {
            alert('Ticket no válido');
            return false;
        }

        return true;
    }
</script>

</head>
<body>
    <header>
        <h1>OBSEQUIO A CLIENTES</h1>
        <img src="/img/carrito.jpg" width="600" height="350" alt="Imagen de obsequio para clientes">
    </header>
    <section>
        <form action="caso5.php" method="post" onsubmit="return validarTicket();">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>Nombre del Cliente:</td>
                    <td>
                        <input type="text" name="txtNombreCliente" size="50" placeholder="Ingrese nombre del cliente" value="<?php echo isset($_POST['txtNombreCliente']) ? htmlspecialchars($_POST['txtNombreCliente']) : ''; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Monto Total:</td>
                    <td>
                        <input type="text" name="txtMontoTotal" size="20" placeholder="Ingrese monto a pagar" value="<?php echo isset($_POST['txtMontoTotal']) ? htmlspecialchars($_POST['txtMontoTotal']) : ''; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Numero de Ticket:</td>
                    <td>
                        <input type="text" name="txtNumeroTicket" size="30" placeholder="Ingrese numero de ticket obtenido" value="<?php echo isset($_POST['txtNumeroTicket']) ? htmlspecialchars($_POST['txtNumeroTicket']) : ''; ?>" required>
                    </td>
                </tr>
            </table>
            <input type="submit" value="Procesar">
        </form>

        <table border="0" cellpadding="0" cellspacing="0">
            <?php
            if (isset($_POST['txtNumeroTicket'])) {
                $numeroTicket = $_POST['txtNumeroTicket'];
                $descuento = 0;
                $productos = "Sin obsequio";

                if ($numeroTicket >= 1 && $numeroTicket <= 4) {
                    $descuento = 16;
                    $productos = "Canasta con diversos productos";
                } elseif ($numeroTicket >= 5 && $numeroTicket <= 9) {
                    $descuento = 13;
                    $productos = "Saco de azúcar de 50 kg";
                } elseif ($numeroTicket >= 10 && $numeroTicket <= 14) {
                    $descuento = 6;
                    $productos = "Aceite de 5 litros";
                } elseif ($numeroTicket >= 15 && $numeroTicket <= 19) {
                    $descuento = 12;
                    $productos = "Caja de leche de 24 horas grandes";
                } elseif ($numeroTicket == 20) {
                    $descuento = 10;
                    $productos = "Saco de arroz de 50 kg";
                }

                $montoTotal = isset($_POST['txtMontoTotal']) ? floatval($_POST['txtMontoTotal']) : 0;
                $montoConDescuento = $montoTotal - ($montoTotal * $descuento / 100);

                $descuentoFormateado = number_format($descuento, 2) . '%';
                $montoConDescuentoFormateado = number_format($montoConDescuento, 2);

                echo "<tr><td>Monto a Cancelar: </td><td>\$$montoConDescuentoFormateado </td></tr>";

                if ($descuento > 0) {
                    echo "<tr><td>Obsequio Obtenido: </td><td>$productos</td></tr>";
                }
            }
            ?>
        </table>
    </section>
</body>
</html>

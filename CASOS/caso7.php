<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Mensualidad</title>
</head>
<body>
    <header>
        <h1>Mensualidad de Universidad</h1>
        <img src="../img/UNIVERSITARIOS.jpg" width="600" height="350">
    </header>
    <section>
        <?php
            // Iniciar o continuar la sesión
            session_start();

            error_reporting(0);

            // Obtener datos de sesión o del formulario
            $Categoria = isset($_SESSION['categoria']) ? $_SESSION['categoria'] : '';
            $PromedioPonderado = isset($_SESSION['promedio']) ? $_SESSION['promedio'] : '';

            // Inicializar variables
            $montoMensual = 0;
            $descuento = 0;
            $montoCancelar = 0;

            // Procesar formulario
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $Categoria = $_POST['selCategoria'];
                $PromedioPonderado = $_POST['txtPromedio'];

                // Guardar valores en variables de sesión
                $_SESSION['categoria'] = $Categoria;
                $_SESSION['promedio'] = $PromedioPonderado;

                // Calcular monto mensual, descuento y monto a cancelar
                switch ($Categoria) {
                    case 'CategoriaA':
                        if ($PromedioPonderado >= 90) {
                            $montoMensual = 1500.00;
                            $descuento = 0.15;
                        } else {
                            $montoMensual = 2000.00;
                            $descuento = 0.10;
                        }
                        break;

                    case 'CategoriaB':
                        if ($PromedioPonderado >= 85) {
                            $montoMensual = 1800.00;
                            $descuento = 0.12;
                        } else {
                            $montoMensual = 2200.00;
                            $descuento = 0.08;
                        }
                        break;

                    case 'CategoriaC':
                        if ($PromedioPonderado >= 80) {
                            $montoMensual = 2000.00;
                            $descuento = 0.10;
                        } else {
                            $montoMensual = 2500.00;
                            $descuento = 0.05;
                        }
                        break;
                }

                // Calcular monto a cancelar
                $montoCancelar = $montoMensual - ($descuento * $montoMensual);
            }
        ?>

        <form action="nombre_de_tu_archivo.php" method="post">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="150">Categoría: </td>
                    <td>
                        <select name="selCategoria">
                            <option value="CategoriaA" <?php echo $Categoria === 'CategoriaA' ? 'selected' : '' ?>> Categoría A</option>
                            <option value="CategoriaB" <?php echo $Categoria === 'CategoriaB' ? 'selected' : '' ?>> Categoría B</option>
                            <option value="CategoriaC" <?php echo $Categoria === 'CategoriaC' ? 'selected' : '' ?>> Categoría C</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="150">Promedio Ponderado: </td>
                    <td>
                        <input type="text" name="txtPromedio" size="10" value="<?php echo $PromedioPonderado; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Calcular Mensualidad">
                    </td>
                    <td>
                        <input type="reset" value="Limpiar" name="btnLimpiar">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo "<h2>Resultados:</h2>";
                echo "Monto Mensual: $" . number_format($montoMensual, 2) . "<br>";
                echo "Descuento: $" . number_format($descuento * $montoMensual, 2) . "<br>";
                echo "Monto a Cancelar: $" . number_format($montoCancelar, 2);
            }
        ?>
    </section>
</body>
</html>

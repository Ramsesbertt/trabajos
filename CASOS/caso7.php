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
            session_start();

            error_reporting(0);

            $NombreCompleto = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';
            $Categoria = isset($_SESSION['categoria']) ? $_SESSION['categoria'] : '';
            $PromedioPonderado = isset($_SESSION['promedio']) ? $_SESSION['promedio'] : '';

            $montoMensual = 0;
            $descuento = 0;
            $montoCancelar = 0;
            $mensajeErrorNombre = '';
            $mensajeErrorCategoria = '';
            $mensajeErrorPromedio = '';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $NombreCompleto = $_POST['txtNombre'];
                $Categoria = $_POST['selCategoria'];
                $PromedioPonderado = $_POST['txtPromedio'];

                $_SESSION['nombre'] = $NombreCompleto;
                $_SESSION['categoria'] = $Categoria;
                $_SESSION['promedio'] = $PromedioPonderado;

                if (empty($NombreCompleto)) {
                    $mensajeErrorNombre = 'Debe ingresar el nombre del alumno.';
                } elseif ($Categoria == 'Seleccionar') {
                    $mensajeErrorCategoria = 'Debe seleccionar una categoría.';
                } elseif (!is_numeric($PromedioPonderado) || $PromedioPonderado < 12 || $PromedioPonderado > 20) {
                    $mensajeErrorPromedio = 'Debe registrar correctamente el promedio.';
                } else {
                    switch ($Categoria) {
                        case 'CategoriaA':
                            $montoMensual = 850.00;
                            break;
                        case 'CategoriaB':
                            $montoMensual = 750.00;
                            break;
                        case 'CategoriaC':
                            $montoMensual = 650.00;
                            break;
                        case 'CategoriaD':
                            $montoMensual = 500.00;
                            break;
                    }

                    if ($PromedioPonderado == 12) {
                        $descuento = 0;
                    } elseif ($PromedioPonderado >= 13 && $PromedioPonderado <= 15) {
                        $descuento = 0.10;
                    } elseif ($PromedioPonderado >= 16 && $PromedioPonderado <= 17) {
                        $descuento = 0.15;
                    } elseif ($PromedioPonderado >= 18 && $PromedioPonderado <= 19) {
                        $descuento = 0.25;
                    } elseif ($PromedioPonderado == 20) {
                        $descuento = 0.50;
                    }

                    $montoCancelar = $montoMensual - ($descuento * $montoMensual);
                }
            }
        ?>

        <form action="caso7.php" method="post">
            <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="150">Nombre Completo: </td>
                    <td>
                        <input type="text" name="txtNombre" size="30" value="<?php echo $NombreCompleto; ?>">
                        <span style="color: red;"><?php echo $mensajeErrorNombre; ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="150">Categoría: </td>
                    <td>
                        <select name="selCategoria">
                            <option value="Seleccionar">Seleccione Categoría</option>
                            <option value="CategoriaA" <?php echo $Categoria === 'CategoriaA' ? 'selected' : '' ?>> Categoría A</option>
                            <option value="CategoriaB" <?php echo $Categoria === 'CategoriaB' ? 'selected' : '' ?>> Categoría B</option>
                            <option value="CategoriaC" <?php echo $Categoria === 'CategoriaC' ? 'selected' : '' ?>> Categoría C</option>
                            <option value="CategoriaD" <?php echo $Categoria === 'CategoriaD' ? 'selected' : '' ?>> Categoría D</option>
                        </select>
                        <span style="color: red;"><?php echo $mensajeErrorCategoria; ?></span>
                    </td>
                </tr>
                <tr>
                    <td width="150">Promedio Ponderado: </td>
                    <td>
                        <input type="text" name="txtPromedio" size="10" value="<?php echo $PromedioPonderado; ?>">
                        <span style="color: red;"><?php echo $mensajeErrorPromedio; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Procesar" onclick="ocultarMensajesError()">
                    </td>
                    <td>
                    </td>
                </tr>
            </table>
        </form>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && $mensajeError == '') {
                echo "<h2>Resultados:</h2>";
                echo "Monto Mensual: $" . number_format($montoMensual, 2) . "<br>";
                echo "Descuento: $" . number_format($descuento * $montoMensual, 2) . "<br>";
                echo "Monto a Cancelar: $" . number_format($montoCancelar, 2);
            }
        ?>
    </section>
    <script>
        function ocultarMensajesError() {
            document.getElementById('mensajeNombre').innerHTML = '';
            document.getElementById('mensajeCategoria').innerHTML = '';
            document.getElementById('mensajePromedio').innerHTML = '';
        }
    </script>
</body>
</html>

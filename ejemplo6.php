<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manejo de constantes</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <header>
        <h3>Manejo de constantes</h3>
    </header>
    <section>
        <?php
        define("PI",3.1416);
        define("IGV", 0.18);

        $radio = 12;
        $valorVenta = 250.50;

        $area = PI * $radio * $radio;
        $impuesto = $valorVenta * IGV;

        echo "<br>El área del circulo con radio $radio es $area";
        echo "<br>El impuesto a la venta de $valorVenta es $impuesto";
        ?>
    </section>
    <footer>
        <h6>Todos los derechos reservados @Eduardo</h6>
    </footer>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manejo de operadores</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <header>
        <h3>Manejo de Varialbes en PHP</h3>
    </header>
    <section>
        <?php
            /**
             * $a = pow(2,5);
             * $b = sqrt(5);
             */
        $trabajador = "Hector Men Lee";
        $fechaNacimiento = "29/02/1995";
        $numeroHijos = 2;
        $sueldo = 950.50;
        $activo = true;
        echo "<br> Valor de Variable "." -> "."Tipo de Dato";
        echo "<br>" .$trabajador. " -> ".gettype($trabajador);
        echo "<br>" .$fechaNacimiento. " -> ".gettype($fechaNacimiento);
        echo "<br>" .$numeroHijos. " -> ".gettype($numeroHijos);
        echo "<br>" .$sueldo. " -> ".gettype($sueldo);
        echo "<br>" .$activo. " -> ".gettype($activo);

        ?>
    </section>
    <footer>
        <h6>Todos los derechos reservados @Eduardo</h6>
    </footer>

</body>
</html>
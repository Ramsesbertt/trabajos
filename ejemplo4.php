<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operadores de PHP</title>
</head>
<body>
    <header>
        <h3>Operadores en PHP</h3>
    </header>
    <section>
        <?php
         /*
            Operadores aritmeticos:
            + Suma              $a = $b + $c
            - Resta                 $a = $b - $c
            * Multiplicación        $a = $b * $c
            / División entera       $a = $b / $c
            % Resto de la división  $a = $b % $c
            */

            /* Operadores de cadena de caracteres:

            . punto ( sirve para unir o concatenar cadena de caracteres)
            
             */

             $a = 15;
             $cadena = $a . " <br> nota final del curso";
             echo $cadena;
             printf("<br>La nota final del curso es %.2f",$a);
        ?>
    </section>
    <footer>

    </footer>
</body>
</html>
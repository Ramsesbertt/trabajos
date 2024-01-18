<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - HTML5</title>
    <link rel="stylesheet" href="estilo.css">
    
</head>

<body>
    <header>
        <h3>Fundamentos de Programación Web</h3>
    </header>
    <section>
        <?php
        // echo "";
        // echo '';
            echo "<br>1. Integrar codigo PHP en HTML5";
            echo "<br>2. Página estática versus Página Dinámica";
            echo "<br>3. Manejo de variables en PHP";
            // printf("mensaje");
            printf("<br>El sueldo básico es: ");
            printf("<h3>El Sueldo básico es: </h3>");

            $sueldoBasico = 350;
            printf("El sueldo básico es: %.3f",$sueldoBasico);
        ?>
    </section>
    <footer>
        <h6>Todo los derechos reservados - Men Lee Hector</h6>
    </footer>
</body>

</html>
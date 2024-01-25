<?php
echo "<h4>Números pares en filas de 5: <h4>";
for ($i = 2; $i <= 1000; $i += 2) {
    echo $i . " ";
    if ($i % 10 == 0) {
        echo "<br>";
    }
}
echo "<br><br>";
echo "<br><br>";


echo "Números pares en filas de 10: <br>";
for ($i = 2; $i <= 1000; $i += 2) {
    echo $i . " ";
    if ($i % 20 == 0) {
        echo "<br>";
    }
}
echo "<br><br>";
echo "<br><br>";


echo "Números pares en filas de 15: <br>";
for ($i = 2; $i <= 1000; $i += 2) {
    echo $i . " ";
    if ($i % 30 == 0) {
        echo "<br>";
    }
}
?>

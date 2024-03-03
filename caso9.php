<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta de Productos</title>
</head>
<body>
    <img src="imagen.jpg" alt="Imagen de productos" width="400">
    <h2>VENTA DE PRODUCTOS</h2>
    <form action="" method="post" onsubmit="event.preventDefault(); calcularBoleta();">
        <label for="producto">Producto:</label>
        <select name="producto" id="producto" onchange="calcularPrecio()">
            <option value="lavadora">Lavadora</option>
            <option value="refrigeradora">Refrigeradora</option>
            <option value="radiograbadora">Radiograbadora</option>
            <option value="tostadora">Tostadora</option>
        </select><br><br>
        <label for="precio">Precio:</label>
        <input type="text" name="precio" id="precio" readonly><br><br>
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" min="1" oninput="calcularSubtotal()"><br><br>
        <label for="subtotal">Subtotal:</label>
        <input type="text" name="subtotal" id="subtotal" readonly><br><br>
        <label for="cuotas">Cuotas:</label>
        <select name="cuotas" id="cuotas">
            <?php
            for ($i = 1; $i <= 10; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select><br><br>
        <input type="submit" value="Comprar">
    </form>

    <div id="boleta" style="display: none;">
        <h3>Boleta</h3>
        <div id="boletaDetalle"></div>
    </div>

    <script>
        function calcularPrecio() {
            var producto = document.getElementById('producto').value;
            var precio;

            switch (producto) {
                case 'lavadora':
                    precio = 1500.00;
                    break;
                case 'refrigeradora':
                    precio = 3500.00;
                    break;
                case 'radiograbadora':
                    precio = 500.00;
                    break;
                case 'tostadora':
                    precio = 150.00;
                    break;
                default:
                    precio = 0.00;
                    break;
            }

            document.getElementById('precio').value = "$" + precio.toFixed(2);
            calcularSubtotal();
        }

        function calcularSubtotal() {
            var cantidad = document.getElementById('cantidad').value;
            var precio = parseFloat(document.getElementById('precio').value.slice(1));
            var subtotal = precio * cantidad;
            document.getElementById('subtotal').value = "$" + subtotal.toFixed(2);
        }

        function calcularBoleta() {
            var cuotas = document.getElementById('cuotas').value;
            var subtotal = parseFloat(document.getElementById('subtotal').value.slice(1));
            var montoCuota = subtotal / cuotas;

            var boletaDetalle = document.getElementById('boletaDetalle');
            boletaDetalle.innerHTML = '';

            for (var i = 1; i <= cuotas; i++) {
                boletaDetalle.innerHTML += "<p>N° Letras: " + i + ", Monto: $" + montoCuota.toFixed(2) + "</p>";
            }

            document.getElementById('boleta').style.display = 'block';
        }
    </script>
</body>
</html>

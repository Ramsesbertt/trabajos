<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa Mirkus</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            width: 80%;
            max-width: 600px;
            margin: auto;
        }

        .titulo {
            color: red;
            font-weight: bold;
            font-family: 'Arial', sans-serif;
        }

        .formulario {
            margin-top: 20px;
        }

        .fila {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 300px;
        }

        .botones {
            margin-top: 20px;
        }

        .botones button {
            margin: 0 10px;
            padding: 10px 20px;
            font-size: 16px;
        }

        .resultados {
            margin-top: 20px;
            text-align: center;
        }


        .resultado-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .resultado-label {
            font-weight: bold;
        }
    </style>
    <script>
        function procesar() {

            var nombre = document.getElementById("nombre").value;
            var horasTrabajadas = parseFloat(document.getElementById("horas").value);
            var tarifaHora = parseFloat(document.getElementById("tarifa").value);


            var sueldoBruto = horasTrabajadas * tarifaHora;


            var descuentoEssalud = sueldoBruto * 0.0675;
            var descuentoAfp = sueldoBruto * 0.1305;


            var sueldoNeto = sueldoBruto - descuentoEssalud - descuentoAfp;


            document.getElementById("nombreResultado").innerText = nombre;
            document.getElementById("horasResultado").innerText = horasTrabajadas.toFixed(2);
            document.getElementById("tarifaResultado").innerText = tarifaHora.toFixed(2);
            document.getElementById("sueldoBrutoResultado").innerText = sueldoBruto.toFixed(2) + " S/";
            document.getElementById("descuentoEssaludResultado").innerText = descuentoEssalud.toFixed(2) + " S/";
            document.getElementById("descuentoAfpResultado").innerText = descuentoAfp.toFixed(2) + " S/";
            document.getElementById("sueldoNetoResultado").innerText = sueldoNeto.toFixed(2) + " S/";
        }

        function limpiar() {

            document.getElementById("nombre").value = "";
            document.getElementById("horas").value = "";
            document.getElementById("tarifa").value = "";
            document.getElementById("nombreResultado").innerText = "";
            document.getElementById("horasResultado").innerText = "";
            document.getElementById("tarifaResultado").innerText = "";
            document.getElementById("sueldoBrutoResultado").innerText = "";
            document.getElementById("descuentoEssaludResultado").innerText = "";
            document.getElementById("descuentoAfpResultado").innerText = "";
            document.getElementById("sueldoNetoResultado").innerText = "";
        }
    </script>
</head>

<body>
    <div class="container">
        <h1 class="titulo">Pago a Empleados</h1>

        <div class="formulario">
            <div class="fila">
                <label for="nombre">Empleado:</label>
                <input type="text" id="nombre" name="nombre">
            </div>

            <div class="fila">
                <label for="horas">Horas Trabajadas:</label>
                <input type="text" id="horas" name="horas">
            </div>

            <div class="fila">
                <label for="tarifa">Tarifa por Hora:</label>
                <input type="text" id="tarifa" name="tarifa">
            </div>
        </div>

        <div class="botones">
            <button type="button" onclick="procesar()">Procesar</button>
            <button type="button" onclick="limpiar()">Limpiar</button>
        </div>

        <div class="resultados">
            <div class="resultado-item">
                <span class="resultado-label">Empleado:</span>
                <span id="nombreResultado"></span>
            </div>
            <div class="resultado-item">
                <span class="resultado-label">Horas Trabajadas:</span>
                <span id="horasResultado"></span>
            </div>
            <div class="resultado-item">
                <span class="resultado-label">Tarifa por Hora:</span>
                <span id="tarifaResultado"></span>
            </div>
            <div class="resultado-item">
                <span class="resultado-label">Sueldo Bruto:</span>
                <span id="sueldoBrutoResultado"></span>
            </div>
            <div class="resultado-item">
                <span class="resultado-label">Descuento ESSALUD:</span>
                <span id="descuentoEssaludResultado"></span>
            </div>
            <div class="resultado-item">
                <span class="resultado-label">Descuento AFP:</span>
                <span id="descuentoAfpResultado"></span>
            </div>
            <div class="resultado-item">
                <span class="resultado-label">Sueldo Neto:</span>
                <span id="sueldoNetoResultado"></span>
            </div>
        </div>
    </div>
</body>

</html>

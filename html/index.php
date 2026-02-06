<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Eric</title>
    <style>
        body { font-family: sans-serif; text-align: center; padding: 50px; }
        #resultado { margin-top: 20px; padding: 10px; border: 1px solid #ddd; display: inline-block; min-width: 300px; }
        button { padding: 10px 20px; background-color: #007bff; color: white; border: none; cursor: pointer; border-radius: 5px; }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>

    <h1>Consulta de Base de Datos</h1>
    <button id="btnConsultar">Obtener mis datos</button>

    <div id="resultado">Los datos aparecerán aquí...</div>

    <script>
        document.getElementById('btnConsultar').addEventListener('click', function() {
            const divResultado = document.getElementById('resultado');
            divResultado.innerHTML = "Consultando...";

            // Llamada AJAX a datos.php
            fetch('datos.php')
                .then(response => response.text())
                .then(data => {
                    divResultado.innerHTML = data;
                })
                .catch(error => {
                    divResultado.innerHTML = "Error al consultar los datos.";
                    console.error('Error:', error);
                });
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes de invitación</title>
    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">
    <style>
        /* Estilos para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .btn-details {
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-details:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <main>
            <h3>Lista de Invitados Aprobados</h3>
            <!-- Aquí va el código para mostrar la lista de invitados aprobados -->

            <h3>Registrar Entrada y Salida</h3>
            <!-- Aquí va el código para registrar la entrada y salida de los invitados -->

            <h3>Solicitudes de Invitación</h3>
            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Ejemplo de fila de tabla -->
                    <tr>
                        <td>2024-07-10</td>
                        <td>Aprobada</td>
                        <td>
                            <button class="btn-details">Detalles</button>
                        </td>
                    </tr>
                    <!-- Puedes repetir esta estructura para cada solicitud -->
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>

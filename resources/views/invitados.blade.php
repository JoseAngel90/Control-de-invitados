<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitados del Día</title>
    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">
    <!-- Incluir Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        .btn-checkin {
            padding: 8px 12px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }
        .btn-checkin:hover {
            background-color: #218838;
        }
        .btn-cancel {
            padding: 8px 12px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-cancel:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <main>
            <h3>Invitados del Día</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha de Llegada</th>
                        <th>Hora de Llegada</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Ejemplo de fila de tabla -->
                    <tr>
                        <td>John Doe</td>
                        <td>2024-07-10</td>
                        <td>10:00 AM</td>
                        <td>
                            <button class="btn-checkin">Check-In</button>
                            <button class="btn-cancel">Cancelar</button>
                        </td>
                    </tr>
                    <!-- Puedes repetir esta estructura para cada invitado -->
                </tbody>
            </table>
        </main>
    </div>

    <!-- Incluir Bootstrap JS y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

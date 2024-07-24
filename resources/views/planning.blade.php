<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Área de Planeación</title>
    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">
    <style>
        /* Estilos específicos para las tarjetas */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-top: 20px;
        }

        .card {
            width: calc(50% - 10px);
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            border-left: 5px solid;
        }

        .card-header {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-body {
            color: #555;
            font-size: 24px;
            text-align: center;
        }

        .card.success {
            border-color: #28a745; /* Verde para solicitudes aprobadas */
        }

        .card.warning {
            border-color: #ffc107; /* Amarillo para solicitudes pendientes */
        }

        .card.danger {
            border-color: #dc3545; /* Rojo para solicitudes rechazadas */
        }
    </style>
</head>
<body>
    <div class="container">
        <main>
            <h3>Resumen de Solicitudes</h3>

            <div class="card-container">
                <div class="card success">
                    <div class="card-header">Aprobadas</div>
                    <div class="card-body">
                        {{ $aprobadas }}
                    </div>
                </div>

                <div class="card warning">
                    <div class="card-header">Pendientes</div>
                    <div class="card-body">
                        {{ $pendientes }}
                    </div>
                </div>
            </div>

            <div class="card-container">
                <div class="card danger">
                    <div class="card-header">Rechazadas</div>
                    <div class="card-body">
                        {{ $rechazadas }}
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Del Día</div>
                    <div class="card-body">
                        {{ $delDia }}
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Vigilancia</title>
    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">
    <style>
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
            border-color: #28a745; /* Verde para invitados que ya pasaron */
        }

        .card.warning {
            border-color: #ffc107; /* Amarillo para invitados que están próximos */
        }

        .card.danger {
            border-color: #dc3545; /* Rojo para invitados que vendrán hoy */
        }
    </style>
</head>
<body>
    <div class="container">
        <main>
            <h3>Resumen de Invitados</h3>

            <div class="card-container">
                <div class="card danger">
                    <div class="card-header">Invitados Hoy</div>
                    <div class="card-body">
                        {{ $invitadosHoy }}
                    </div>
                </div>

                <div class="card success">
                    <div class="card-header">Invitados Pasados</div>
                    <div class="card-body">
                        {{ $invitadosPasados }}
                    </div>
                </div>
            </div>

            <div class="card-container">
                <div class="card warning">
                    <div class="card-header">Próximos Invitados</div>
                    <div class="card-body">
                        {{ $invitadosFuturos }}
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Total Invitados</div>
                    <div class="card-body">
                        {{ $totalInvitados }}
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

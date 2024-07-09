<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes de invitación</title>
    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">
    <!-- Incluir Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
        .modal-content {
            padding: 20px;
        }
        .modal-header {
            border-bottom: none;
        }
        .nav-tabs .nav-link {
            cursor: pointer;
        }
        .tab-pane {
            padding: 20px 0;
        }
        .details-section {
            margin-bottom: 20px;
        }
        .details-section h5 {
            margin-bottom: 5px;
        }
        .details-section p {
            margin-bottom: 5px;
        }
        /* Estilo para las columnas en detalles */
        .details-columns {
            column-count: 2;
            column-gap: 20px;
        }
        /* Ajuste de estilo para contenido */
        .details-section p {
            margin-bottom: 10px;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <div class="container mb-4">
        <main>
            <h3>Solicitudes de Acceso</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>2024-07-10</td>
                        <td>John Doe</td>
                        <td>Aprobada</td>
                        <td>
                            <button class="btn-details" data-toggle="modal" data-target="#solicitudModal">Detalles</button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </main>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="solicitudModal" tabindex="-1" role="dialog" aria-labelledby="solicitudModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="solicitudModalLabel">Detalles de Solicitud</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Pestañas -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="true">Detalles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="status-tab" data-toggle="tab" href="#status" role="tab" aria-controls="status" aria-selected="false">Estado</a>
                        </li>
                    </ul>
                    <!-- Contenido de las pestañas -->
                    <div class="tab-content" id="myTabContent">
                        <!-- Pestaña de Detalles -->
                        <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <div class="details-columns">
                                <div class="details-section">
                                    <h5>Nombre del invitado:</h5>
                                    <p>John Doe</p>
                                </div>
                                <div class="details-section">
                                    <h5>Asunto de la visita:</h5>
                                    <p>Reunión de trabajo</p>
                                </div>
                                <div class="details-section">
                                    <h5>Origen del invitado:</h5>
                                    <p>Ciudad X</p>
                                </div>
                                <div class="details-section">
                                    <h5>Persona que atenderá al invitado:</h5>
                                    <p>Jane Smith</p>
                                </div>
                                <div class="details-section">
                                    <h5>Persona con la que tiene o pide la cita:</h5>
                                    <p>CEO Juan Perez</p>
                                </div>
                                <div class="details-section">
                                    <h5>Horario de llegada y fecha de la visita:</h5>
                                    <p>10:00 AM, 2024-07-10</p>
                                </div>
                            </div>
                        </div>
                        <!-- Pestaña de Estado -->
                        <div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="status-tab">
                            <div class="text-center">
                                <i class="fas fa-check-circle fa-5x text-success"></i>
                                <p class="mt-2">Aprobada</p>                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success">Aprobar</button>
                                    <button type="button" class="btn btn-danger">Desaprobar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Incluir Bootstrap JS y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

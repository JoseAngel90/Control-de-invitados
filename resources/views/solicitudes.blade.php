<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes de invitación</title>
    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        .details-columns {
            column-count: 2;
            column-gap: 20px;
        }
        .details-section p {
            margin-bottom: 10px;
            line-height: 1.5;
        }
        .btn-add {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mb-4">
        <main>
            <h3>Solicitudes de Acceso</h3>
            @if(Auth::user()->rol_id == 2)
            <div class="text-left">
                <button class="btn btn-primary btn-add" data-toggle="modal" data-target="#newGuestModal">
                    <i class="fas fa-plus"></i> Nueva Solicitud
                </button>
            </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($solicitudes as $solicitud)
                    <tr>
                        <td>{{ $solicitud->id }}</td>
                        <td>{{ $solicitud->arrival_time->format('d-m-Y H:i') }}</td>
                        <td>{{ $solicitud->guest_name }}</td>
                        <td>{{ $solicitud->status }}</td>
                        <td>
                            <button class="btn-details" data-toggle="modal" data-target="#solicitudModal" data-id="{{ $solicitud->id }}">
                                Detalles
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </main>
    </div>

    <!-- Modal para nueva solicitud -->
    <div class="modal fade" id="newGuestModal" tabindex="-1" role="dialog" aria-labelledby="newGuestModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newGuestModalLabel">Solicitud de Nuevo Invitado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('solicitudes.store') }}" method="POST" id="guestRequestForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guestName">Nombre del invitado</label>
                                    <input type="text" class="form-control" name="guestName" id="guestName" required>
                                </div>
                                <div class="form-group">
                                    <label for="visitSubject">Asunto de la visita</label>
                                    <input type="text" class="form-control" name="visitSubject" id="visitSubject" required>
                                </div>
                                <div class="form-group">
                                    <label for="guestOrigin">Origen del invitado</label>
                                    <input type="text" class="form-control" name="guestOrigin" id="guestOrigin" required>
                                </div>
                                <div class="form-group">
                                    <label for="attendee">Persona que atenderá al invitado</label>
                                    <input type="text" class="form-control" name="attendee" id="attendee" required>
                                </div>
                                <div class="form-group">
                                    <label for="appointmentPerson">Persona con la que tiene o pide la cita</label>
                                    <input type="text" class="form-control" name="appointmentPerson" id="appointmentPerson" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="arrivalTime">Horario de llegada y fecha de la visita</label>
                                    <input type="datetime-local" class="form-control" name="arrivalTime" id="arrivalTime" required>
                                </div>
                                <div class="form-group">
                                    <label for="additionalGuest">Datos personales de personas adicionales que acompañan al invitado</label>
                                    <input type="text" class="form-control" name="additionalGuest" id="additionalGuest" placeholder="Nombre completo">
                                </div>
                                <div class="form-group">
                                    <label for="vehicleDetails">Detalles del vehículo (si aplica)</label>
                                    <input type="text" class="form-control" name="vehicleDetails" id="vehicleDetails" placeholder="Detalles del vehículo">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="true">Detalles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="status-tab" data-toggle="tab" href="#status" role="tab" aria-controls="status" aria-selected="false">Estado</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                        <form id="solicitudDetailsForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="details-section">
                                        <h5>Nombre del invitado:</h5>
                                        <input type="text" class="form-control" name="guest_name" disabled>
                                    </div>
                                    <div class="details-section">
                                        <h5>Asunto de la visita:</h5>
                                        <input type="text" class="form-control" name="visit_subject" disabled>
                                    </div>
                                    <div class="details-section">
                                        <h5>Origen del invitado:</h5>
                                        <input type="text" class="form-control" name="guest_origin" disabled>
                                    </div>
                                    <div class="details-section">
                                        <h5>Datos de invitados adicionales:</h5>
                                        <input type="text" class="form-control" name="additional_guest" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="details-section">
                                        <h5>Persona que atenderá al invitado:</h5>
                                        <input type="text" class="form-control" name="attendee" disabled>
                                    </div>
                                    <div class="details-section">
                                        <h5>Persona con la que tiene o pide la cita:</h5>
                                        <input type="text" class="form-control" name="appointment_person" disabled>
                                    </div>
                                    <div class="details-section">
                                        <h5>Horario de llegada y fecha de la visita:</h5>
                                        <input type="text" class="form-control" name="arrival_time" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="details-section">
                                        <h5>Detalles del vehículo:</h5>
                                        <input type="text" class="form-control" name="vehicle_details" disabled>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="status-tab">
                        <div class="text-center">
                            <i class="fas fa-check-circle fa-5x text-success"></i>
                            <p class="mt-2">Aprobada</p>
                            @if(Auth::user()->rol_id == 1)             
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success">Aprobar</button>
                                <button type="button" class="btn btn-danger">Desaprobar</button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <!-- Incluir Bootstrap JS y jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
       $(document).ready(function() {
            $('#guestRequestForm').on('submit', function(event) {
                event.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response.success);
                        location.reload();
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = '';
                        for (let key in errors) {
                            errorMessage += errors[key].join(', ') + '\n';
                        }
                        alert(errorMessage);
                    }
                });
            });

            $('.btn-details').on('click', function() {
                let solicitudId = $(this).data('id');

                $.ajax({
                    url: '{{ url("solicitudes") }}/' + solicitudId,
                    method: 'GET',
                    success: function(response) {
                        console.log(response);
                        $('#solicitudDetailsForm input[name="guest_name"]').val(response.guest_name);
                        $('#solicitudDetailsForm input[name="visit_subject"]').val(response.visit_subject);
                        $('#solicitudDetailsForm input[name="guest_origin"]').val(response.guest_origin);
                        $('#solicitudDetailsForm input[name="attendee"]').val(response.attendee);
                        $('#solicitudDetailsForm input[name="appointment_person"]').val(response.appointment_person);
                        $('#solicitudDetailsForm input[name="arrival_time"]').val(response.arrival_time);
                        $('#solicitudDetailsForm input[name="vehicle_details"]').val(response.vehicle_details || 'N/A');

                        $('#solicitudModal').modal('show');
                    },
                    error: function() {
                        alert('Error al obtener los detalles de la solicitud.');
                    }
                });
            });


        }); 

    </script>

</body>
</html>

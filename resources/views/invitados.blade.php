<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitados del Día</title>
    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
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
                        <th>Quien atiende</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invitados as $invitado)
                    @if ($invitado->status == "Aprobado")
                    <tr data-id="{{ $invitado->id }}">
                        <td>{{ $invitado->guest_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($invitado->arrival_time)->format('Y-m-d') }}</td>
                        <td>{{ \Carbon\Carbon::parse($invitado->arrival_time)->format('h:i A') }}</td>
                        <td>{{ $invitado->attendee }}</td>
                        <td>
                            <button class="btn-checkin">Check-In</button>
                            <button class="btn-cancel">Inasistencia</button>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn-checkin').on('click', function() {
                var row = $(this).closest('tr');
                var id = row.data('id'); // Ensure each row has data-id attribute with the solicitud ID

                $.ajax({
                    url: '{{ url("check-in") }}/' + id,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert(response.success);
                        location.reload(); // Reload the page to see the changes
                    },
                    error: function(response) {
                        alert(response.responseJSON.error);
                    }
                });
            });
            $('.btn-cancel').on('click', function() {
                var row = $(this).closest('tr');
                var id = row.data('id'); // Ensure each row has data-id attribute with the solicitud ID

                $.ajax({
                    url: '{{ url("cancel") }}/' + id,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert(response.success);
                        location.reload(); // Reload the page to see the changes
                    },
                    error: function(response) {
                        alert(response.responseJSON.error);
                    }
                });
            });
        });
    </script>
</body>
</html>

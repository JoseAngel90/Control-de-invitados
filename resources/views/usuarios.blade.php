<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">
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
        .btn-actions {
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }
        .btn-actions:hover {
            background-color: #0056b3;
        }
        .btn-delete {
            background-color: #dc3545;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
        .add-user-button {
            text-align: right;
            margin-bottom: 10px;
        }
        .modal-dialog {
            max-width: 400px;
        }
    </style>
</head>
<body>
    <div class="container">
        <main>

            <h3>Gestión de Usuarios</h3>
            <div class="add-user-button">
                <button class="btn-actions" data-toggle="modal" data-target="#addUserModal">
                    <i class="fas fa-plus"></i>Agregar Usuario
                </button>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr data-id="{{ $usuario->id }}">
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        @if ($usuario->rol_id==1)
                            <td>Administrador</td>
                        @elseif ($usuario->rol_id==2)
                            <td>Registrante</td>
                        @elseif ($usuario->rol_id==3)
                            <td>Vigilante</td>
                        @endif
                        <td>{{ $usuario->status }}</td>
                        <td>
                            @if ($usuario->status == "Habilitado")
                                <button class="btn-actions btn-deshabilitar">Deshabilitar</button>
                            @else
                                <button class="btn-actions btn-habilitar">Habilitar</button>
                            @endif
                            <button class="btn-actions btn-delete">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </div>

    <!-- Modal Agregar Usuario -->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Agregar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addUserForm">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="rol">Rol</label>
                            <select class="form-control" id="rol" name="rol" required>
                                <option value="admin">Admin</option>
                                <option value="registrante">Registrante</option>
                                <option value="vigilante">Vigilante</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- AJAX Script -->
    <script>
        $(document).ready(function() {
            // Handle form submission
            $('#addUserForm').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                $.ajax({
                    url: '{{ route('usuarios.store') }}',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert("Registro de usuario correcto");
                        $('#addUserModal').modal('hide');
                        location.reload(); // Reload the page to update the table
                    },
                    error: function(xhr) {
                        alert('Error: ' + xhr.responseJSON.message);
                    }
                });
            });

            // Handle enable/disable actions
            $('table').on('click', '.btn-habilitar, .btn-deshabilitar, .btn-delete', function(e) {
                e.preventDefault();

                var button = $(this);
                var row = button.closest('tr');
                var userId = row.data('id');
                var action = button.hasClass('btn-habilitar') ? 'habilitar' : (button.hasClass('btn-deshabilitar') ? 'deshabilitar' : 'eliminar');

                $.ajax({
                    url: '{{ route('usuarios.updateStatus') }}', // Define this route in your routes file
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: userId,
                        action: action
                    },
                    success: function(response) {
                        alert(response.success);
                        row.find('td').eq(3).text(response.newStatus); // Update status column
                        location.reload();
                    },
                    error: function(xhr) {
                        alert('Error: ' + xhr.responseJSON.message);
                    }
                });
            });
        });
    </script>
</body>
</html>

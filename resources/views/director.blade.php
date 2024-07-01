<h1>Holiwi admin</h1>

<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Director de Carrera</title>
    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">
</head>
<body>
    <div class="container">
        <header class="admin">
            <h2>Bienvenido, {{ Auth::user()->name }}!</h2>
            <div>
                <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                    @csrf
                </form>
            </div>
        </header>
        <main>
            <h3>Crear Solicitud de Acceso</h3>
            <form method="POST" action="{{ route('solicitudes.store') }}">
                @csrf
                < Campos del formulario 
                <label for="nombre">Nombre del invitado:</label>
                <input type="text" name="nombre" id="nombre" required>
                 Otros campos 
                <button type="submit">Enviar Solicitud</button>
            </form>
            <h3>Estado de Solicitudes Enviadas</h3>
            Código para mostrar el estado de las solicitudes enviadas 
        </main>
    </div>
</body>
</html> -->

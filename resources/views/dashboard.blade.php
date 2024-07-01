<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">
</head>

<body>
    <div class="container">
        <header class="
            @if (Auth::user()->rol_id == 1)
                admin
            @elseif (Auth::user()->rol_id == 2)
                planeacion
            @elseif (Auth::user()->rol_id == 3)
                vigilancia
            @endif
        ">
            <h2>Bienvenido, {{ Auth::user()->name }}!</h2>
            <div>
                <a href="{{ url('/logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                    @csrf
                </form>
            </div>
        </header>
        <main>
            <!-- Aquí puedes colocar el contenido principal del dashboard -->
            <p>Contenido del dashboard aquí.</p>

            @if (Auth::user()->rol_id == 1)
                @include("Director");
            @elseif (Auth::user()->rol_id == 2)
                @include("planning");
            @elseif (Auth::user()->rol_id == 3)
                @include("security");
            @endif



        </main>
    </div>
</body>

</html>
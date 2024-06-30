<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h2>Welcome</h2>
        <p>Bienvenido a la aplicación de control de invitados.</p>
        <a href="{{ url('/login') }}">Login</a>
    </div>
</body>
</html>

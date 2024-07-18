<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('login.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #802434; /* Color guinda */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: white;
            padding: 30px;
            border-radius: 15px; /* Redondear los bordes del formulario */
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1); /* Sombra ligera */
            position: relative; /* Para posicionar de manera absoluta el logo */
        }

        h1 {
            text-align: center;
            color: #802434; /* Color de texto guinda */
            position: relative; /* Para permitir el posicionamiento del logo */
            z-index: 1; /* Asegura que el texto esté sobre el logo */
        }

        .logo {
            position: absolute;
            top: -50px; /* Ajusta la posición vertical del logo */
            left: 50%; /* Centra el logo horizontalmente */
            transform: translateX(-50%); /* Centra completamente el logo */
            width: 150px; /* Ancho del logo */
            z-index: 0; /* Asegura que el logo esté detrás del texto */
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #802434; /* Color de texto guinda */
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #802434; /* Color guinda para el botón */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            width: 100%;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background-color: #6a1b2d; /* Color guinda más oscuro al pasar el cursor */
        }

        .error-message {
            background-color: #f8d7da; /* Color de fondo del mensaje de error */
            color: #dc3545; /* Color de texto del mensaje de error */
            border: 1px solid #f5c6cb; /* Borde del mensaje de error */
            border-radius: 5px; /* Redondeo de bordes */
            padding: 10px; /* Espacio interno del mensaje de error */
            margin-bottom: 15px; /* Margen inferior del mensaje de error */
        }

        .success-message {
            background-color: #d4edda; /* Color de fondo del mensaje de éxito */
            color: #155724; /* Color de texto del mensaje de éxito */
            border: 1px solid #c3e6cb; /* Borde del mensaje de éxito */
            border-radius: 5px; /* Redondeo de bordes */
            padding: 10px; /* Espacio interno del mensaje de éxito */
            margin-bottom: 15px; /* Margen inferior del mensaje de éxito */
        }


        
    </style>
</head>
<body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <div>
                <img class="logo" src="Logo.png" alt="Logo UPTx">
                <h1>Ingrese su usuario</h1>
            </div>

            <!-- Mostrar mensaje de error -->
            @if ($errors->any())
                <div class="error-message">
                    <strong>Error:</strong> Las credenciales proporcionadas no coinciden con nuestros registros.
                </div>
            @endif

            <!-- Mostrar mensaje de éxito -->
            @if (session('status'))
                <div class="success-message">
                    {{ session('status') }}
                </div>
            @endif
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit">Login</button>
        </div>
    </form>
</body>
</html>

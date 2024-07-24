<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        #wrapper {
            display: flex;
            width: 100%;
            height: 100vh;
        }
        #sidebar {
            width: 250px;
            background: #FFFFFF;
            color: #802434;
        }
        #sidebar .nav-link {
            color: #802434;
            transition: 0.3s;
            margin: 5px;
            padding: 10px;
        }
        #sidebar .nav-link:hover {
            background-color: #f8d7da;
            color: #dc3545;
        }
        #sidebar .nav-item.active .nav-link {
            background-color: #dc3545;
            color: white;
        }
        #content-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        #content {
            flex: 1;
        }
        .navbar {
            background: red;
            background-size: cover;
            filter: brightness(150%);
        }
        .logout-link {
            color: #dc3545;
            cursor: pointer;
            margin-top: auto;
            padding: 10px;
            text-align: center;
            display: block;
            border-top: 1px solid #f8d7da;
        }
        .logout-link:hover {
            background-color: #f8d7da;
            color: white;
        }
    </style>
    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar" class="d-flex flex-column p-3">
            <a class="navbar-brand d-flex align-items-center mb-3" href="#">
                <img src="Logo.png" alt="Logo UPTx" style="max-width: 150px;">
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="nav flex-column">
                @if (Auth::user()->rol_id == 1)
                <li class="nav-item">
                    <a class="nav-link" href="" id="inicioLink">
                        <i class="fas fa-fw fa-tachometer-alt"></i> Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="usuariosLink">
                        <i class="fas fa-fw fa-user"></i> Gestión de Usuarios
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="solicitudesLink">
                        <i class="fas fa-fw fa-file-alt"></i> Solicitudes de Acceso
                    </a>
                </li>
                @elseif (Auth::user()->rol_id == 2)
                <li class="nav-item">
                    <a class="nav-link" href="" id="inicioLink">
                        <i class="fas fa-fw fa-tachometer-alt"></i> Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="solicitudesLink">
                        <i class="fas fa-fw fa-calendar"></i> Solicitudes de Invitación
                    </a>
                </li>
                @elseif (Auth::user()->rol_id == 3)
                <li class="nav-item">
                    <a class="nav-link" href="" id="inicioLink">
                        <i class="fas fa-fw fa-tachometer-alt"></i> Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="invitadosLink">
                        <i class="fas fa-fw fa-shield-alt"></i> Invitados
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="reporteLink">
                        <i class="fas fa-fw fa-exclamation-triangle"></i> Reportes
                    </a>
                </li>
                @endif
                <!-- Logout Link -->
                <li class="nav-item mt-auto">
                    <a class="nav-link logout-link" href="{{ url('/logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-1"></i> Logout
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Content Wrapper -->
        <div id="content-wrapper">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
                style="background-image: url(@if (Auth::user()->rol_id == 1) 'Admin.jpg' @elseif (Auth::user()->rol_id == 2) 'Registrante.jpg' @elseif (Auth::user()->rol_id == 3) 'Vigilancia.jpg' @endif);">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small mx-3">
                    <h3>Bienvenido, {{ Auth::user()->name }}!</h3>
                </span>
                <button class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
            </nav>

            <script>
                function loadDashboard() {
                    var userRole = {{ Auth::user()->rol_id }};
                    var url = '';
                    
                    if (userRole == 1) {
                        url = "{{ route('planning') }}";
                    } else if (userRole == 2) {
                        url = "{{ route('director') }}";
                    } else if (userRole == 3) {
                        url = "{{ route('security') }}";
                    }

                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function (data) {
                            $('#content').html(data);
                        },
                        error: function (xhr, status, error) {
                            console.error('Error details:', xhr.responseText);
                            alert('Error loading the content: ' + status + ' - ' + error);
                        }
                    });
                }

                $(document).ready(function () {
                    loadDashboard();

                    $('#solicitudesLink').click(function (e) {
                        e.preventDefault();
                        loadContent('{{ route("solicitudes") }}');
                    });

                    $('#usuariosLink').click(function (e) {
                        e.preventDefault();
                        loadContent('{{ route("usuarios.index") }}');
                    });

                    $('#invitadosLink').click(function (e) {
                        e.preventDefault();
                        loadContent('{{ route("invitados") }}');
                    });

                    $('#reporteLink').click(function (e) {
                        e.preventDefault();
                        loadContent('{{ route("reporte") }}');
                    });

                    function loadContent(url) {
                        $.ajax({
                            url: url,
                            type: 'GET',
                            success: function (data) {
                                $('#content').html(data);
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.error('Error details:', jqXHR.responseText);
                                alert('Error loading the content: ' + textStatus + ' - ' + errorThrown);
                            }
                        });
                    }
                });
            </script>

            <!-- Main Content -->
            <div id="content" class="container-fluid">
                <!-- Here goes the main content of the dashboard -->
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; UPTx 2024</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>

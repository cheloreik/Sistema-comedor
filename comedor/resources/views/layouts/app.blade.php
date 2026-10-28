<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nexo Comedor</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css" integrity="..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <style>
        body {
            background: #f5f7fb;
            margin: 0;
            overflow-x: hidden;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #ffffff;
            position: fixed;
            left: -250px; /* Por defecto oculto en móviles */
            top: 0;
            border-right: 1px solid #e5e7eb;
            display: flex;
            flex-direction: column;
            padding: 10px;
            z-index: 1060; 
            transition: left 0.3s ease-in-out;
        }

        .sidebar.active {
            left: 0; /* Se muestra al activar en móviles */
        }

        .logo-area { margin-bottom: 30px; }
        .logo-area h3 { color: #377dff; font-weight: 700; }
        .logo-area small { color: #94a3b8; }
        .menu { list-style: none; padding: 0; }
        .menu li { margin-bottom: 8px; }
        .menu a { display: block; text-decoration: none; color: #64748b; padding: 12px 16px; border-radius: 10px; }
        .menu a:hover { background: #f1f5f9; }
        .menu a.active { background: #eef2ff; color: #3b82f6; font-weight: 600; }
        .help-box { margin-top: auto; background: #f5f7fb; padding: 15px; border-radius: 12px; }
        .help-box h6 { font-weight: bold; }
        .help-box a { text-decoration: none; font-weight: 600; }
        .logout { margin-top: 20px; color: #64748b; }

        .main-content {
            margin-left: 0;
            transition: margin-left 0.3s ease-in-out;
        }

        .navbar-custom {
            height: 75px;
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            padding: 0 20px;
            position: relative;
            z-index: 1040;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,.05);
        }

        /* Botón hamburguesa con z-index superior para que NUNCA se oculte */
        #sidebarToggle {
            position: relative;
            z-index: 1070; 
        }

        /* Capa oscura de fondo (Overlay) cuando el menú está abierto en móviles */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1050;
        }

        .sidebar-overlay.active {
            display: block;
        }

        textarea{
            min-height: 250px !important; 
            max-height: 250px !important;
        }
        /* Escritorio (Pantallas mayores a 768px) */
        @media (min-width: 769px) {
            .sidebar {
                left: 0 !important; /* Siempre visible en escritorio */
            }
            .main-content {
                margin-left: 250px !important; /* Deja espacio para el sidebar fijo */
            }
            #sidebarToggle {
                display: none !important; /* Ocultar hamburguesa en escritorio */
            }
        }




        .food-card {
            border: none;
            border-radius: 1rem;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .food-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.15)!important;
        }
        .food-img-wrapper {
            height: 200px;
            overflow: hidden;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            position: relative;
        }
        .food-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .food-card:hover .food-img-wrapper img {
            transform: scale(1.05);
        }
        .badge-price {
            position: absolute;
            bottom: 10px;
            right: 10px;
            font-size: 1rem;
            font-weight: 700;
        }
    </style>
</head>

<body>

    @include('partials.sidebar')
    
    <!-- Capa oscura de fondo para móviles -->
    <div id="sidebarOverlay" class="sidebar-overlay"></div>

    <main class="main-content">
        <nav class="navbar-custom">
            <!-- Botón Hamburguesa -->
            <button id="sidebarToggle" class="btn btn-light d-md-none me-3">
                <i class="fa-solid fa-bars"></i>
            </button>
            
            <h5 class="mb-0">Panel de Control</h5>
        </nav>
        <div class="p-3">
            @yield('content')
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script para el menú hamburguesa y overlay -->
    <script>
        const toggleBtn = document.getElementById('sidebarToggle');
        const sidebar = document.querySelector('.sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        function toggleMenu() {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        toggleBtn.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu); // Cierra al hacer clic fuera
    </script>
    <script>
        $(document).ready(function() {
        $("#inputBuscar").on("keyup", function() {
            let valor = $(this).val().toLowerCase();
            
            $("#tabla tr").filter(function() {
                // Compara el texto de cada fila con lo que se está escribiendo
                $(this).toggle($(this).text().toLowerCase().indexOf(valor) > -1);
            });
        });
    });
    </script>
</body>
</html>
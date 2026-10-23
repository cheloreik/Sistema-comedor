<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema de Comedor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            margin:0;
            height:100vh;
            overflow:hidden;
            font-family: 'Segoe UI', sans-serif;
        }

        .left-panel{
            background:url('https://images.unsplash.com/photo-1552566626-52f8b828add9?q=80&w=1200')
                       center center/cover no-repeat;
            position:relative;
            height:100vh;
        }

        .left-panel::before{
            content:'';
            position:absolute;
            inset:0;
            background:rgba(15,25,55,.45);
        }

        .branding{
            position:absolute;
            top:50px;
            left:60px;
            color:white;
            z-index:2;
        }

        .hero-text{
            position:absolute;
            bottom:80px;
            left:60px;
            right:60px;
            color:white;
            z-index:2;
        }

        .hero-text h1{
            font-size:3rem;
            font-weight:300;
        }

        .right-panel{
            background:white;
            display:flex;
            align-items:center;
            justify-content:center;
            height:100vh;
        }

        .login-box{
            width:100%;
            max-width:500px;
        }

        .form-control{
            height:55px;
            border-radius:12px;
        }

        .btn-login{
            height:55px;
            border-radius:12px;
            background:#2962ff;
            border:none;
        }

        .btn-login:hover{
            background:#1f54eb;
        }

        .subtitle{
            color:#6c757d;
        }

        .top-text{
            position:absolute;
            top:50px;
            color:#65708a;
            font-size:14px;
        }

    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <!-- LADO IZQUIERDO -->
        <div class="col-lg-6 d-none d-lg-block left-panel">

            <div class="branding">
                <h3>🍽️ NEXO</h3>
                <small>COMEDOR CORPORATIVO</small>
            </div>

            <div class="hero-text">

                <small>PERSONAS • BIENESTAR • CONEXIÓN</small>

                <h1 class="mt-3">
                    Un buen día empieza<br>
                    compartiendo la mesa.
                </h1>

                <p class="mt-4">
                    Simplificamos la gestión de tu comedor para que puedas enfocarte en lo más importante: tu equipo.
                </p>

            </div>

        </div>

        <!-- LADO DERECHO -->
        <div class="col-lg-6 right-panel">

            <div class="login-box">

                <div class="top-text">
                    Sistema de Gestión de Comedor Empresarial
                </div>

                <div class="mb-4">
                    <div class="bg-light rounded-3 p-3 d-inline-block">
                        ➜
                    </div>
                </div>

                <h1 class="fw-bold text-dark">
                    Te damos la bienvenida
                </h1>

                <p class="subtitle mb-4">
                    Ingresa con tu cuenta corporativa para gestionar el comedor de tu empresa.
                </p>


 <form method="POST" action="{{ route('login.post') }}">

    @csrf

    <div class="mb-3">
        <label>Correo</label>

        <input
            type="email"
            name="email"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label>Contraseña</label>

        <input
            type="password"
            name="password"
            class="form-control"
            required>
    </div>

    <button type="submit" class="btn btn-primary w-100">
        Ingresar
    </button>

</form>







                <div class="text-center mt-4 text-secondary">
                    🔒 Acceso exclusivo para personal autorizado
                </div>

            </div>

        </div>

    </div>
</div>

</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>



    <meta charset="UTF-8">
    <title>Nexo Comedor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nexo Comedor</title>

    <style>

        body{
            background:#f5f7fb;
            margin:0;
        }

     .sidebar{
    width:250px;
    height:100vh;
    background:#ffffff;
    position:fixed;
    left:0;
    top:0;
    border-right:1px solid #e5e7eb;
    display:flex;
    flex-direction:column;
    padding:10px;
}

.logo-area{
    margin-bottom:30px;
}

.logo-area h3{
    color:#377dff;
    font-weight:700;
}

.logo-area small{
    color:#94a3b8;
}

.menu{
    list-style:none;
    padding:0;
}

.menu li{
    margin-bottom:8px;
}

.menu a{
    display:block;
    text-decoration:none;
    color:#64748b;
    padding:12px 16px;
    border-radius:10px;
}

.menu a:hover{
    background:#f1f5f9;
}

.menu a.active{
    background:#eef2ff;
    color:#3b82f6;
    font-weight:600;
}

.help-box{
    margin-top:auto;
    background:#f5f7fb;
    padding:15px;
    border-radius:12px;
}

.help-box h6{
    font-weight:bold;
}

.help-box a{
    text-decoration:none;
    font-weight:600;
}

.logout{
    margin-top:20px;
    color:#64748b;
}

        .main-content{
            margin-left:250px;
        }

        .navbar-custom{
            height:75px;
            background:#fff;
            border-bottom:1px solid #e5e7eb;
        }

        .card{
            border:none;
            border-radius:15px;
            box-shadow:0 2px 8px rgba(0,0,0,.05);
        }

    </style>
</head>


<body>

    @include('partials.sidebar')

    <main class="main-content">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
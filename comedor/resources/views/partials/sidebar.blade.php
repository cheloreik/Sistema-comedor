<div class="sidebar">

    <div class="logo-area">
        <h3>U.A.B.</h3>
        <small>ESPACIO DE TRABAJO</small>
    </div>

    <ul class="menu ovverflow-y-auto">

<!--PARA QUE SE MUESTRE NOMBRE Y ROL EN EL SIDEDAR-->

 
<!--PARA QUE SE MUESTRE NOMBRE Y ROL EN EL SIDEDAR-->
        


        <li>
            <a href="{{ route('dashboard') }}">
                <i class="fas fa-home"></i> Inicio
            </a>
        </li>

        <li>
            <a href="{{ route('empleados.index') }}"
               class="{{ request()->routeIs('empleados.*') ? 'active' : '' }}">
                <i class="fas fa-user"></i> Gestión de Empleados
            </a>
        </li>

        <li>
            <a href="{{ route('familiares.index') }}">
                <i class="fas fa-user-friends"></i> Gestión de Familiares
            </a>
        </li>

        <li>
            <a href="{{ route('menus.index') }}">
                <i class="fas fa-utensils"></i> Gestión de Menús
            </a>
        </li>

    
        <li>
            <a href="{{ route('reservas.index') }}">
                <i class="fas fa-calendar-alt"></i> Reservas
            </a>
        </li>

        <li>
            <a href="{{ route('usuarios.index') }}">
                <i class="fas fa-users"></i> Usuarios
            </a>
        </li>

        <li>
            <a href="{{ route('reportes.index') }}">
                📈 Reportes
            </a>
        </li>

        <li>
            <a href="{{ route('entregas.index') }}">
            <i class="fas fa-box"></i> Entrega de Comidas
            </a>
        </li>

        <li>
            <a href="{{ route('configuracion.index') }}">
                <i class="fas fa-cog"></i> Configuración
            </a>
        </li>
      <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                @csrf
            </form>
            <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Cerrar Session
                </a>
        </li>

    </ul>

    <div class="help-box">

        <h6>¿Necesitas ayuda?</h6>
 
        <p>
            El equipo de soporte está para ti.
        </p>

        <a href="#">
            Contactar soporte
        </a>

    </div>

    <div class="logout">


<!--para colocar el logout del sistema-->    
     
        <small class="d-block mt-2">
            Nexo · Gestión de comedor v2.4
        </small>

    </div>

</div>
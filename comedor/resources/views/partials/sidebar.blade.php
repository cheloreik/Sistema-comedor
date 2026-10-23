<div class="sidebar">

    <div class="logo-area">
        <h3>U.A.B.</h3>
        <small>ESPACIO DE TRABAJO</small>
    </div>

    <ul class="menu">

<!--PARA QUE SE MUESTRE NOMBRE Y ROL EN EL SIDEDAR-->
    <div class="mt-3">

    <strong>{{ auth()->user()->name }}</strong>

    <br>

    <small>
        {{ auth()->user()->rol }}
    </small>

    </div>



        <li>
            <a href="{{ route('dashboard') }}">
                🏠 Inicio
            </a>
        </li>

        <li>
            <a href="{{ route('empleados.index') }}"
               class="{{ request()->routeIs('empleados.*') ? 'active' : '' }}">
                👥 Gestión de Empleados
            </a>
        </li>

        <li>
            <a href="{{ route('familiares.index') }}">
                👨‍👩‍👧 Gestión de Familiares
            </a>
        </li>

        <li>
            <a href="{{ route('menus.index') }}">
                🍽 Gestión de Menús
            </a>
        </li>

    
        <li>
            <a href="{{ route('reservas.index') }}">
                📅 Reservas
            </a>
        </li>

        <li>
            <a href="{{ route('usuarios.index') }}">
                🛡 Usuarios
            </a>
        </li>

        <li>
            <a href="{{ route('reportes.index') }}">
                📈 Reportes
            </a>
        </li>

        <li>
    <a href="{{ route('entregas.index') }}">
       🍱 Entrega de Comidas
    </a>
</li>

        <li>
            <a href="{{ route('configuracion.index') }}">
                ⚙ Configuración
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
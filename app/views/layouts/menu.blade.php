<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">.:: Seguimiento ::.</a>
        </div>
@if(Auth::check())
    @if(Auth::user()->verificaPermiso(Auth::user()->id, 1) == 'true')
             <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sistema <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    @if(Auth::user()->verificaPermiso(Auth::user()->id, 2) == 'true')
                        <li><a href="{{ route('list-user') }}">Usuarios</a></li>
                    @endif
                </ul>
            </li>
            <li><a href="{{ route('solicitudes')}}">Solicitudes</a></li>
    @endif
        </ul>
            <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->full_name; }} <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('change') }}">Cambiar Contraseña</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}">Salir</a></li>
                </ul>
            </li>
        </ul>
@endif
    </div>
</div>

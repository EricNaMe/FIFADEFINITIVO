<div id="menuSuperior" >
    <div class="void"></div>
    <ul id="ListaMenuSuperior" >
        <li><a href="/clubes-pro">CLUBES PRO</a></li>
        <li><a href="/PVSP">1 VS 1</a></li>
        <li><a href="/Reglamento">REGLAMENTO</a></li>
        <li><a href="/Clips">CLIPS</a></li>
        <li><a href="/Noticias">NOTICIAS</a></li>
        @if (Auth::check())
            <li id="LoginMenu">
                <a href="#" >
                    <div id="LogoEquipo" style="
                            background:url({{Auth::User()->getAvatar()}});
                            background-size:cover;"></div>
                    {{Auth::User()->user_name}}
                </a>
                <ul class="sub-menu">
                    <li style="font-size: 12px; "><a href="/Perfil" >Ver Perfil</a></li>
                    <li style="font-size: 12px; "><a href="/EditarPerfil" >Editar Perfil</a></li>
                    <li style="font-size: 12px; "><a href="/auth/logout" >Cerrar sesión</a></li>
                </ul>
            </li>

            <li id="notifications">
                <a href="#" >
                    Notificaciones ({{Auth::user()->notifications->count()}})
                </a>
                <ul class="sub-menu">
                    @foreach(Auth::user()->notifications as $notification)
                        <li>
                            <a href="{{$notification->getLink()}}" >{{$notification->getMessage()}}</a>
                            <a class="btn btn-danger" href="{{$notification->getDeleteLink()}}">X</a>
                        </li>
                    @endforeach

                </ul>
            </li>
        @else
            <li id="LoginMenu">
                <a>
                    LOGIN
                </a>
                <ul class="sub-menu">
                    <li style="font-size: 12px; ">
                        <a href="/auth/login" >Iniciar Sesión</a>
                    </li>
                    <li style="font-size: 12px; margin-left: 5px; ">
                        <a href="/auth/register" >Registrarse</a>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</div>
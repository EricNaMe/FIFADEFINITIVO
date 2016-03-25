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
                            background:url(https://avatar-ssl.xboxlive.com/avatar/{{Auth::User()->gamertag}}/avatarpic-l.png);
                            background-size:cover;"></div>
                    {{Auth::User()->user_name}}
                </a>
                <ul id="SubMenu">
                    <li style="font-size: 12px; "><a href="/Perfil" >Ver Perfil</a></li>
                    <li style="font-size: 12px; "><a href="/EditarPerfil" >Editar Perfil</a></li>
                    <li style="font-size: 12px; "><a href="/auth/logout" >Cerrar sesión</a></li>
                </ul>
            </li>
        @else
            <li id="LoginMenu">
                <a>
                    LOGIN
                </a>
                <ul id="SubMenu">
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
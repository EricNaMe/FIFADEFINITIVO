@extends('template')

@section('content')

    <div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">
        <ul id="ListaMenuLateral">
            <li><a>CLUBES PRO</a>
            <li><a>TORNEOS VIGENTES</a>
                <ul>
                    <li><a>PRIMERA DIVISIÓN</a></li>
                    <li><a>SEGUNDA DIVISIÓN A</a></li>
                    <li><a>SEGUNDA DIVISIÓN B</a></li>
                    <li><a>TERCERA DIVISIÓN A</a></li>
                    <li><a>TERCERA DIVISIÓN B</a></li>
                </ul>
            </li>
            <li><a>CLUBES</a>
                <ul>
                    <li><a>BUSCAR CLUB</a></li>
                    <li><a>CREAR CLUB</a></li>
                </ul>
            </li>
            <li>
                <a>JUGADORES</a>
            </li>
            <li>
                <a>TRANSFERENCIAS</a>
            </li>

            <li>
                <a href="RankingCP">RANKING POR CLUBES</a>
            <li>
                <a href="/Inicio">HOME</a>
            </li>
        </ul>
    </div>

    <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;">
        <div style="width:700px; height:400px; background-color:whitesmoke; position: relative; top:200px; left:300px; ">
            <div class="container">
                <form action="/clubes-pro" name="FormaCrearClub" method="post" class="form-horizontal" role="form"
                      enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="InputIdEditar" value="{{Auth::User()->id}}"/>

                    <br></br>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Usuario:</label>
                        <div class="col-sm-5">
                            <input class="form-control" name="usuario" disabled type="text"
                                   value="{{Auth::User()->user_name}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nombre del club:</label>
                        <div class="col-sm-5">
                            <input class="form-control" name="nombreequipo" type="text" value="">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">Escudo equipo:</label>
                        <div class="col-sm-5">
                            <input type="file" class="form-control" name="picture">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">Lema:</label>
                        <div class="col-sm-5">
                            <input class="form-control" name="lema" type="text" value="">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="disabledSelect" class="col-sm-2 control-label">Estado:</label>
                        <div class="col-sm-5">
                            <select name="EstadoSelect" class="form-control">
                                <option value="Aguascalientes">Aguascalientes</option>
                                <option value="Baja California">Baja California</option>
                                <option value="Baja California Sur">Baja California Sur</option>
                                <option value="Campeche">Campeche</option>
                                <option value="Coahuila">Coahuila de Zaragoza</option>
                                <option value="Colima">Colima</option>
                                <option value="Chiapas">Chiapas</option>
                                <option value="Chihuahua">Chihuahua</option>
                                <option value="Distrito Federal">Distrito Federal</option>
                                <option value="Durango">Durango</option>
                                <option value="Guanajuato">Guanajuato</option>
                                <option value="Guerrero">Guerrero</option>
                                <option value="Hidalgo">Hidalgo</option>
                                <option value="Jalisco">Jalisco</option>
                                <option value="México">México</option>
                                <option value="Michoacan">Michoacán de Ocampo</option>
                                <option value="Morelos">Morelos</option>
                                <option value="Nayarit">Nayarit</option>
                                <option value="NuevoLeon">Nuevo León</option>
                                <option value="Oaxaca">Oaxaca</option>
                                <option value="Puebla">Puebla</option>
                                <option value="Queretaro">Querétaro</option>
                                <option value="QuintanaRoo">Quintana Roo</option>
                                <option value="SanLuisPotosi">San Luis Potosí</option>
                                <option value="Sinaloa">Sinaloa</option>
                                <option value="Sonora">Sonora</option>
                                <option value="Tabasco">Tabasco</option>
                                <option value="Tamaulipas">Tamaulipas</option>
                                <option value="Tlaxcala">Tlaxcala</option>
                                <option value="Veracruz">Veracruz de Ignacio de la Llave</option>
                                <option value="Yucatan">Yucatán</option>
                                <option value="Zacatecas">Zacatecas</option>
                            </select>
                        </div>
                    </div>
                    <br></br>
                    <div class="container">
                        <button type="button" class="btn btn-primary">Reset</button>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- FIN menu central -->
@endsection





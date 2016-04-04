@extends('template')

@section('content')
<script src="js/Funcionesfifa.js" type="text/javascript"></script>


<div id="menuLateral" style="background: url(images/leftMenu.jpeg); background-size: cover;">

    <ul id="ListaMenuLateral">
        <li><a href="/Inicio">HOME</a></li>

    </ul>


</div>

<div id="menuCentral" style="background:url(images/middleMenu.jpeg); background-size: cover;" >

<div style="width: 700px; height: 400px;border-radius: 10px; position:relative;top:100px;left:200px; background-color: whitesmoke;">

    <div class="container">
        <h2>Editar perfil</h2>
        <form action="" name="FormaPerfil" method="post" class="form-horizontal" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="InputIdEditar" value="{{Auth::User()->id}}"/>
            <input type="hidden" name="PosicionInput" value=""/>
            <input type="hidden" name="ConsolaInput" value=""/>
            <input type="hidden" name="EstadoInput" value=""/>
            <div class="form-group">
                <label class="col-sm-2 control-label">Usuario:</label>
                <div class="col-sm-5">
                    <input class="form-control" name="UsuarioInput" disabled type="text" value="{{Auth::User()->user_name}}">
                </div>
            </div>

            <div class="form-group">
                <label for="disabledSelect" class="col-sm-2 control-label">Posición</label>
                <div class="col-sm-5">
                    <select name="PosicionSelect" id="PosicionSelect"  class="form-control">
                        <option value="PO">PO</option>
                        <option value="DFC">DFC</option>
                        <option value="LTI">LTI</option>
                        <option value="LTD">LTD</option>
                        <option value="MCD">MCD</option>
                        <option value="MC">MC</option>
                        <option value="MI">MI</option>
                        <option value="MD">MD</option>
                        <option value="MCO">MCO</option>
                        <option value="EI">EI</option>
                        <option value="ED">ED</option>
                        <option value="DI">DI</option>
                        <option value="DD">DD</option>
                        <option value="DC">DC</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="disabledSelect" class="col-sm-2 control-label">Consola:</label>
                <div class="col-sm-5">
                    <select name="ConsolaSelect"  class="form-control">
                        <option>XBOX ONE</option>
                        <option>XBOX 360</option>
                        <option>PC</option>

                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Gamertag:</label>
                <div class="col-sm-5">
                    <input class="form-control" name="GamertagInput" type="text" value="{{Auth::User()->gamertag}}">
                </div>
            </div>



           

            <div class="form-group">
                <label class="col-sm-2 control-label">Lema:</label>
                <div class="col-sm-5">
                    <input class="form-control" name="LemaInput" id="focusedInput" type="text" value="{{Auth::User()->quote}}">
                </div>
            </div>

            <div style="position:relative; left:500px;" class="container">
                <button  type="button" class="btn btn-primary">Reset</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>






        </form>
    </div>



</div>

</div>
@endsection
@extends('template')

@section('content')

<div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">
    <ul id="ListaMenuLateral">
        <li><a>HOME</a>
    </ul>
</div>
@include('partial.navbar')

<div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;" >
    <div style="background-color:whitesmoke;border-radius:10px;position: relative; top:200px; width: 600px; height: 250px; left:200px; ">
        <!--==============================header=================================-->
        <div  class="container">
            <!--==============================content================================-->
            <form id="contact-form"  action="/auth/login" enctype="multipart/form-data" method="post" >
                {!! csrf_field() !!}
                <br></br>
                <div class="form-group">
                <label class="col-sm-2 control-label">Correo electrónico:</label>
                <div class="col-sm-4">
                    <input class="form-control" name="email" type="text" value="">
                </div>
                </div>
                    <br></br>
                     <div class="form-group">
                    <label class="col-sm-2 control-label">Contraseña:</label>
                    <div class="col-sm-4">
                        <input class="form-control" name="password" type="password" value="">
                    </div>
                </div>
                <div  style="position:relative; left:-200px; top:50px;"class="container">
                    <button  type="button" class="btn btn-primary">Reset</button>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <script>
        $(document).ready(function () {
            $('#ListaMenuLateral > li > a').click(function(){
                if ($(this).attr('class') != 'active'){
                    $('#ListaMenuLateral li ul').slideUp();
                    $(this).next().slideToggle();
                    $('#ListaMenuLateral li a').removeClass('active');
                    $(this).addClass('active');
                }
            });
        });

        $(document).ready(function () {
            $('#ListaMenuSuperior > li > a').click(function(){
                if ($(this).attr('class') != 'active'){
                    $('#ListaMenuSuperior li ul').slideUp();
                    $(this).next().slideToggle();
                    $('#ListaMenuSuperior li a').removeClass('active');
                    $(this).addClass('active');
                }
            });
        });
    </script>
@endsection









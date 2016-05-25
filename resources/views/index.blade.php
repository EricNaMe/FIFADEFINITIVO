@extends('template')

@section('content')


    <script>
        function rotar_imagen(){
            var tiempo = 2000;//tiempo en milisegundos
            //var tiempo2 = 200;//tiempo en milisegundos
            var arrImagenes = ['/images/TC3.png','/images/TC2.png', '/images/TC.png'];
            // var arrImagenes2 = ['/images/B1.png','/images/B2.png', '/images/b3.png', '/images/b4.png'];

            _img = document.getElementById('TC');
            // _img2 = document.getElementById('B');

            //cargar la 1er imagen
            _img.src = arrImagenes[0];
            //_img2.src = arrImagenes2[0];
            var i=1;
            //var R=1;
            setInterval(function(){
                _img.src = arrImagenes[i];
                i = (i == arrImagenes.length-1)? 0 : (i+1);
            }, tiempo);
//  setInterval(function(){
//    _img2.src = arrImagenes2[R];
//    R = (R == arrImagenes2.length-1)? 0 : (R+1);
//  }, tiempo2);
//

        }
    </script>


    <body onload="rotar_imagen();">


    <div id="menuLateral" style="background: url(images/leftMenu.jpeg); background-size: cover;">

        <ul id="ListaMenuLateral">
            <li><a>HOME</a></li>

        </ul>


    </div>
    <style>

        .dialogbox .body {
            position: relative;
            max-width: 390px;
            height: auto;
            margin: 20px 10px;
            padding: 5px;
            background-color: #DADADA;
            border-radius: 3px;
            border: 5px solid #ccc;
        }

    </style>

    <div id="menuCentral" style="background:url(images/middleMen.jpeg); background-size: cover;" >

        <div class="img-responsive" id="banner" style="background:url(/images/home.jpg);background-size: contain; margin-top: 15px; height:330px;background-repeat: no-repeat;">
            <div><img id="TC" src="/images/TC.png"/></div>
            <div><img id="FBJ" src="/images/FBJ.png" width="350" style="margin-left: 30px;"/>
                <div style="margin-left: 330px; margin-top: -165px;"><img id="B" src="/images/B1.png" width="50"/></div>
            </div>
        </div>

        <article style="background-color: whitesmoke;  width: 500px; position: relative; top:50px; left:20px; border-radius: 10px; " class="Articulo2" >
            <content>
                <div id="wrapper" ">
                <div style="padding:10px; font-size: 20px; text-align: center; font-family: sans-serif; font-weight: bold;" id="menu">
                    <p class="welcome">USUARIOS NUEVOS EN www.torneoscardiacos.com<b></b></p>
                    <div style="clear:both"></div>
                </div>
                <div style="background-color:whitesmoke;overflow-y: scroll; border-radius:10px; height: 300px;">
                    @foreach($users->reverse() as $user)

                        <div  style=" background-color: white; padding: 10px;margin: 10px;" id="boxUser">

                            <article class="Articulo3"><img style="width:50px; height:50px;" src="{{$user->getAvatar()}}"/> <a style="font-weight: bold; font-family: sans-serif;">{{$user->user_name}}</a> <a style="font-family: sans-serif;">Se ha unido a la comunidad<a/></article>

                        </div>
                    @endforeach

                </div>
                <div style="background-color: whitesmoke; height: 30px; border-radius: 10px;"></div>
    </div>

    </content>
    </article>



    <div style="height: 440px; border-radius: 10px; width: 450px; top:-385px; background-color: whitesmoke; left: 560px; position: relative;">

        <div style="left:15px;overflow-y: scroll; position:relative; top:20px;height: 300px; width: 425px;background-color: white;">

            @foreach($comment->reverse() as $commen)


                <div class="dialogbox" >
                    <div class="body" >
                        <!--    <span class="tip tip-right"></span>-->
                        <div style=" font-weight: bold; font-family: sans-serif; color:gray; height:20px; width:350px;"><a style="font-size:10px;">{{$commen->created_at}}</a><a style="float:right;margin-right:-10px; ">{{$commen->user->user_name}}</a></div>

                        <div style="position:relative; top:15px; left:300px;display: inline-block;background-color: pink; width:60px; height: 60px;">
                            <div  style="width:60px; height: 60px; background:url({{$commen->user->getAvatar()}}); background-size:cover;"></div>
                        </div>
                        <div style="word-break:break-all; position: relative; top: -50px; left: 10px;" class="message" >
                            <span><p style="word-break:break-all;width:250px; font-family: sans-serif;font-weight: bold;">{{$commen->message}}</p></span>
                        </div>


                    </div>
                </div>
            @endforeach
        </div>


        <form action="" method="POST" role="form">
            <div style="top:20px;position: relative;" class="form-group">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <label style="font-family: sans-serif; font-weight: bold;" for="comment">Comentario:</label>
                <INPUT class="form-control" name="comentarioTexto" value="" id="comment"/>
                @if(Auth::check())
                    <input type="hidden" name="InputId" value="{{Auth::User()->id}}"/>

                    <button style="position: relative;left:220px; top:20px;" type="submit" class="btn btn-primary">Enviar</button>

                    <div style="background-color:red;font-weight:bold;display: none; font-family:sans-serif; text-align: center;height:60px; width:300px;"><a>Debes iniciar sesión</a></div>

                @else
                    <div style="background-color:red; border-radius:10px;font-weight:bold; font-family:sans-serif; text-align: center;height:60px; width:450px;"><a>Debes iniciar sesión</a></div>

                @endif
            </div>

        </form>

    </div>



    </div>
    </body>
@endsection
@extends('template')

@section('content')


    <link rel="stylesheet" href="/css/Clips.css" type="text/css" media="screen">

    <!DOCTYPE html>
    <!--
    To change this license header, choose License Headers in Project Properties.
    To change this template file, choose Tools | Templates
    and open the template in the editor.
    -->
    <html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/css/Clips.css" type="text/css" media="screen">
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <title>FIFA 2016</title>
    </head>

    <body >

    <script>



        function replaceAllS( text, busca, reemplaza ){

            while (text.toString().indexOf(busca) != -1)

                text = text.toString().replace(busca,reemplaza);

            return text;

        }
        function getIdClip(data)
        {

            data=data.substring(data.indexOf(':')+1, data.indexOf(','));//Sacar el ID
            return data;
        }
        function getDescri(data)
        {
            data=data.substring(data.indexOf("descripcion:")+12, data.indexOf(",url"));//Sacar la descripcion
            return data;
        }
        function getUrl(data)
        {
            data=data.substring(data.indexOf("url:")+4, data.indexOf(",created"));//Sacar el Url
            return data;
        }


    </script>

    <div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">

        <ul id="ListaMenuLateral">
            <li><a >CLIPS</a></li>
            <li><a href="/Inicio">HOME</a></li>

        </ul>


    </div>




    <div class="divisionPrincipal" >
        <div>
            <div><script type="text/javascript">//Script para imagen en movimiento
                    //Ancho (en pixeles)
                    var sliderwidth="1080px"
                    //Alto
                    var sliderheight="200px"
                    //Velocidad 1-10
                    var slidespeed=1
                    //Color de fondo:
                    slidebgcolor="#000000"

                    //Vínculos y enlaces de las imágenes
                    var leftrightslide=new Array()
                    var finalslide=''
                    leftrightslide[0]='<img  src="/images/bannerClip.jpg" height="200"></a>'
                    leftrightslide[1]='<img  src="/images/bannerClip.jpg" height="200"></a>'
                    leftrightslide[2]='<img  src="/images/bannerClip.jpg" height="200"></a>'


                    var imagegap=""
                    var slideshowgap=3


                    var copyspeed=slidespeed
                    leftrightslide='<nobr>'+leftrightslide.join(imagegap)+'</nobr>'
                    var iedom=document.all||document.getElementById
                    if (iedom)
                        document.write('<span id="temp" style="visibility:hidden;position:absolute;top:-100px;left:-9000px">'+leftrightslide+'</span>')
                    var actualwidth=''
                    var cross_slide, ns_slide

                    function fillup(){
                        if (iedom){
                            cross_slide=document.getElementById? document.getElementById("test2") : document.all.test2
                            cross_slide2=document.getElementById? document.getElementById("test3") : document.all.test3
                            cross_slide.innerHTML=cross_slide2.innerHTML=leftrightslide
                            actualwidth=document.all? cross_slide.offsetWidth : document.getElementById("temp").offsetWidth
                            cross_slide2.style.left=actualwidth+slideshowgap+"px"
                        }
                        else if (document.layers){
                            ns_slide=document.ns_slidemenu.document.ns_slidemenu2
                            ns_slide2=document.ns_slidemenu.document.ns_slidemenu3
                            ns_slide.document.write(leftrightslide)
                            ns_slide.document.close()
                            actualwidth=ns_slide.document.width
                            ns_slide2.left=actualwidth+slideshowgap
                            ns_slide2.document.write(leftrightslide)
                            ns_slide2.document.close()
                        }
                        lefttime=setInterval("slideleft()",30)
                    }
                    window.onload=fillup

                    function slideleft(){
                        if (iedom){
                            if (parseInt(cross_slide.style.left)>(actualwidth*(-1)+8))
                                cross_slide.style.left=parseInt(cross_slide.style.left)-copyspeed+"px"
                            else
                                cross_slide.style.left=parseInt(cross_slide2.style.left)+actualwidth+slideshowgap+"px"

                            if (parseInt(cross_slide2.style.left)>(actualwidth*(-1)+8))
                                cross_slide2.style.left=parseInt(cross_slide2.style.left)-copyspeed+"px"
                            else
                                cross_slide2.style.left=parseInt(cross_slide.style.left)+actualwidth+slideshowgap+"px"

                        }
                        else if (document.layers){
                            if (ns_slide.left>(actualwidth*(-1)+8))
                                ns_slide.left-=copyspeed
                            else
                                ns_slide.left=ns_slide2.left+actualwidth+slideshowgap

                            if (ns_slide2.left>(actualwidth*(-1)+8))
                                ns_slide2.left-=copyspeed
                            else
                                ns_slide2.left=ns_slide.left+actualwidth+slideshowgap
                        }
                    }


                    if (iedom||document.layers){
                        with (document){
                            document.write('<table border="0" cellspacing="0" cellpadding="0"><td>')
                            if (iedom){
                                write('<div style="position:relative;width:'+sliderwidth+';height:'+sliderheight+';overflow:hidden">')
                                write('<div style="position:absolute;width:'+sliderwidth+';height:'+sliderheight+';background-color:'+slidebgcolor+'" onmouseover="copyspeed=0" onmouseout="copyspeed=slidespeed">')
                                write('<div id="test2" style="position:absolute;left:0px;top:0px"></div>')
                                write('<div id="test3" style="position:absolute;left:-1000px;top:0px"></div>')
                                write('</div></div>')
                            }
                            else if (document.layers){
                                write('<ilayer width="+sliderwidth+" height="+sliderheight+" name="ns_slidemenu" bgcolor="+slidebgcolor+">')
                                write('<layer left="0" top="0" onmouseover="copyspeed=0" onmouseout="copyspeed=slidespeed" name="ns_slidemenu2"></layer>')
                                write('<layer left="0" top="0" onmouseover="copyspeed=0" onmouseout="copyspeed=slidespeed" name="ns_slidemenu3"></layer>')
                                write('</ilayer>')
                            }
                            document.write('</td></table>')
                        }
                    }
                </script> </div>

            <div style="position: relative; top: -160px; left: 320px;"><img src="/images/Clip.png"/></div>
        </div>
        <article class="Articulo1">
            <content>
                <form action="videoSave1" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="url" class="input" id="url1" name="url1" placeholder="Ingrese URL"  required>
                    </br>
                    </br>
                    <input type="text" class="input" name="nameClip1" id="nameClip1" placeholder="Ingresa Nombre del video" required>
                    </br>
                    </br>
                    <button type="submit" name="btnURL">Guardar URL</button>
                    </br>
                    <h1 style="color:#696969;" id="Video1"></h1> <!---Aqui va el nombre del video (basedatos)--->
                </form>
                <iframe id="YouTube1" width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
                </br>
                </br>
                <!---------------------------------División de Videos---------------------------------------------------->

                <form action="videoSave2" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="url" class="input" name="url2" id="url2" placeholder="Ingrese URL"  required>
                    </br>
                    </br>
                    <input type="text" class="input" name="nameClip2"id="nameClip2" placeholder="Ingresa Nombre del video" required>
                    </br>
                    </br>
                    <button type="submit" name="btnURL">Guardar URL</button>

                    </br>
                    <h1 style="color:#696969;" id="Video2"></h1> <!---Aqui va el nombre del video (basedatos)--->
                </form>
                <iframe id="YouTube2" width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
                </br>
                </br>
                <!---------------------------------División de Videos---------------------------------------------------->
                <form action="videoSave3" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="url" class="input" id="url3" name="url3" placeholder="Ingrese URL" required >
                    </br>
                    </br>
                    <input type="text" class="input" id="nameClip3" name="nameClip3" placeholder="Ingresa Nombre del video" required>
                    </br>
                    </br>
                    <button type="submit" name="btnURL">Guardar URL</button>
                    </br>
                    <h1 style="color:#696969;" id="Video3"></h1> <!---Aqui va el nombre del video (basedatos)--->
                </form>
                <iframe id="YouTube3" width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
                </br>
                </br>
                <!---------------------------------División de Videos---------------------------------------------------->

            </content>
        </article>

        <div style="height: 400px; border-radius: 10px; width: 300px; top: -1570px; background-color: whitesmoke; left: 650px; position: relative;">

            <div style="left:20px;overflow-y: scroll; position:relative; top:20px;height: 300px; width: 260px;background-color: white;">

                @foreach($comment as $commen)


                    <div class="dialogbox">
                        <div class="body">
                            <!--    <span class="tip tip-right"></span>-->
                            <div style=" font-weight: bold; font-family: sans-serif; color:gray; height:20px; width:200px;"><a style="font-size:10px;">{{$commen->created_at}}</a><a style="float:right;margin-right:30px; ">{{$commen->user->user_name}}</a></div>

                            <div style="word-break:break-all;" class="message">
                                <span><p style="word-break:break-all;width:110px; font-family: sans-serif;font-weight: bold;">{{$commen->message}}</p></span>
                            </div>

                            <div style="position:relative; top:-40px; left:130px;display: inline-block;background-color: pink; width:60px; height: 60px;">
                                <div  style="width:60px; height: 60px; background:url(https://avatar-ssl.xboxlive.com/avatar/{{$commen->user->gamertag}}/avatarpic-l.png); background-size:cover;"></div>

                            </div>


                        </div>
                    </div>
                @endforeach
            </div>


            <form action="clipsCommen" method="POST" role="form">
                <div style="top:20px;position: relative;" class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <label style="font-family: sans-serif; font-weight: bold;" for="comment">Comentario:</label>
                    <INPUT class="form-control" name="comentarioTexto" value="" id="comment"/>
                    @if(Auth::check())
                        <input type="hidden" name="InputId" value="{{Auth::User()->id}}"/>

                        <button style="position: relative;left:220px; top:20px;" type="submit" class="btn btn-primary">Enviar</button>

                        <div style="background-color:red;font-weight:bold;display: none; font-family:sans-serif; text-align: center;height:60px; width:300px;"><a>Debes iniciar sesión</a></div>

                    @else
                        <div style="background-color:red; border-radius:10px;font-weight:bold; font-family:sans-serif; text-align: center;height:60px; width:300px;"><a>Debes iniciar sesión</a></div>

                    @endif
                </div>

            </form>

        </div>


    </div>
    <script>
        for(i=1;i<=3;i++)

        {
            switch (i) {
                case 1:
                    var dataClip="{{$videos->where('id',1)}}";
                    dataClip=replaceAllS(dataClip,"&quot;", "");
                    var descrip= getDescri(dataClip);
                    var urlFin= getUrl(dataClip);
                    document.getElementById('YouTube1').src=urlFin;
                    document.getElementById('Video1').textContent=descrip;
                    break;
                case 2:
                    var dataClip="{{$videos->where('id',2)}}";
                    dataClip=replaceAllS(dataClip,"&quot;", "");
                    var descrip= getDescri(dataClip);
                    var urlFin= getUrl(dataClip);
                    document.getElementById('YouTube2').src=urlFin;
                    document.getElementById('Video2').textContent=descrip;

                    break;
                case 3:
                    var dataClip="{{$videos->where('id',3)}}";
                    dataClip=replaceAllS(dataClip,"&quot;", "");
                    var descrip= getDescri(dataClip);
                    var urlFin= getUrl(dataClip);
                    document.getElementById('YouTube3').src=urlFin;
                    document.getElementById('Video3').textContent=descrip;
                    break;
                default:
                    var dataClip="{{$videos->where('id',1)}}";
                    dataClip=replaceAllS(dataClip,"&quot;", "");
                    var descrip= getDescri(dataClip);
                    var urlFin= getUrl(dataClip);
                    document.getElementById('YouTube1').src=urlFin;
                    document.getElementById('Video1').textContent=descrip;
                    break;
            }


            //alert(id+" +++ "+descrip+" +++ "+urlFin);//muestra resultados

        }

    </script>
    </body>
    </html>
@endsection
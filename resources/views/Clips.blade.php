@extends('template')

@section('content')


    <link rel="stylesheet" href="/css/Clips.css" type="text/css" media="screen">

<script>
    function changeText(idTxt,idHeader) {
        var a=document.getElementById(idTxt).value;
        //alert(a);
        if(a=="" || a==null)
        {
            alert("Por favor Ingresa Un nombre para el Video");

        }
        else
        {
            //Realizar Update ala BD con Idtxt y cambiar Document.get...(idtxt) por el select
            document.getElementById(idHeader).innerHTML = document.getElementById(idTxt).value;
        }


    }

    function saveUrl(idUrl,idClip){
        var b= document.getElementById(idUrl).value;
        //alert(b)
        if(b =="" || b==null)

        {
            alert("Por favor Ingresa un URL válido");
        }
        else
        {
            //Realizar el Update a la BD con el IdUrl y cambiar document.get..(idUrl9 por el select
            document.getElementById(idClip).src = document.getElementById(idUrl).value;
        }

    }

</script>

<div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">

    <ul id="ListaMenuLateral">
        <li><a >CLIPS</a></li>
        <li><a href="Inicio">HOME</a></li>

    </ul>


</div>

<div id="menuCentral">

    <article class="Articulo1">
        <header ><h2 class="title">CLIPS</h2></header>
        <content>
            <form>
                <input type="url" class="input" id="url1" placeholder="Ingrese URL" required >
                </br>
                </br>
                <input type="text" class="input" id="nameClip1" placeholder="Ingresa Nombre del video" >
                </br>
                </br>
                <button type="button" name="btnURL" onclick="saveUrl('url1','YouTube')">Guardar URL</button>

                <button type="button" name="btnText" onclick="changeText('nameClip1','Video1')">Cambiar Nombre</button>
                </br>
                <h1 style="color:#696969;" id="Video1">Video 1</h1> <!---Aqui va el nombre del video (basedatos)--->
            </form>
            <iframe id="YouTube" width="560" height="315" src="https://www.youtube.com" frameborder="0" allowfullscreen></iframe>
            </br>
            </br>
            <!---------------------------------División de Videos---------------------------------------------------->

            <form>
                <input type="url" class="input" id="url2" placeholder="Ingrese URL" required >
                </br>
                </br>
                <input type="text" class="input" id="nameClip2" placeholder="Ingresa Nombre del video" >
                </br>
                </br>
                <button type="button" name="btnURL" onclick="saveUrl('url2','YouTube2')">Guardar URL</button>

                <button type="button" name="btnText" onclick="changeText('nameClip2','Video2')">Cambiar Nombre</button>
                </br>
                <h1 style="color:#696969;" id="Video2">Video 2</h1> <!---Aqui va el nombre del video (basedatos)--->
            </form>
            <iframe id="YouTube2" width="560" height="315" src="https://www.youtube.com" frameborder="0" allowfullscreen></iframe>
            </br>
            </br>
            <!---------------------------------División de Videos---------------------------------------------------->
            <form>
                <input type="url" class="input" id="url3" placeholder="Ingrese URL" required >
                </br>
                </br>
                <input type="text" class="input" id="nameClip3" placeholder="Ingresa Nombre del video" >
                </br>
                </br>
                <button type="button" name="btnURL" onclick="saveUrl('url3','YouTube3')">Guardar URL</button>

                <button type="button" name="btnText" onclick="changeText('nameClip3','Video3')">Cambiar Nombre</button>
                </br>
                <h1 style="color:#696969;" id="Video3">Video 1</h1> <!---Aqui va el nombre del video (basedatos)--->
            </form>
            <iframe id="YouTube3" width="560" height="315" src="https://www.youtube.com" frameborder="0" allowfullscreen></iframe>
            </br>
            </br>
            <!---------------------------------División de Videos---------------------------------------------------->

        </content>
    </article>

    <article class="Articulo2">
        <content>
            <div id="wrapper" width="350">
                <div id="menu">
                    <p class="welcome">Comentarios <b></b></p>
                    <div style="clear:both"></div>
                </div>

                <div id="chatbox"></div>

                <form name="message" action="">
                    <input name="usermsg" type="text" id="usermsg" size="60" />
                    <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
                </form>
            </div>

        </content>
    </article>

</div>
@endsection
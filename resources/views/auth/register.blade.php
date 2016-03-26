@extends('template')

@section('content')

    <div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">
    <ul id="ListaMenuLateral">
        <li><a>HOME</a>

    </ul>
</div>
<div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;" >

    <div style=" font-size:16px;background-color: whitesmoke; border-radius:10px;position: relative; top:200px; width: 700px; height: 400px; left: 200px; ">
        <!--==============================header=================================-->
         <div class="container">
        <!--==============================content================================-->
        <h3 style="font-family: sans-serif;"><strong> Registro</strong></h3>
        <form id="contact-form"  action="/auth/register" enctype="multipart/form-data" method="post" >
            {!! csrf_field() !!}
            <fieldset>
          
              
                
                
             <div class="form-group">
                <label class="col-sm-2 control-label">Usuario:</label>
                <div class="col-sm-5">
                    <input class="form-control" name="name" type="text" value="">
                </div>
            </div>
                   <br></br>
                  <div class="form-group">
                <label class="col-sm-2 control-label">Correo electrónico:</label>
                <div class="col-sm-5">
                    <input class="form-control" name="email" type="text" value="">
                </div>
            </div>
                   <br></br>
                      <div class="form-group">
                <label class="col-sm-2 control-label">Contraseña:</label>
                <div class="col-sm-5">
                    <input class="form-control" name="password" type="password" value="">
                </div>
            </div>
                   <br></br>
                      <div class="form-group">
                <label class="col-sm-2 control-label">Confirma contraseña:</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" name="password_confirmation" value="">
                </div>
            </div>

              <!--  
                
                <label>
                    <span style="font-size:16px; font-weight: bold;  font-family: sans-serif;margin-left: 148px;" class="name-input">Nombre:</span>
                    <input name="name" value="" onBlur="if(this.value=='') this.value=''" onFocus="if(this.value =='' ) this.value=''" />
                </label>
                <br></br>
                <label>
                    <span style=" font-size:16px; font-weight: bold;  font-family: sans-serif; margin-left: 165px;" class="name-input">Email:</span>
                    <input name="email" value="" onBlur="if(this.value=='') this.value=''" onFocus="if(this.value =='' ) this.value=''" />
                </label>
                <br></br>
                <label>
                    <span style=" font-size:16px; font-weight: bold; font-family: sans-serif;margin-left: 120px;" class="name-input">Contraseña:</span>
                    <input type="password" name="password" value="" onBlur="if(this.value=='') this.value=''" onFocus="if(this.value =='' ) this.value=''" />
                </label>
                <br></br>
                <label>
                    <span style="margin-left: 48px; font-family: sans-serif; font-weight: bold;"class="name-input">Confirma contraseña:</span>
                    <input type="password" name="password_confirmation" value="" onBlur="if(this.value=='') this.value=''" onFocus="if(this.value =='' ) this.value=''" />
                </label>
-->
            </fieldset>
             <div style="left:450px; position: relative;" class="container">
                <button  type="button" class="btn btn-primary">Reset</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
          
        </form>
    </div>

        </div> 

    </div>

</div>


@endsection










<!--==============================content================================-->






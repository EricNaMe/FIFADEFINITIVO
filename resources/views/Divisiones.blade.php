@extends('template')

@section('content')
        <link rel="stylesheet" href="/css/PVSP_1.css" type="text/css" media="screen">

        <script type="text/javascript">
    function seleccionaLiga()
    {
      var seleccion=document.getElementById('Liga');

      document.getElementById('textList').value=seleccion.options[seleccion.selectedIndex].value;
      document.getElementById('form1').submit();


    }
    function seleccionaEquipo()
    {

         var seleccion= document.getElementById('Equipo');
         document.getElementById('textList2').value=seleccion.options[seleccion.selectedIndex].value;
        
        document.getElementById('form2').submit();
        
     }
    function eligeUsuario()
    {
         document.getElementById('Usuario').disabled=false;
         document.getElementById('nameTeam').innerHTML=document.getElementById('textList2').value;
         
    }
    function carga()
    {
        location.href="http://localhost:8000/Divisiones";
    }


    </script>

    <?php
    error_reporting (E_ALL ^ E_NOTICE);
    ?>




             <div id="menuLateral" style="background: url(images/leftMenu.jpeg); background-size: cover;">
            
          <ul id="ListaMenuLateral">
                           <li><a href="Inicio">HOME</a></li>
              @if (Auth::check())
                  <?php $user=Auth::user();
                  ?>

                  @if($user->user_name==="Administrador22")
                      <li><a>ADMINISTRADOR</a>
                          <ul>
                              <li><a href="CrearLiga">CREAR LIGA</a></li>
                              <li><a href="#">CREAR COPA</a></li>
                              <li><a href="Divisiones">ASIGNAR EQUIPOS</a></li>
                              <li><a href="EliminarEquiposPvsP">ELIMINAR EQUIPOS</a></li>
                              <li><a href="ModificarLiga">MODIFICAR LIGA</a></li>
                              <li><a href="ModificarCopa">MODIFICAR COPA</a></li>


                          </ul>
                      </li>

                  @endif
              @endif

              <li><a>DIVISIONES LIGA</a>
                <ul>
                <li><a href="#">PRIMERA DIVISIÓN</a></li>
                    @foreach($ligas as $liga)
                        <li><a href="EncontrarLigaPlay/{{$liga->id}}">{{$liga->name}}</a></li>

                    @endforeach

                </ul>
                </li>


                <li><a>COPA</a>
                <ul>
                <li><a href="Fase1PvsP">ELIMINATORIAS</a></li>
                    @foreach($copas as $copa)
                <li><a href="EncontrarCopaPlay/{{$copa->id}}">{{$copa->name}}</a></li>

                    @endforeach
                <li><a href="Fases">PRELIMINARES 1</a></li>
                </ul>
                </li>
              <li><a href="SalaTrofeo1vs1">SALA DE TROFEOS 1VS1</a></li>
              <li><a href="Ranking1VS1">RANKING</a></li>


            </ul>
            
            
        </div>

            <div id="menuCentral" style="background:url(/images/Registro.jpg); background-size: cover; " >                
                <div class="myBox">
                    <h2 class="title3">Registro de Equipos</h2>
                    <form> 

                        <div class="ListBox1">Selecciona Liga</div>

                        <select id="Liga" onchange="seleccionaLiga()" class="select">
                            <option selected value="">Selecciona Liga</option>
                                <?php
                                $path="Imagenes";;
                                $directorio=dir($path);
                                //echo "Directorio ".$path.":<br><br>";
                                //$a=0;
                                $op="<option value=";
                                $op2="<option selected =";
                                $f='"';
                                while ($archivo = $directorio->read())
                                {
                                    if(strrpos($archivo, ".jpg")==FALSE && strrpos($archivo, ".png")==FALSE && strrpos($archivo, ".jpeg")==FALSE)
                                    {
                                        if($archivo!="." && $archivo!="..")
                                        {
                                            //$archivo=strtoupper($archivo);
                                            $archivo=  str_replace('_',' ',$archivo);           



                                            echo $op.$f.$archivo.$f.">".$archivo."</option>";

                                        }

                                    }
                                }

                                $directorio->close();
                                ?>                
                                       </select>

                      </form>
                            <form id="form1" method="get">
                                <input hidden="true"  type='text' id="textList" name='attributename' value="<?php echo !empty($_GET['attributename']) ? $_GET['attributename'] : '';?>" maxlength='30'/>                        
                            </form>
                            <?php 
                            if(!$_GET['attributename'])
                               {
                                $_GET['attubutname']="Undefine";
                                  echo "<div id=".'"'."nameTeam".'"'." class=".'"'."team".'"'.">"."LIGA"."</div>";
                               }
                               else
                               {
                                $liga= $_GET['attributename'];
                                echo "<div class=".'"'."team".'"'.">".$liga."</div>";
                                $liga= str_replace(' ','_',$liga);
                               }


                            ?>
                    <div class="ListBox2">Selecciona Equipo</div>

                    <select id="Equipo" onchange="seleccionaEquipo()" class="select">
                        <option selected value="">Selecciona Equipo</option>
                            <?php

                              $path="Imagenes/".$liga;

                              $directorio=dir($path);
                              $a=0;
                              while ($archivo = $directorio->read())
                              {
                                  if(strrpos($archivo, ".jpg")==TRUE || strrpos($archivo, ".jpeg")==TRUE || strrpos($archivo, ".png")==TRUE)
                                  {
                                      if($archivo!="." && $archivo!="..")
                                        {

                                          $archivo=  str_replace(' ','-',$archivo);           
                                          $archivo=  str_replace('_',' ',$archivo);
                                          $ar=  substr($archivo, 0, strpos($archivo,'-'));


                                          echo "<option value=".'"'.$ar.'"'.">".$ar."</option>";                            

                                        }
                                  }
                              }

                              $directorio->close();                                                  
                            ?>
                    </select> 

                    <form id="form2" method="get">
                        <input hidden="true" type='text' id="textList2" name="textList2" value="<?php echo !empty($_GET['textList2']) ? $_GET['textList2'] : '';?>" maxlength='30'/>                        
                    </form>                


                      <div class="logoEquipo">                
                     <?php    
                               
                               if(!$_GET['textList2'])
                               {
                                $_GET['textList2']="";
                                  echo "<img src=".'"'."    Images/Escudo.png".'"'."style=".'"'."width: 250px;position:relative;top:180px;".'"'.">";                                                         }
                               else
                               {              
                                $equipo= $_GET['textList2'];                            
                                $equipo=  str_replace(' ','_',$equipo);
                                $equipo .="-LOGO.png";
                                /////////////////
                                
                                $path="Imagenes/";;
                                $directorio2=dir($path);                               
                               while ($archivo = $directorio2->read())
                                {
                                    if(strrpos($archivo, ".jpg")==FALSE && strrpos($archivo, ".png")==FALSE && strrpos($archivo, ".jpeg")==FALSE)
                                    {
                                        if($archivo!="." && $archivo!="..")
                                        {
                                          $ruta = $path.$archivo; // Indicar ruta
                                           $filehandle = opendir($ruta); // Abrir archivos                                                               
                                
                                             while ($file = readdir($filehandle))
                                                {
                                                 if ($file != "." && $file != "..") 
                                                     {
                                                        if($file==$equipo)
                                                         {
                                                           $nruta= substr($ruta, strpos($ruta,"Imagenes"));
                                                           echo "<img src=".'"'."/".$nruta.'/'.$equipo.'"'."style=".'"'."width: 190px;position:relative;top:180px;".'"'.">";
                                                           echo "<script>";
                                                           echo "eligeUsuario();";
                                                           echo "</script>";
                                                           
                                                         }
                                                      } 
                                                }
                                                
                                        }

                                    }
                                }
                                closedir($filehandle); 

                                $directorio2->close();
                                

                               //echo "<img src=".'"'."/".$path."/".$equipo.'"'."style=".'"'."width: 190px;".'"'.">";   

                               }



                      ?> 
                          
                       </div>

                    <?php
                    $equipo3= $_GET['textList2'];
                    $equipo3=  str_replace('_',' ',$equipo3);

                    ?>


            </div>
                
                
                

                <form action="DivisionesAgregar" name="FormaCrearClub" method="post" class="form-horizontal" role="form" enctype=”multipart/form-data”>
                    <div style="position:relative; top:-250px" class="ListBox3"><a style="position:relative; top:-40px; left:220px;">Selecciona Usuario</a>
                    <select name="userSelect" class="select" value="Escoger usuario">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->user_name}}</option>
                        @endforeach

                    </select>
                    </div>
                    <div style="display:none;background-color:yellow; width:500px; height:300px; left:200px; position:relative; top:400px;">


                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nombre del club:</label>
                        <div class="col-sm-5">
                            <input class="form-control" name="nombreequipo"  type="text" value="{{$equipo3}}">
                        </div>
                    </div>







                </div>

            <button style="position:relative;top:-300px; left:-200px;" type="submit" name="btnEquipo" onclick="carga();">Elegir</button>
                </form>
            </div>  

@endsection


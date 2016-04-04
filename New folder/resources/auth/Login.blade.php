
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contacto</title>
    <meta charset="UTF-8">

    <!--[if lt IE 7]>

    <![endif]-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/js/html5.js"></script>
    <link rel="stylesheet" href="/css/ie.css" type="text/css" media="screen">
    <![endif]-->
</head>
<body id="page5">
<div class="extra">
    <!--==============================header=================================-->

    <!--==============================content================================-->

                                <form id="contact-form"  action="/auth/Login" enctype="multipart/form-data" method="post" >
                                    {!! csrf_field() !!}
                                    <fieldset>

                                        <label>
                                            <span class="name-input">Email:</span>
                                            <input name="email" value="" onBlur="if(this.value=='') this.value=''" onFocus="if(this.value =='' ) this.value=''" />
                                        </label>
                                        <label>
                                            <span class="name-input">Contraseña:</span>
                                            <input type="password" name="password" value="" onBlur="if(this.value=='') this.value=''" onFocus="if(this.value =='' ) this.value=''" />
                                        </label>


                                    </fieldset>

                              </form>

                                <!--	<div class="wrapper p2">
                                        <figure class="style-img-2 fleft">
                                            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="252" height="195" src="https://maps.google.com/maps?hl=en&q=Aguascalientes, Mexico&ie=UTF8&t=m&z=15&iwloc=B&output=embed"><div><small><a href="http://embedgooglemaps.com">embedgooglemaps.com</a></small></div><div><small><a href="http://bmwcritics.org/">Music Box</a></small></div></iframe>
                                        </figure>
                                    </div> -->




<!--==============================footer=================================-->

<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>







<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/MenuPrincipalCSS3.css" type="text/css" media="screen">
    <script src="/js/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="/js/notify.min.js" type="text/javascript"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <title></title>

    <script>
        $(function(){
            var errors = <?php echo  json_encode($errors->has() ? $errors->all() : []); ?>;
            errors.forEach(function(value){
                $.notify(value);
            });
        });

        $(function(){
            var success = <?php echo  json_encode(Session::get('message')); ?>;
            if(success){
                $.notify(success, 'success');
            }
        });
    </script>
</head>
<body>
    @include('partial.navbar')
    @yield('content')
</body>

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
</script>

</html>













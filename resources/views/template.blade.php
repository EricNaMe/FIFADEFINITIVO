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
    </script>
</head>
<body>
    @yield('content')
</body>
</html>













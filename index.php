<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Control de Calidad</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
        border-color: #5AC9A8;

        background-color: #5AC9A8;
        color: white;
        padding: 5px;
        font-size: 18px;
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}

    /* Set gray background color and 100% height */
    .sidenav {
        padding-top: 20px;
        background-color: #f1f1f1;
        height: 100%;
    }
    .panel  {
        background-color: #5AC9A8
    }

    /* Set black background color, white text and some padding */
    footer {

        background-color: #5AC9A8;
        color: white;
        padding: 15px;
    }
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
        width: 70%;
        margin: auto;
    }
    #lateral {

        background-color: #fff;
    }
    ul {
        list-style-type:none;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
        .sidenav {
            height: auto;
            padding: 15px;
        }
        .row.content {height:auto;}



    }
</style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
    </script>
    <script>
        $(document).ready(function(){


            $.getJSON("http://jsonplaceholder.typicode.com/photos",function(result){
                $.each(result, function(i, field){
//                             console.log(field);
                    $('#lateral >table ').append('<tr style="text-align: left;" "><td><input type="hidden" id="url_img'+i+'" value="'+ field.thumbnailUrl+'"> <img id="img_'+i+'" style="padding: 20px;" height="150px" width="auto" src="'+  field.thumbnailUrl +'" alt="Smiley face"></td><td><p>'+ field.title +'</p></td></tr>');

                    $('#img_'+i+'').click(function () {
                        $('#content').html('');
                        $('#content').html('<img height="400px" width="80%" style="padding: 20px;" src="'+  $('#url_img'+i+'').val()+'" >');
                    });
                })
                ;
                $('#content').append('<div class=".img-thumbnail" class=" "><img  style="padding: 0px;" src="'+  result[0].url +'" alt="Smiley face" height="400px" width="80%" ><p>'+ result[0].title +'</p></div>');

            });
            $.getJSON("http://jsonplaceholder.typicode.com/users",function(result){
//
                $("#username").append('<a style="" href="#">'+ result[0].name +' <span class="glyphicon glyphicon-user"></span></a>');

            });
        });
    </script>
</head>
<body>

<nav class="navbar navbar-inverse navbar-success">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-left">
                <li style="background-color: #f1f1f1;"><a  style="" href="#"><span  class="glyphicon glyphicon-align-justify"></span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li ><a href="#"><span class="glyphicon glyphicon-bell"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-cloud"></span></a></li>
                <li style="background-color: #f1f1f1;" id="username" class="">

                    <ul class="dropdown-menu">
                        <li><a href="#">Perfil</a></li>
                        <li><a href="#">Cerrar Session</a></li>
                        <li><a href="#">Recuperar contraseña</a></li>
                    </ul>

                </li>
               <li> <div class="dropdown">
                    <button style="background-color: transparent; padding: 15px;" class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Perfil</a></li>
                        <li><a href="#">Cerrar Session</a></li>
                        <li><a href="#">Recuperar contraseña</a></li>
                    </ul>
                </div></li>


            </ul>

        </div>
    </div>
</nav>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <div class="panel ">
                <a class="text" style="color: #ffffff;" href="index.php"><div class="panel-heading"  >Pagina principal</div></a>
                <a class="text" style="color: #5AC9A8;" href="galeria.php"><div class="panel-footer">Galeria</div></a>
            </div>

        </div>
        <div class="col-sm-7 text-left">


            <body>


            <div id="content" style="text-align: center;">
<div class="content2"></div>
            </div>

        </div>
        <aside id="lateral" style="overflow: scroll; overflow-x: hidden;" class="col-sm-3 sidenav">

            <table></table>
        </aside>
    </div>
</div>

<footer class="container-fluid text-center">
    <p>Footer Text</p>
</footer>



</body>
</html>
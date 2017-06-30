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
            background-color: #5AC9A8;
        }

        /* Set black background color, white text and some padding */
        footer {

            background-color: #5AC9A8;
            color: white;
            padding: 15px;
        }
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
         width: 100%;
            height: 500px;

        }

        ul {
            list-style-type:none;
        }

        /*         Just for demo     */
        body {

            text-align: center;
        }
        #carousel-example-generic {
            display: inline-block;
        }
        /*****************************/

        /* Plugin styles */
        ul.thumbnails-carousel {
            padding: 0px 0 0 0;
            margin: 0;
            list-style-type: none;
            text-align: center;
        }
        ul.thumbnails-carousel .center {
            display: inline-block;
        }
        ul.thumbnails-carousel li {
            margin-right: 5px;
            float: left;
            cursor: pointer;
        }
        .controls-background-reset {
            background: none !important;
        }
        .active-thumbnail {
            opacity: 0.4;
        }
        .indicators-fix {
            bottom: 100px;
        }
        .text { font-family:verdana; text-decoration:none}
        .text:hover { font-family:verdana; text-decoration:none}

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height:auto;}



        }

    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
        // thumbnails.carousel.js jQuery plugin
        $(document).ready(function() {
            $.getJSON("http://jsonplaceholder.typicode.com/photos", function (result) {
                $('#content').find('.carousel-inner').append('<div class="item active srle"><img src="'+result[0].url+'" alt="1.jpg" class="img-responsive"><div class="carousel-caption"><p> '+result[0].title   +' </p></div></div>');


                $.each(result, function (i, field) {

                        $('#content').find('.carousel-inner').append('<div class="item  srle"><img src="'+field.url+'" alt="1.jpg" class="img-responsive"><div class="carousel-caption"><p> '+field.title   +' </p></div></div>');


//                        $('#content').find('.thumbnails-carousel').append('<li><img style="width: 10px;" src="'+field.thumbnailUrl+'"></li>');


//                        $('#content').find('.thumbnails-carousel').append('<li><img style="width: 10px;" src="'+field.thumbnailUrl+'"></li>');


                })
                ;

            });
        });
        (function(window, $, undefined) {

            var conf = {
                center: true,
                backgroundControl: false
            };

            var cache = {
                $carouselContainer: $('.thumbnails-carousel').parent(),
                $thumbnailsLi: $('.thumbnails-carousel li'),
                $controls: $('.thumbnails-carousel').parent().find('.carousel-control')
            };

            function init() {
                cache.$carouselContainer.find('ol.carousel-indicators').addClass('indicators-fix');
                cache.$thumbnailsLi.first().addClass('active-thumbnail');

                if(!conf.backgroundControl) {
                    cache.$carouselContainer.find('.carousel-control').addClass('controls-background-reset');
                }
                else {
                    cache.$controls.height(cache.$carouselContainer.find('.carousel-inner').height());
                }

                if(conf.center) {
                    cache.$thumbnailsLi.wrapAll("<div class='center clearfix'></div>");
                }
            }

            function refreshOpacities(domEl) {
                cache.$thumbnailsLi.removeClass('active-thumbnail');
                cache.$thumbnailsLi.eq($(domEl).index()).addClass('active-thumbnail');
            }

            function bindUiActions() {
                cache.$carouselContainer.on('slide.bs.carousel', function(e) {
                    refreshOpacities(e.relatedTarget);
                });

                cache.$thumbnailsLi.click(function(){
                    cache.$carouselContainer.carousel($(this).index());
                });
            }

            $.fn.thumbnailsCarousel = function(options) {
                conf = $.extend(conf, options);

                init();
                bindUiActions();

                return this;
            }

        })(window, jQuery);

        $('.thumbnails-carousel').thumbnailsCarousel();
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
                        <li><a  href="#">Perfil</a></li>
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
                <a class="text" style="color: #5AC9A8;" href="index.php"><div class="panel-footer">Pagina principal</div></a>
                <a class="text" style="color: #ffffff;" href="galeria.php"><div class="panel-heading">Galeria</div></a>
            </div>

        </div>
        <div class="col-sm-6 text-left">


            <body>


            <div id="content" style="text-align: ;">
                <div class="container" style="background-color: #F1F1F1;">

                    <!-- bootstrap carousel -->
                    <div id="carousel-example-generic" class="carousel slide" style="width: 100%;" data-ride="carousel" data-interval="false">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">

                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">



                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>

                        <!-- Thumbnails -->
                        <ul class="thumbnails-carousel clearfix" >

                        </ul>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

<footer class="container-fluid text-center">
    <p>Footer Text</p>
</footer>



</body>
</html>
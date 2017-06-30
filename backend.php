<?php

require_once('basededatos.php');
$msje="";
?>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>


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
        body{

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


    <script>
        $(document).ready(function(){
            $('#nombre_solicitante')

            $.fn.datepicker.defaults.format = "yyyy-mm-dd";

            $('#txt_fecha_aut').datepicker({


            });

            console.log(new Date());
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
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Registro de usuario</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <form class="col-md-6 col-md-offset-3" name="form1" action="code.php" method="post">
                                   <div ><label for="">nombre</label> <input class=" form-control " type="text" value="" id="txt_nombre" name="txt_nombre" required  placeholder="Nombre de solicitante"><br>
                            </div><label for="">apellido</label> <input class="form-control" type="text" value="" id="txt_apellido" name="txt_apellido" required  placeholder="Apellido del solicitante"><br>
                                    <label for="">cedula</label> <input type="text" value="" class="form-control" id="txt_cedula" name="txt_cedula" required  placeholder="Cedula del solicitante"><br>
                                    <label for="">telf movil</label><input type="text" value="" id="txt_TelfMovil" class="form-control" name="txt_TelfMovil" required  placeholder="Telefono Movil"><br>
                                    <label for="">telf casa</label><input type="text" value="" id="txt_TelfCasa" name="txt_TelfCasa" class="form-control" required  placeholder="Telefono Casa" ><br>

                                    <button type="submit" name="btn-aceptar" class="btn btn-primary btn-block">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Registro de prestamos</a>
                            </h4>
                        </div>
<!--                        --><?php
//                        $result2 = $user1->getAlluser();
//                        foreach ($result2 as $key => $value) {
//                            var_dump($value);
//
//
//                        }?>
                        <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body ">
                                <form class="col-md-6 col-md-offset-3" name="form2" action="code.php" method="post">
                                    Nombre del solicitante  <select class="form-control" name="nombre_solicitante" id="nombre_solicitante">
                                        <option value="">Seleccione..</option>
                                        <?php
                                        $result2 = $user1->getAlluser();
                                        foreach ($result2 as $key => $value) {
                                            var_dump($value);
                                            # code...
                                            echo ' <option value="'.$value[0].'">'.$value[2].' '. $value[3].' - C.I:'.$value[1].' </option>'
                                            ?>

                                        <?php }?>
                                    </select>
                                    <br>
                                    Monto Prestamo <input class="form-control" type="text" value="" id="txt_monto" name="txt_monto" required  placeholder="Monto de prestamo"><br>
                                    Cantidad de cuotas <select class="form-control" name="txt_nrocuotas" id="txt_nrocuotas"  placeholder="Cantidad de cuotas del pago" required data-placement="bottom">
                                        <option value="0">Seleccione..</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>

                                    <br>
                                    fecha_autorizacion <div style="" class='input-group date col-xs-12 col-md-12 col-sm-12'>
                                        <input type="text" class="form-control fecha" name="txt_fecha_aut" id="txt_fecha_aut"  placeholder="Fecha de autorizacion" required data-placement="bottom" />
                                        <span class="input-group-addon" id="fecha">
									<span class="glyphicon glyphicon-calendar" data-toggle="tooltip" data-placement="top" title='Fecha de Autorizacion'></span>
								</span>
                                    </div>
                                 <br>

<!--                                    fecha_entrega  <div style="" class='input-group date col-xs-12 col-md-12 col-sm-12'>-->
<!--                                        <input value="--><?php //echo $nuevafecha;?><!--" type="text" class="form-control fecha" name="txt_fecha_ent" id="txt_fecha_ent"  placeholder="Fecha de Entrega" required data-placement="bottom" />-->
<!--                                       <input value="--><?php //echo $nuevafecha;?><!--" type="text" class="form-control fecha" name="txt_fecha_ent" id="txt_fecha_ent"  placeholder="Fecha de Entrega" required data-placement="bottom" />-->
<!--                                        <span class="input-group-addon" id="fecha">-->
<!--									<span class="glyphicon glyphicon-calendar" data-toggle="tooltip" data-placement="top" title='Fecha de Entrega'></span>-->
<!--								</span>-->
<!--                                    </div>-->
                                    <br>



                                    <button type="submit" name="btn-aceptar2" class="btn btn-primary btn-block">Guardar</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">consulta</a>
                            </h4>
                        </div>

                        <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">Proximamente</div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
        <aside id="lateral" style="overflow: scroll; overflow-x: hidden;" class="col-sm-3 sidenav">

            <table></table>
        </aside>
    </div>
</div>

<footer class="container-fluid text-center">
    <p><?php echo $msje; ?></p>
</footer>



</body>
</html>

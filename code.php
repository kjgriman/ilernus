<?php

require_once('basededatos.php');
$msje="";
if (isset($_POST['btn-aceptar2'])){
    try{
        $cod_solicitante=$_POST['nombre_solicitante'];
        $valor_prestamo=$_POST['txt_monto'];
        $nro_cuota=$_POST['txt_nrocuotas'];
        $fecha_autorizacion=$_POST['txt_fecha_aut'];
//echo $txt_fecha_aut,$txt_nrocuotas,$txt_monto,$nombre_solicitante;

        $date= $fecha_autorizacion;

        $fecha_entrega = strtotime ( '+7 day' , strtotime ( $date ) ) ;
        $fecha_entrega = date ( 'Y-m-d' , $fecha_entrega );

        $fecha_autorizacion_max = date ( 'Y-m-20' );
        $fecha_registro=date('Y-m-d');
        $result3 = $user1->getmontosprestamos($cod_solicitante);
//        $r=implode ( "," , $result3 );
//        print_r ($result3[0]['total_prestamo']);
//        echo $r;
        $precio=$result3[0]['total_prestamo']+$valor_prestamo;
        $valor_maximo_prestamo=1000000;
//        echo $precio;
        if ($precio>$valor_maximo_prestamo){
            echo 'a superado el valor maximo de prestamos permitidos el cual debe ser inferior a '.$valor_maximo_prestamo;
        }
        elseif($fecha_autorizacion>$fecha_autorizacion_max){
            echo 'la fecha de autorizacion no puede ser debe estar dentro los primeros 20 dias del mes <br> <a href="backend.php">Volver<br> <br> </a>';

        }
        else{

            $nro2 = $user1->registerPrestamo($cod_solicitante,$valor_prestamo,$nro_cuota,$fecha_autorizacion,$fecha_entrega,$fecha_registro);
            $xxx =$user1 ->getprestamos($cod_solicitante);
            $yyy =$user1 ->getcuotas($xxx[0]['nro_prestamo']);

//
//echo '<br><br><strong>Informacion del prestamo</strong><br><br>';
//                print_r(' nro_prestamo: '.$xxx[0]['nro_prestamo'].'<br>');
//                print_r( 'cod_solicitante: '.$xxx[0]['cod_solicitante'].'<br>');
//                print_r(' valor_prestamo:'.$xxx[0]['valor_prestamo'].'Bs.<br>');
//                print_r( 'nro_cuota:'.$xxx[0]['nro_cuota'].'<br>');
//                print_r(' fecha_autorizacion :'.$xxx[0]['fecha_autorizacion'].'<br>');
//                print_r(' fecha_entrega :'.$xxx[0]['fecha_entrega'].'<br>');
//                print_r(' fecha_registro :'.$xxx[0]['fecha_registro'].'<br>');
//for ($e=0;$e<count($yyy);$e++){
//    print_r('fecha_cuota nro:'.$e.' '. $yyy[$e]['fecha_cuota'].'<br>');
//    print_r('monto_cuota nro:'.$e.' '. $yyy[$e]['monto_cuota'].'Bs.<br>');
//
//}?>

            <!DOCTYPE html>
            <html lang="en">
            <head>
                <title>Bootstrap Example</title>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            </head>
            <body>

            <div class="container">
                <h2>Informacion Prestamo</h2>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>nro prestamo</th>
                        <th>cod solicitante</th>
                        <th>valor prestamo</th>

                        <th>cantidad decuota</th>
                        <th>fecha autorizacion</th>
                        <th>fecha entrega</th>
                        <th>fecha registro</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td> <?php print_r(''.$xxx[0]['nro_prestamo'].'');?></td>
                        <td> <?php print_r( ' '.$xxx[0]['cod_solicitante'].'');?></td>
                        <td><?php  print_r(''.$xxx[0]['valor_prestamo'].'Bs.'); ?></td>
                        <td><?php   print_r( ''.$xxx[0]['nro_cuota'].''); ?></td>
                        <td><?php    print_r(''.$xxx[0]['fecha_autorizacion'].''); ?></td>
                        <td><?php   print_r( ''.$xxx[0]['fecha_entrega'].''); ?></td>
                        <td><?php   print_r( ''.$xxx[0]['fecha_registro'].''); ?></td>
                    </tr>

                    </tbody>
                </table>
            </div> <div class="container">
                <h2>Informacion de las cuotas</h2>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nro de cuota</th>
                        <th>fecha cuota</th>
                        <th>monto cuota</th>


                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for ($e=0;$e<count($yyy);$e++){
                        ?>
                    <tr> <td>
                            <?php
                            print_r($e+1);


                            ?>

                        </td>
                        <td>
                            <?php
                            print_r( $yyy[$e]['fecha_cuota']);


                            ?>

                        </td>

                        <td> <?php
                            print_r( $yyy[$e]['monto_cuota'].'Bs.');
                            ?></td>
                    </tr>

                    <?php }

                    ?>






                    </tbody>
                </table>
            </div>

            </body>
            </html>



            <?php


        }






////                                    echo $nuevafecha;
//    echo $fecha_autorizacion.'<br>';
//    echo $fecha_entrega.'<br>';
//    echo $fecha_autorizacion.'<br>';


    }

    catch(Exception $e)
    {
        return Redirect::back()
            ->withInput()
            ->withErrors('Error inesperado'.$e->getLine());

    }

}

if(isset($_POST['btn-aceptar'])){
    try{



        $cedula = $_POST['txt_cedula'];
        $nombre = $_POST['txt_nombre'];
        $apellido = $_POST['txt_apellido'];
        $telf_movil = $_POST['txt_TelfMovil'];
        $telf_casa = $_POST['txt_TelfCasa'];

        //echo          $cedula ,
        //        $nombre ,
        //        $apellido ,
        //        $telf_movil,
        //        $telf_casa ;


        $nro1 = $user1->registerUser1($cedula,$nombre,$apellido,$telf_movil,$telf_casa);

        $msje="Registro guardado satisfactoriamente";

    }

    catch(Exception $e)
    {
        return Redirect::back()
            ->withInput()
            ->withErrors('Error inesperado'.$e->getLine());

    }
}
?>
<?php

class USER1
{

    private $db1;

    function __construct($DB_con1)
    {
        $this->db1 = $DB_con1;
    }


    public function registerUser1($cedula,$nombre,$apellido,$telf_movil,$telf_casa)
    {
        try {


            $stmt = $this->db1->prepare("INSERT INTO  solicitante (	cedula,nombre,apellido,telf_movil,telf_casa)
VALUES(:cedula,:nombre,:apellido,:telf_movil,:telf_casa)");

            $stmt->bindparam(":cedula", $cedula);
            $stmt->bindparam(":nombre", $nombre);
            $stmt->bindparam(":apellido", $apellido);
            $stmt->bindparam(":telf_movil", $telf_movil);
            $stmt->bindparam(":telf_casa", $telf_casa);
            $stmt->execute();

//            return $this->db1->lastInsertId() . '<br />';


        } catch (PDOException $e) {
            echo $e->getMessage() . ", line: " . $e->getLine();
        }
    }

    public function registerPrestamo($cod_solicitante,$valor_prestamo,$nro_cuota,$fecha_autorizacion,$fecha_entrega,$fecha_registro)
    {
        try {


            $stmt = $this->db1->prepare("INSERT INTO  prestamos (	cod_solicitante,valor_prestamo,nro_cuota,fecha_autorizacion,fecha_entrega,fecha_registro)
VALUES( :cod_solicitante,:valor_prestamo,:nro_cuota,:fecha_autorizacion,:fecha_entrega,:fecha_registro)");

            $stmt->bindparam(":cod_solicitante", $cod_solicitante);
            $stmt->bindparam(":valor_prestamo", $valor_prestamo);
            $stmt->bindparam(":nro_cuota", $nro_cuota);
            $stmt->bindparam(":fecha_autorizacion", $fecha_autorizacion);
            $stmt->bindparam(":fecha_entrega", $fecha_entrega);
            $stmt->bindparam(":fecha_registro", $fecha_registro);
            $stmt->execute();
            $nro_prestamo1 = $this->db1->lastInsertId();
            echo '<h1 >Registro exitoso con el id de prestamo nro: '.$nro_prestamo1.'</h1><br><a href="backend.php">Volver</a>';
            $valor_cuota=$valor_prestamo / $nro_cuota;

//            return $this->db1->lastInsertId() . '<br />';
//            return $this->getAllprestamos;
//



//                echo date_format($fecha_cuota, 'Y-m-d').'<br>';

                for($a = 0;$a<$nro_cuota;$a++){
            try{
                if ($a==0) {


                    $fecha_cuota = strtotime ( '+30 day' , strtotime ( $fecha_entrega     ) ) ;
                    $fecha_cuota = date ( 'Y-m-d' , $fecha_cuota );


//
                } else {

                    $fecha_cuota = strtotime ( '+30 day' , strtotime ( $fecha_cuota ) ) ;
                    $fecha_cuota = date ( 'Y-m-d' , $fecha_cuota );

//
                }
                $stmt1 = $this->db1->prepare("INSERT INTO  cuota ( nro_prestamo,fecha_cuota,nro_cuota,monto_cuota)
VALUES( :nro_prestamo,:fecha_cuota,:nro_cuota,:monto_cuota)");
                $stmt1->bindparam(":nro_prestamo", $nro_prestamo1);
                $stmt1->bindparam(":fecha_cuota", $fecha_cuota);
                $stmt1->bindparam(":nro_cuota",$a);
                $stmt1->bindparam(":monto_cuota", $valor_cuota);

                $stmt1->execute();
}catch (PDOException $e) {
                echo $e->getMessage() . ", line: <<br>  >" . $e->getLine();
            }

            }
//enviar mail
            $Name = "ilernus";
            $email = "orojas@ilernus.com";
            $recipient = "PersonWhoGetsIt@emailadress.com";
            $mail_body = "prestamo registrado";
            $subject = "Subject for reviever";
            $header = "From: ". $Name . " <" . $email . ">\r\n";

            mail($recipient, $subject, $mail_body, $header);

        } catch (PDOException $e) {
            echo $e->getMessage() . ", line: " . $e->getLine();
        }
    }

    public function getAlluser()
    {
        try
        {
            $stmt = $this->db1->prepare("SELECT * FROM solicitante ORDER BY cod_solicitante");

            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function getAllinfoprestamo()
    {
        try
        {
            $stmt = $this->db1->prepare("SELECT * FROM prestamos INNER JOIN cuota ON prestamos.nro_prestamo  = cuota.nro_prestamo ;");

            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function getmontosprestamos($cod_solicitante)
    {
        try
        {
            $stmt = $this->db1->prepare("SELECT sum(valor_prestamo) AS total_prestamo FROM prestamos WHERE cod_solicitante= $cod_solicitante");

            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function getAllprestamos()
    {
        try
        {
            $stmt = $this->db1->prepare("SELECT * FROM prestamos ORDER BY nro_prestamo");

            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function getprestamos($cod_solicitante)
    {
        try
        {
            $stmt = $this->db1->prepare("SELECT * FROM prestamos WHERE cod_solicitante =$cod_solicitante order BY nro_prestamo DESC ");

            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function getcuotas($nro_prestamo)
    {
        try
        {
            $stmt = $this->db1->prepare("SELECT * FROM cuota WHERE nro_prestamo=$nro_prestamo order BY nro_cuota ASC ");

            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

}

?>
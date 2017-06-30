<?php
session_start();

$DB_host = "localhost";

$DB_user = "root";
$DB_pass = "";

$DB_name = "ilernus_prueba";

try
{
    $DB_con1 = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    $DB_con1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//      echo "Conexion exitosa";
}
catch(PDOException $e)
{
    echo $e->getMessage();
}


include_once 'class.user1.php';
$user1 = new USER1($DB_con1);

//include_once 'class.ficha.php';
//$ficha = new FICHA($DB_con);
//
//include_once 'class.resultado.php';
//$resultado = new RESULTADO($DB_con);
//
//include_once 'class.archivo.php';
//$archivo = new ARCHIVO($DB_con);
//

?>
<?php
//Esto es por si las diules.
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
$host = "localhost";
$usuario = "root";
$password = "usbw";
$base = "inventario";
$con = mysqli_connect($host, $usuario, $password, $base);
//Importante porque por alguna razon murio en mi compu.
$con->set_charset("utf8");
if(mysqli_connect_errno()){
    echo "Error en la conexion de MySQL: ".mysqli_connect_error();
    exit();
}
//Para establecer que devolvemos json, con utf-8
header('Content-Type: application/json;charset=utf-8');  


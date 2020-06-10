<?php
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
$host = "localhost";
$usuario = "phpmyadmin";
$password = "admin";
$base = "inventario";
$con = mysqli_connect($host, $usuario, $password, $base);

if(mysqli_connect_errno()){
    echo "Error en la conexion de MySQL: ".mysqli_connect_error();
    exit();
}

<?php
    $host = "localhost";
    $usuario = "root";
    $password = "admin";
    $base = "inventario";
    $con = mysqli_connect($host, $usuario, $password, $base);

    if(mysqli_connect_errno()){
        echo "Error en la conexion de MySQL: ".mysqli_connect_error();
        exit();
    }
?>
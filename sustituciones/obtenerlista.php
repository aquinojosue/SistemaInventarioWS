<?php
include("../db.php");
$resultado = $con->query("select * from SUSTITUCIONES");
$salida = $resultado->fetch_all(MYSQLI_ASSOC);
echo json_encode($salida,JSON_UNESCAPED_UNICODE);
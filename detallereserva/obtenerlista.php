<?php
include("../db.php");
$resultado = $con->query("select * from DETALLERESERVA");
$salida = $resultado->fetch_all(MYSQLI_ASSOC);
echo json_encode($salida,JSON_UNESCAPED_UNICODE);
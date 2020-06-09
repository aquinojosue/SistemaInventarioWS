<?php
include("..\db.php");
$resultado = $con->query("select * from catalogoequipo");
$salida = $resultado->fetch_all(MYSQLI_ASSOC);
echo json_encode($salida);
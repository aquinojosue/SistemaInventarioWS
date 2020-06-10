<?php
include("../db.php");
$resultado = $con->query("select * from DOCENTE");
$salida = $resultado->fetch_all(MYSQLI_ASSOC);
//JSON_UNESCAPED_UNICODE para que poga las tildes y todo lo demas sin necesidad de convertirlo.
echo json_encode($salida,JSON_UNESCAPED_UNICODE);
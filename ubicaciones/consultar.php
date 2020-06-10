<?php
include("../db.php");
//Obtenemos el parametro por medio de json.
if (isset($_POST['elementoConsulta'])) {
    $obj = json_decode($_POST["elementoConsulta"], false);
    $stmt = $con->prepare("SELECT * FROM UBICACIONES WHERE UBICACION_ID = ?");
    $stmt->bind_param("i", $obj->ubicacion_id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $salida = $resultado->fetch_all(MYSQLI_ASSOC);

    echo json_encode($salida,JSON_UNESCAPED_UNICODE);
    $stmt->close();
}
$con->close();
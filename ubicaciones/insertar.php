<?php
include("../db.php");
$respuesta = array('resultado' => 0);
//Obtenemos el parametro por medio de json.
if (isset($_POST['elementoInsertar'])) {
    $obj = json_decode($_POST["elementoInsertar"], false);

    $stmt = $con->prepare("INSERT INTO UBICACIONES VALUES(?, ?)");

    $stmt->bind_param('is', $obj->ubicacion_id, $obj->ubicacion_nombre);
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        $respuesta = array('resultado' => 1);
    }

    $stmt->close();
}
echo json_encode($respuesta);
$con->close();
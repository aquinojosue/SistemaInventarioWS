<?php
include("../db.php");
$respuesta = array('resultado' => 0);
if (isset($_POST['elementoActualizar'])) {
    $obj = json_decode($_POST["elementoActualizar"], false);

    $stmt = $con->prepare("UPDATE MOTIVO SET MOTIVO_NOMBRE = ? WHERE MOTIVO_ID = ?");
    $stmt->bind_param('si', $obj->motivo_nombre, $obj->motivo_id);
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        $respuesta = array('resultado' => 1);
    }
    $stmt->close();
}
echo json_encode($respuesta);
$con->close();
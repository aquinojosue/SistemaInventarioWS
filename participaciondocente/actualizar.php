<?php
include("../db.php");
$respuesta = array('resultado' => 0);
if (isset($_POST['elementoActualizar'])) {
    $obj = json_decode($_POST["elementoActualizar"], false);

    $stmt = $con->prepare("UPDATE PARTICIPACIONDOCENTE SET PARTICIPACION_ID = ? WHERE ESCRITO_ID = ? AND DOCENTES_ID = ?");
    $stmt->bind_param('iii', $obj->participacion_id, $obj->escrito_id, $obj->docentes_id);
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        $respuesta = array('resultado' => 1);
    }
    $stmt->close();
}
echo json_encode($respuesta);
$con->close();
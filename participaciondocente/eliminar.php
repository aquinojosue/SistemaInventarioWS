<?php
include("../db.php");
$respuesta = array('resultado' => 0);
if (isset($_POST['elementoEliminar'])) {
    $obj = json_decode($_POST["elementoEliminar"], false);
    $stmt = $con->prepare("DELETE FROM participaciondocente WHERE escrito_id = ? AND docentes_id = ?");
    $stmt->bind_param("ii", $obj->escrito_id, $obj->docentes_id);
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        $respuesta = array('resultado' => 1);
    }
    $stmt->close();
    echo json_encode($respuesta);
}
$con->close();
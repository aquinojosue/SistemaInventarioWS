<?php
include("../db.php");
$respuesta = array('resultado' => 0);
if (isset($_POST['elementoEliminar'])) {
    $obj = json_decode($_POST["elementoEliminar"], false);
    $stmt = $con->prepare("DELETE FROM DOCENTE WHERE DOCENTES_ID = ?");
    $stmt->bind_param("i", $obj->docentes_id);
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        $respuesta = array('resultado' => 1);
    }
    $stmt->close();
    echo json_encode($respuesta);
}
$con->close();
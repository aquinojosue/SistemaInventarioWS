<?php
include("../db.php");
$respuesta = array('resultado' => 0);
if (isset($_POST['elementoEliminar'])) {
    $obj = json_decode($_POST["elementoEliminar"], false);
    $stmt = $con->prepare("DELETE FROM DETALLEAUTOR WHERE HORA_ID = ? AND DIA_COD = ? AND PRESTAMO_ID = ?");
    $stmt->bind_param('iii', $obj->hora_id, $obj->dia_cod, $obj->prestamo_id);
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        $respuesta = array('resultado' => 1);
    }
    $stmt->close();
    echo json_encode($respuesta);
}
$con->close();
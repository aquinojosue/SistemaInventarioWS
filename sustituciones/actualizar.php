<?php
include("..\db.php");
$respuesta = array('resultado' => 0);
if (isset($_POST['elementoActualizar'])) {
    $obj = json_decode($_POST["elementoActualizar"], false);

    $stmt = $con->prepare("UPDATE SUSTITUCIONES SET MOTIVO_ID = ?, EQUIPO_OBSOLETO_ID = ?, EQUIPO_REEMPLAZO_ID = ?, DOCENTES_ID = ? WHERE SUSTITUCION_ID = ?");
    $stmt->bind_param('iiiii',
        $obj->sustitucion_id,
        $obj->motivo_id,
        $obj->equipo_obsoleto_id,
        $obj->equipo_reemplado_id,
        $obj->docentes_id
    );
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        $respuesta = array('resultado' => 1);
    }
    $stmt->close();
}
echo json_encode($respuesta);
$con->close();
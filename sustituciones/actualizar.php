<?php
include("..\db.php");
$respuesta = array('resultado' => 0);
if (isset($_POST['elementoActualizar'])) {
    $obj = json_decode($_POST["elementoActualizar"], false);

    $stmt = $con->prepare("UPDATE sustituciones SET motivo_id = ?, equipo_obsoleto_id = ?, equipo_reemplazo_id = ?, docentes_id = ? WHERE sustitucion_id = ?");
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
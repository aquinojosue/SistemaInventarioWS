<?php
include("../db.php");
$respuesta = array('resultado' => 0);
//Obtenemos el parametro por medio de json.
if (isset($_POST['elementoInsertar'])) {
    $obj = json_decode($_POST["elementoInsertar"], false);

    $stmt = $con->prepare("INSERT INTO SUSTITUCIONES VALUES(null,?, ?, ?, ?)");

    $stmt->bind_param('iiii',
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
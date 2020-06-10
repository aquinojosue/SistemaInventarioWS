<?php
include("../db.php");
$respuesta = array('resultado' => 0);
//Obtenemos el parametro por medio de json.
if (isset($_POST['elementoInsertar'])) {
    $obj = json_decode($_POST["elementoInsertar"], false);

    $stmt = $con->prepare("INSERT INTO MOVIMIENTOINVENTARIO VALUES(null,?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param('iiisssii',
        $obj->tipo_movimiento_id,
        $obj->docentes_id,
        $obj->equipo_id,
        $obj->descripcion,
        $obj->prestamo_fecha_ini,
        $obj->prestamo_fecha_fin,
        $obj->prestamo_permanente,
        $obj->prestamo_activo
    );
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        $respuesta = array('resultado' => 1);
    }

    $stmt->close();
}
echo json_encode($respuesta);
$con->close();
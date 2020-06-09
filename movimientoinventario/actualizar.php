<?php
include("../db.php");
$respuesta = array('resultado' => 0);
if (isset($_POST['elementoActualizar'])) {
    $obj = json_decode($_POST["elementoActualizar"], false);

    $stmt = $con->prepare("UPDATE MOVIMIENTOINVENTARIO SET TIPO_MOVIMIENTO_ID = ?, DOCENTES_ID = ?, EQUIPO_ID = ?, DESCRIPCION = ?, PRESTAMO_FECHA_INI = ?, PRESTAMO_FECHA_FIN = ?, PRESTAMO_PERMANENTE = ?, PRESTAMO_ACTIVO = ? WHERE PRESTAMO_ID = ?");
    $stmt->bind_param('iiisssiii',
        $obj->tipo_movimiento_id,
        $obj->docentes_id,
        $obj->equipo_id,
        $obj->descripcion,
        $obj->prestamo_fecha_ini,
        $obj->prestamo_fecha_fin,
        $obj->prestamo_permanente,
        $obj->prestamo_activo,
        $obj->prestamo_id
    );
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        $respuesta = array('resultado' => 1);
    }
    $stmt->close();
}
echo json_encode($respuesta);
$con->close();
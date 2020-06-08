<?php
include("..\db.php");
$respuesta = array('resultado' => 0);
if (isset($_POST['elementoActualizar'])) {
    $obj = json_decode($_POST["elementoActualizar"], false);

    $stmt = $con->prepare("UPDATE movimientoinventario SET tipo_movimiento_id = ?, docentes_id = ?, equipo_id = ?, descripcion = ?, prestamo_fecha_ini = ?, prestamo_fecha_fin = ?, prestamo_permanente = ?, prestamo_activo = ? WHERE prestamo_id = ?");
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
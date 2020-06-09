<?php
include("../db.php");
$respuesta = array('resultado' => 0);
if (isset($_POST['elementoActualizar'])) {
    $obj = json_decode($_POST["elementoActualizar"], false);

    $stmt = $con->prepare("UPDATE DESCARGOS SET UBICACION_ORIGEN_ID = ?, UBICACION_DESTINO_ID = ?, DESCARGO_FECHA = ? WHERE DESCARGO_ID = ?");
    $stmt->bind_param('iisi',
    	$obj->ubicacion_origen_id,
    	$obj->ubicacion_destino_id,
    	$obj->descargo_fecha,
    	$obj->descargo_id
    );
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        $respuesta = array('resultado' => 1);
    }
    $stmt->close();
}
echo json_encode($respuesta);
$con->close();
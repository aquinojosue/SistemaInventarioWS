<?php
include("../db.php");
$respuesta = array('resultado' => 0);
//Obtenemos el parametro por medio de json.
if (isset($_POST['elementoInsertar'])) {
    $obj = json_decode($_POST["elementoInsertar"], false);

    $stmt = $con->prepare("INSERT INTO DESCARGOS VALUES(null,?, ?, ?)");

    $stmt->bind_param('iis',
    	$obj->ubicacion_origen_id,
    	$obj->ubicacion_destino_id,
    	$obj->descargo_fecha
    );
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        $respuesta = array('resultado' => 1);
    }

    $stmt->close();
}
echo json_encode($respuesta);
$con->close();
<?php
include("../db.php");
$respuesta = array('resultado' => 0);
//Obtenemos el parametro por medio de json.
if (isset($_POST['elementoInsertar'])) {
    $obj = json_decode($_POST["elementoInsertar"], false);

    $stmt = $con->prepare("INSERT INTO equipoinformatico VALUES(?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param('iiissss',
    	$obj->equipo_id,
    	$obj->tipo_producto_id,
    	$obj->ubicacion_id,
    	$obj->catalogo_id,
    	$obj->codigo_equipo,
    	$obj->fecha_adquisicion,
    	$obj->estado_equipo
    );
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        $respuesta = array('resultado' => 1);
    }

    $stmt->close();
}
echo json_encode($respuesta);
$con->close();
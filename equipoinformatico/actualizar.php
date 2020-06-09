<?php
include("..\db.php");
$respuesta = array('resultado' => 0);
if (isset($_POST['elementoActualizar'])) {
    $obj = json_decode($_POST["elementoActualizar"], false);

    $stmt = $con->prepare("UPDATE equipoinformatico SET tipo_producto_id = ?, ubicacion_id = ?, catalogo_id = ?, codigo_equipo = ?, fecha_adquisicion = ?, estado_equipo = ? WHERE equipo_id = ?");
    $stmt->bind_param('iissssi',
    	$obj->tipo_producto_id,
    	$obj->ubicacion_id,
    	$obj->catalogo_id,
    	$obj->codigo_equipo,
    	$obj->fecha_adquisicion,
    	$obj->estado_equipo,
    	$obj->equipo_id
    );
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        $respuesta = array('resultado' => 1);
    }
    $stmt->close();
}
echo json_encode($respuesta);
$con->close();
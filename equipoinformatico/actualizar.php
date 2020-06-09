<?php
include("../db.php");
$respuesta = array('resultado' => 0);
if (isset($_POST['elementoActualizar'])) {
    $obj = json_decode($_POST["elementoActualizar"], false);

    $stmt = $con->prepare("UPDATE EQUIPOINFORMATICO SET TIPO_PRODUCTO_ID = ?, UBICACION_ID = ?, CATALOGO_ID = ?, CODIGO_EQUIPO = ?, FECHA_ADQUISICION = ?, ESTADO_EQUIPO = ? WHERE EQUIPO_ID = ?");
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
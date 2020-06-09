<?php
include("../db.php");
$respuesta = array('resultado' => 0);
if (isset($_POST['elementoActualizar'])) {
    $obj = json_decode($_POST["elementoActualizar"], false);

    $stmt = $con->prepare("UPDATE CATALOGOEQUIPO SET marca_id = ?, MODELO_EQUIPO_GENERICO = ?, MEMORIA = ?, CANTIDAD_EQUIPO = ? WHERE CATALOGO_ID = ?");
    $stmt->bind_param('ssiis',
    	$obj->marca_id,
    	$obj->modelo_equipo_generico,
    	$obj->memoria,
    	$obj->cantidad_equipo,
    	$obj->catalogo_id
    );
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        $respuesta = array('resultado' => 1);
    }
    $stmt->close();
}
echo json_encode($respuesta);
$con->close();
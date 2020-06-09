<?php
include("../db.php");
$respuesta = array('resultado' => 0);
//Obtenemos el parametro por medio de json.
if (isset($_POST['elementoInsertar'])) {
    $obj = json_decode($_POST["elementoInsertar"], false);

    $stmt = $con->prepare("INSERT INTO CATALOGOEQUIPO VALUES(?, ?, ?, ?, ?)");

    $stmt->bind_param('sssii',
    	$obj->catalogo_id,
    	$obj->marca_id,
    	$obj->modelo_equipo_generico,
    	$obj->memoria,
    	$obj->cantidad_equipo
    );
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        $respuesta = array('resultado' => 1);
    }

    $stmt->close();
}
echo json_encode($respuesta);
$con->close();
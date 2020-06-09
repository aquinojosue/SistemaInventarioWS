<?php
include("../db.php");
$respuesta = array('resultado' => 0);
//Obtenemos el parametro por medio de json.
if (isset($_POST['elementoInsertar'])) {
    $obj = json_decode($_POST["elementoInsertar"], false);

    $stmt = $con->prepare("INSERT INTO DOCUMENTO VALUES(?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param('iiissss',
        $obj->escrito_id,
        $obj->tipo_producto_id,
        $obj->idioma_id,
        $obj->isbn,
        $obj->edicion,
        $obj->editorial,
        $obj->titulo
    );
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        $respuesta = array('resultado' => 1);
    }

    $stmt->close();
}
echo json_encode($respuesta);
$con->close();
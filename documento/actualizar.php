<?php
include("../db.php");
$respuesta = array('resultado' => 0);
if (isset($_POST['elementoActualizar'])) {
    $obj = json_decode($_POST["elementoActualizar"], false);

    $stmt = $con->prepare("UPDATE DOCUMENTO SET TIPO_PRODUCTO_ID = ?, IDIOMA_ID = ?, ISBN = ?, EDICION = ?, EDITORIAL = ?, TITULO = ? WHERE ESCRITO_ID = ?");
    $stmt->bind_param('iissssi',
        $obj->tipo_producto_id,
        $obj->idioma_id,
        $obj->isbn,
        $obj->edicion,
        $obj->editorial,
        $obj->titulo,
        $obj->escrito_id
    );
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        $respuesta = array('resultado' => 1);
    }
    $stmt->close();
}
echo json_encode($respuesta);
$con->close();
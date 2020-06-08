<?php
include("..\db.php");
$respuesta = array('resultado' => 0);
if (isset($_POST['elementoActualizar'])) {
    $obj = json_decode($_POST["elementoActualizar"], false);

    $stmt = $con->prepare("UPDATE documento SET tipo_producto_id = ?, idioma_id = ?, isbn = ?, edicion = ?, editorial = ?, titulo = ? WHERE id_escrito = ?");
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
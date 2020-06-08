<?php
include("..\db.php");
$respuesta = array('resultado' => 0);
if (isset($_POST['elementoActualizar'])) {
    $obj = json_decode($_POST["elementoActualizar"], false);

    $stmt = $con->prepare("UPDATE tipoproducto SET categoria_id = ?, nombre_tipo_producto = ? WHERE tipo_producto_id = ?");
    $stmt->bind_param('isi', $obj->categoria_id, $obj->nombre_tipo_producto, $obj->tipo_producto_id);
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        $respuesta = array('resultado' => 1);
    }
    $stmt->close();
}
echo json_encode($respuesta);
$con->close();
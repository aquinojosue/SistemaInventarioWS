<?php
include("../db.php");
$respuesta = array('resultado' => 0);
if (isset($_POST['elementoActualizar'])) {
    $obj = json_decode($_POST["elementoActualizar"], false);

    $stmt = $con->prepare("UPDATE DETALLEAUTOR SET ESPRINCIPAL = ? WHERE ESCRITO_ID = ? AND IDAUTOR = ?");
    $stmt->bind_param('iii', $obj->esPrincipal, $obj->escrito_id, $obj->idAutor);
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        $respuesta = array('resultado' => 1);
    }
    $stmt->close();
}
echo json_encode($respuesta);
$con->close();
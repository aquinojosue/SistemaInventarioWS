<?php
include("..\db.php");
$respuesta = array('resultado' => 0);
if (isset($_POST['elementoActualizar'])) {
    $obj = json_decode($_POST["elementoActualizar"], false);

    $stmt = $con->prepare("UPDATE autor SET nomAutor = ?, apeAutor = ? WHERE idautor = ?");
    $stmt->bind_param('ssi', $obj->nomAutor, $obj->apeAutor, $obj->idAutor);
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        $respuesta = array('resultado' => 1);
    }
    $stmt->close();
}
echo json_encode($respuesta);
$con->close();
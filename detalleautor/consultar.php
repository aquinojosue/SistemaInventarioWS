<?php
include("../db.php");
//Obtenemos el parametro por medio de json.
if (isset($_POST['elementoConsulta'])) {
    $obj = json_decode($_POST["elementoConsulta"], false);
    $stmt = $con->prepare("SELECT * FROM DETALLEAUTOR WHERE ESCRITO_ID = ? AND IDAUTOR = ?");
    $stmt->bind_param("ii", $obj->escrito_id, $obj->idAutor);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $salida = $resultado->fetch_all(MYSQLI_ASSOC);

    echo json_encode($salida,JSON_UNESCAPED_UNICODE);
    $stmt->close();
}
$con->close();
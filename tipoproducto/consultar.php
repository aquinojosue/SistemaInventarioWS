<?php
include("../db.php");
//Obtenemos el parametro por medio de json.
if (isset($_POST['elementoConsulta'])) {
    $obj = json_decode($_POST["elementoConsulta"], false);
    $stmt = $con->prepare("SELECT * FROM TIPOPRODUCTO WHERE TIPO_PRODUCTO_ID = ?");
    $stmt->bind_param("i", $obj->tipo_producto_id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $salida = $resultado->fetch_all(MYSQLI_ASSOC);

    echo json_encode($salida);
    $stmt->close();
}
$con->close();
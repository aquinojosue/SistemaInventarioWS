<?php
include("../db.php");
//Obtenemos el parametro por medio de json.
if (isset($_POST['elementoConsulta'])) {
    $obj = json_decode($_POST["elementoConsulta"], false);
    $stmt = $con->prepare("SELECT * FROM equipoinformatico WHERE equipo_id = ?");
    $stmt->bind_param("i", $obj->equipo_id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $salida = $resultado->fetch_all(MYSQLI_ASSOC);

    echo json_encode($salida);
    $stmt->close();
}
$con->close();
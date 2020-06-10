<?php
include("db.php");
if(isset($_GET['tabla'])){
	$tabla = strtoupper($_GET['tabla']);

	$resultado = $con->query("select * from $tabla");
	$salida = $resultado->fetch_all(MYSQLI_ASSOC);
	echo json_encode($salida,JSON_UNESCAPED_UNICODE);

}
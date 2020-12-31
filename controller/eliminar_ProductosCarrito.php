<?php
include("../model/conexion.php");
$activ=new ApptivaDB();
$id = $_POST['idPro'];
$repuesta = array();

$sql = $activ->borrar("carrito", "carrito.ID_PRODUCTOS='" . $id . "'AND carrito.estado_car='0'");

if ($sql) {
	$repuesta["exito"] = "Producto Eliminado";
} else {
	$repuesta["error"] = "Error en la   Eliminacion";
}

echo json_encode($repuesta);

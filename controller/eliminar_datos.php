<?php
include("../model/conexion.php");
$id=$_POST['id2'];
if(!empty($id)){
	$tabla=  "usuarios";
		$condicion="usuarios.id_usu='$id'";
		$activ=new ApptivaDB();
		$activ-> buscar($tabla,$condicion);
}
?>
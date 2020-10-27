<?php
include("../model/conexion.php");
$id=$_POST['id2'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$correo=$_POST['correo'];

	$tabla=  "usuarios";
	$campos="nombre_usu='$nombre',apellido_usu='$apellido',correo_usu='$correo'";
		$condicion="usuarios.id_usu='$id'";
		$activ=new ApptivaDB();
		$activ-> actualizar($tabla,$campos,$condicion);
	 


?>
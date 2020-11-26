<?php
$id=$_POST["id"];
include("../model/conexion.php");
$user=new ApptivaDB();
$sql=$user->buscar("descripcionproducto","descripcionproducto.ID_PRODUCTO=".$id);
	
    $json["exito"]=$sql;

echo json_encode($json);
   ?>
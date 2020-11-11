<?php
$id=$_POST["id"];
include("../model/conexion.php");
$user=new ApptivaDB();
$sql=$user->buscar("ficha_tecnica","ficha_tecnica.ID_PRODUCTO=".$id);
	
    $json["exito"]=$sql;

echo json_encode($json);
   ?>
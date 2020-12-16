<?php
include("../model/conexion.php");
$bus=new ApptivaDB();
$restaStok=$_POST["restaStok"];
$idPro=$_POST["idPro"];

$actualiza=$bus->actualizar("productos","stok_pro='$restaStok'","productos.id_pro=".$idPro);
 if($actualiza==true){
echo"actualizacion correcta";
 }else{
     echo "no se actuaizo";
 }
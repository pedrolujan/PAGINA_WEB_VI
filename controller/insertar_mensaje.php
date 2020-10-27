<?php
include "../model/conexion.php";
session_start();
$user = new ApptivaDB();
$mensaje= $_POST["mensaje"];
if(isset($_SESSION["usuarioLogeado"])){
    $usuario=$_SESSION["usuarioLogeado"];
$u = $user->insertar(
    "chat",
    "'$mensaje','$usuario','now()'");
    if($u){
        $arreglo["exito"]="insertado con exito";
    }else{
        $arreglo["error"]="ubo un error";
    }
}elseif($_SESSION["adminLogeado"]){
    $admin=$_SESSION["adminLogeado"];
    $u = $user->insertar(
        "chat",
        "'$mensaje','$admin','now()'");
        if($u){
            $arreglo["exito"]="insertado con exito";
        }else{
            $arreglo["error"]="ubo un error";
        }
}else{
    $arreglo["error"]="Porfabor inicie session";
}
echo json_encode($arreglo);
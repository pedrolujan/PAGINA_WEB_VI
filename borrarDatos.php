<?php
session_start();
$id=$_POST["id"];
include("model/conexion.php");
$bus=new ApptivaDB();
$borrar=$bus->borrar("carrito",
                        "carrito.ID_PRODUCTOS=".$id.
                        " AND carrito.ID_USUARIOS=".$_SESSION["usuarioLogeado"]);
if($borrar){
echo "SE borro con exito";
}else{
    echo "hubo un error";
}
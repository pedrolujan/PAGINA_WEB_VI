<?php
session_start();
include("../model/conexion.php");
$bus=new ApptivaDB();
$respuesta=array();

if(isset($_SESSION[ 'usuarioLogeado'])){  
    $cantPro= $bus->buscarCar("SUM(unidades_car) AS UNIDADES, SUM(subTotal_car) AS TOTAL","carrito","ID_USUARIOS=".$_SESSION["usuarioLogeado"]);
    foreach($cantPro as $un){   
       
        if($un["TOTAL"]==null){
            $respuesta["unidades"]=0;
            $respuesta["total"]=0;
        }else{
            $respuesta["unidades"]=$un["UNIDADES"];
           $respuesta["total"]=$un["TOTAL"];
        }

     }  
}
echo json_encode($respuesta);
?>
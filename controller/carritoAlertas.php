<?php
session_start();
include("../model/conexion.php");
$bus=new ApptivaDB();
$respuesta=array();

if(isset($_SESSION[ 'usuarioLogeado'])){  
    $cantPro= $bus->buscarCar("SUM(unidades_car) AS UNIDADES, SUM(subTotal_car) AS TOTAL","carrito","ID_USUARIOS='".$_SESSION["usuarioLogeado"]."' AND estado_car='0'");
    foreach($cantPro as $un){   
        
        if($un["TOTAL"]==null){
            $respuesta["unidades"]=0;
            $respuesta["total"]=0;
        }else{
            $respuesta["unidades"]=$un["UNIDADES"];
           $respuesta["total"]=number_format($un["TOTAL"],1);
        }

     }  
     
    echo json_encode($respuesta);
}else{
    if(isset($_POST["dato"])){
        $respuesta["total"]=1111;
        $cantPro= $bus->buscarCar("
        SUM(unidades_car) AS UNIDADES, SUM(subTotal_car) AS TOTAL,productos.imagen_pro",
        "carrito 
        INNER JOIN compras ON carrito.id_car=compras.ID_CARRITO
                INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
                INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro","estado_car='1'");
       
        foreach($cantPro as $un){               
            if($un["TOTAL"]==null){
                $respuesta["unidades"]=0;
                $respuesta["total"]=0;
            }else{
                $respuesta["unidades"]=$un["UNIDADES"];
               $respuesta["total"]=number_format($un["TOTAL"],1);
               $respuesta["imagen"]=$un["imagen_pro"];
            }
    
         }  
    }
    echo json_encode($respuesta);
}
?>
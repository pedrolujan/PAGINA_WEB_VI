<?php
session_start();
include("../model/conexion.php");
$bus=new ApptivaDB();
$respuesta=array();

        $cantPro= $bus->buscarCar("
        SUM(unidades_car) AS UNIDADES, SUM(subTotal_car) AS TOTAL,productos.imagen_pro",
        "carrito 
        INNER JOIN compras ON carrito.id_car=compras.ID_CARRITO
                INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
                INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro","carrito.estado_car='1'");
        $cantUsu= $bus->buscarCar("
            COUNT(*) as totalUsuarios",
            "usuarios","usuarios.rol='1'");
        $cantProd= $bus->buscarCar("
            SUM(productos.stok_pro) as stockProductos",
            "productos","productos.estado='1'");
        foreach($cantPro as $un){               
            $respuesta["unidades"]=$un["UNIDADES"];
               $respuesta["total"]=number_format($un["TOTAL"],1);
               $respuesta["imagen"]=$un["imagen_pro"]; 
         }
        foreach($cantUsu as $us){               
               $respuesta["totalUsuarios"]=$us["totalUsuarios"]; 
         }
        foreach($cantProd as $pro){               
               $respuesta["stockProductos"]=$pro["stockProductos"]; 
         }
      
    
    echo json_encode($respuesta);

?>
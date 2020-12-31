<?php
session_start();
include("../model/conexion.php");
$bus=new ApptivaDB();
$respuesta=array();
$fecha_inicio=$_POST["fechaIni"];
$fecha_final=$_POST["fechaFin"];


$ZonaHoraria= date_default_timezone_set('America/lima');
$fecha_actual=date("y-m-d");
if(empty($fecha_inicio) && empty($fecha_final)) {
    $fecha_inicio="2020-01-01";
    $fecha_final=date("y-m-d");
}


        $cantPro= $bus->buscarCar("
                SUM(unidades_car) AS UNIDADES, 
                SUM(subTotal_car) AS TOTAL,
                compras.fecha_corta_comp,
                productos.imagen_pro",
                "carrito 
                INNER JOIN compras ON carrito.id_car=compras.ID_CARRITO
                INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
                INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
                "carrito.estado_car='1'
                AND compras.fecha_corta_comp BETWEEN '" . $fecha_inicio . "' AND '" . $fecha_final . "'");

           
                
        $cantUsu= $bus->buscarCar("
            usuarios.fecha_registro_usu,
            COUNT(*) as totalUsuarios",
            "usuarios",
            "usuarios.rol='1'
            AND usuarios.fecha_registro_usu BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'");

        $cantUsuInactivos= $bus->buscarCar("
            usuarios.fecha_registro_usu,
            COUNT(*) as totalUsuariosInactivos",
            "usuarios",
            "usuarios.rol='1'
            AND usuarios.estado_usu='0'
            AND usuarios.fecha_registro_usu BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'");

        $cantProductosActivos= $bus->buscarCar("
            SUM(productos.stok_pro) as stockProductos,
            productos.fecha_registro_pro",
            "productos",
            "productos.estado='1'
            AND productos.fecha_registro_pro BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'");

        $cantProductosInActivos= $bus->buscarCar("
            SUM(productos.stok_pro) as stockProductosInactivos,
            productos.fecha_registro_pro",
            "productos","productos.estado='0'
            AND productos.fecha_registro_pro BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'");


            $cantDineroHoy= $bus->buscarCar("
            SUM(unidades_car) AS UNIDADESHOY, 
            SUM(subTotal_car) AS TOTALHOY,
            compras.fecha_corta_comp,
            productos.imagen_pro",
            "carrito 
            INNER JOIN compras ON carrito.id_car=compras.ID_CARRITO
            INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
            INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
            "carrito.estado_car='1'
            AND compras.fecha_corta_comp='".$fecha_actual."'");

        foreach($cantPro as $un){ 
            if($un["UNIDADES"]==null){
                $un["UNIDADES"]="0";
            }               
            $respuesta["unidades"]=$un["UNIDADES"];
            $respuesta["total"]=number_format($un["TOTAL"],1);
              
         }
        foreach($cantDineroHoy as $un){               
           
            if ($un["UNIDADESHOY"]==null) {
                $respuesta["unidadeshoy"]=0;
            }else{
                $respuesta["unidadeshoy"]=$un["UNIDADESHOY"];
            }

            $respuesta["totalhoy"]=number_format($un["TOTALHOY"],1);
         }
        foreach($cantUsu as $us){               
               $respuesta["totalUsuarios"]=$us["totalUsuarios"]; 
         }
        foreach($cantUsuInactivos as $us){               
               $respuesta["totalUsuariosInactivos"]=$us["totalUsuariosInactivos"]; 
         }
        foreach($cantProductosActivos as $pro){   
            if($pro["stockProductos"]==null){
                $pro["stockProductos"]="0";
            }           
               $respuesta["stockProductos"]=$pro["stockProductos"]; 
         }
      
        foreach($cantProductosInActivos as $pro){               
            if($pro["stockProductosInactivos"]==null){
                $pro["stockProductosInactivos"]="0";
            }    
            $respuesta["stockProductosInac"]=$pro["stockProductosInactivos"]; 
         }
      
    
    echo json_encode($respuesta);

?>
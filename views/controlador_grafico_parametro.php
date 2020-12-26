<?php
include("../model/conexion.php");
$busq=new ApptivaDB();

$fechaInicio=$_POST["fechaIni"];
$fechaFinal=$_POST["fechaFin"];
$tipoConsulta=$_POST["itemDashboard"];
$consulta="";
$json=array();
$mensaje=[];

setlocale(LC_ALL, "es_ES.UTF-8", "es_ES", "es");

$ZonaHoraria= date_default_timezone_set('America/lima'); 
$fecha_actual=date("Y-m-d");

if($tipoConsulta=="productosVendidos"){
    if($fechaInicio=="" && $fechaFinal==""){

        $fechaInicio="2020-01-01";
        $consulta=$busq->buscarFech("compras.fecha_corta_comp,COUNT(*) AS totalCompras",
                                "compras
                                INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car 
                                INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu 
                                INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
                                "compras.fecha_corta_comp BETWEEN '".$fechaInicio."' AND '".$fecha_actual."'  
                                GROUP by compras.fecha_corta_comp
                                ORDER BY compras.fecha_corta_comp");
        while($row =mysqli_fetch_array($consulta)){
                $json[] = array(				
                'fecha' => $usu_fecha_registro = strftime("%d de %B del %Y", strtotime( $row['fecha_corta_comp'])),
                'cantidad' => $row['totalCompras'],
                'tipoGrafica'=>  "Cantidad de ventas"        
                );
        }                       
    }elseif($fechaInicio=="" && $fechaFinal!==""){
        echo  $mensaje["error"]="Seleccione Fecha Inicio";
    }elseif($fechaInicio!=="" && $fechaFinal==""){
        echo "Seleccione Fecha Final";
    }
    else{
        $consulta=$busq->buscarFech("compras.fecha_corta_comp,COUNT(*) AS totalCompras",
                                "compras
                                INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car 
                                INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu 
                                INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
                                "compras.fecha_corta_comp BETWEEN '".$fechaInicio."' AND '".$fechaFinal."'  
                                GROUP by compras.fecha_corta_comp
                                ORDER BY compras.fecha_corta_comp");

        while($row =mysqli_fetch_array($consulta)){
                $json[] = array(				
                'fecha' => $usu_fecha_registro = strftime("%d de %B del %Y", strtotime( $row['fecha_corta_comp'])),
                'cantidad' => $row['totalCompras'],
                'tipoGrafica'=>  "Cantidad de ventas"        
                );
        }   
    }
   

}elseif($tipoConsulta=="clientes"){

    if($fechaInicio=="" && $fechaFinal==""){

        $fechaInicio="2020-01-01";
        $consulta=$busq->buscarFech("usuarios.fecha_registro_usu, COUNT(*) totalUsuarios",
                                "usuarios",
                                "usuarios.fecha_registro_usu BETWEEN '".$fechaInicio."' AND '".$fecha_actual."'  
                                GROUP BY usuarios.fecha_registro_usu
                                ORDER BY usuarios.fecha_registro_usu");

        while($row =mysqli_fetch_array($consulta)){
                $json[] = array(				
                'fecha' => $usu_fecha_registro = strftime("%d de %B del %Y", strtotime( $row['fecha_registro_usu'])),
                'cantidad' => $row['totalUsuarios'],
                'tipoGrafica'=>  "Cantidad de Usuarios"        
                );
        }                       
    }elseif($fechaInicio=="" && $fechaFinal!==""){
        echo "Seleccione Fecha Inicio";
    }elseif($fechaInicio!=="" && $fechaFinal==""){
        echo "Seleccione Fecha Final";
    }
    else{
        $consulta=$busq->buscarFech("usuarios.fecha_registro_usu, COUNT(*) totalUsuarios",
                                    "usuarios",
                                    "usuarios.fecha_registro_usu BETWEEN '".$fechaInicio."' AND '".$fechaFinal."'  
                                    GROUP BY usuarios.fecha_registro_usu
                                    ORDER BY usuarios.fecha_registro_usu");

        while($row =mysqli_fetch_array($consulta)){
            $json[] = array(				
                'fecha' => $usu_fecha_registro = strftime("%d de %B del %Y", strtotime( $row['fecha_registro_usu'])),
                'cantidad' => $row['totalUsuarios'],
                'tipoGrafica'=>  "Cantidad de Usuarios"        
                );
        }   
    }
   
}elseif($tipoConsulta=="productosStok"){

    if($fechaInicio=="" && $fechaFinal==""){

        $fechaInicio="2020-01-01";
        $consulta=$busq->buscarFech("productos.fecha_registro_pro, COUNT(*) totalProductos",
                                "productos",
                                "productos.fecha_registro_pro BETWEEN '".$fechaInicio."' AND '".$fecha_actual."'  
                                GROUP BY productos.fecha_registro_pro
                                ORDER BY productos.fecha_registro_pro");
                                
        while($row =mysqli_fetch_array($consulta)){
                $json[] = array(				
                'fecha' => $usu_fecha_registro = strftime("%d de %B del %Y", strtotime( $row['fecha_registro_pro'])),
                'cantidad' => $row['totalProductos'],
                'tipoGrafica'=>  "Cantidad de Productos"        
                );
        }                       
    }elseif($fechaInicio=="" && $fechaFinal!==""){
        echo "Seleccione Fecha Inicio";
    }elseif($fechaInicio!=="" && $fechaFinal==""){
        echo "Seleccione Fecha Final";
    }
    else{
        $consulta=$busq->buscarFech("productos.fecha_registro_pro, COUNT(*) totalProductos",
                                    "productos",
                                    "productos.fecha_registro_pro BETWEEN '".$fechaInicio."' AND '".$fechaFinal."'  
                                    GROUP BY productos.fecha_registro_pro
                                    ORDER BY productos.fecha_registro_pro");

        while($row =mysqli_fetch_array($consulta)){
                $json[] = array(				
                'fecha' => $usu_fecha_registro = strftime("%d de %B del %Y", strtotime( $row['fecha_registro_pro'])),
                'cantidad' => $row['totalProductos'],
                'tipoGrafica'=>  "Cantidad de Productos"        
                );
        }   
    }
   
}
 
echo json_encode($json);


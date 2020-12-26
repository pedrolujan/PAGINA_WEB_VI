<?php
	include("../model/conexion.php");
	include("../model/url.php");
	$bus=new ApptivaDB();
	session_start();

$html="";
$fecha_inicio=$_POST["fechaIni"];
$fecha_final=$_POST["fechaFin"];
$itemDashboard=$_POST["itemDashboard"];

$ZonaHoraria= date_default_timezone_set('America/lima'); 
$fecha=date("y-m-d");

if($itemDashboard=="productosVendidos"){
    if (empty($fecha_inicio) && empty($fecha_final)) {
        $fecha_inicio="2020-01-01";
        $fecha_final=$fecha;
    }

    

$html.="<div class='contenedorComprasGeneralAdmin'>";
$usuarios=$bus->buscarFech("
            usuarios.id_usu, usuarios.nombre_usu, usuarios.apellido_usu, usuarios.imagen_usu",
            "compras
            INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car
            INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
            INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
            "'1' GROUP by carrito.ID_USUARIOS
            ORDER BY compras.fecha_corta_comp");
        

 foreach($usuarios as $recor_Usuarios){
       $fechas= 
       $bus->buscarFech("carrito.id_car,
                    usuarios.id_usu, 
                    usuarios.imagen_usu, 
                    compras.fecha_comp, 
                    compras.ID_CARRITO, 
                    carrito.unidades_car, 
                    compras.fecha_corta_comp",
                   "compras 
                   INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car 
                   INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu 
                   INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
                   "carrito.ID_USUARIOS=".$recor_Usuarios["id_usu"]."
                   AND compras.fecha_corta_comp BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'
                   GROUP by compras.fecha_corta_comp
                   ORDER BY compras.fecha_corta_comp");

       $html.="<div class='contenedorUsuarioYCompras'>
            <div class='cDatosUsuario'>
                <p>".$recor_Usuarios['apellido_usu']."</p>
                <p>".$recor_Usuarios['nombre_usu']."</p>
                <img src='../".$recor_Usuarios['imagen_usu']."' alt='' srcset=''>
            </div>";
       
            foreach($fechas as $recor_fechas){
            $compras= 
            $bus->buscarFech("carrito.id_car,
                        carrito.ID_PRODUCTOS,
                        productos.imagen_pro,
                        carrito.ID_USUARIOS,
                        usuarios.nombre_usu,
                        usuarios.imagen_usu,
                        carrito.unidades_car,
                        compras.fecha_corta_comp",
                        "compras
                        INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car
                        INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
                        INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
                        "compras.fecha_corta_comp ='".$recor_fechas["fecha_corta_comp"]."'
                        AND compras.fecha_corta_comp BETWEEN '".$fecha_inicio."' AND '".$fecha_final."'
                        AND carrito.ID_USUARIOS='".$recor_Usuarios["id_usu"]."'");
                
                $html.="<div class='contenCompras' capturoNombre='".$recor_Usuarios['nombre_usu']."' recor_Usuarios='".$recor_Usuarios['id_usu']."' capturofecha='".$recor_fechas['fecha_corta_comp']."'>
                    <div class='ComprasFechaYTotal'>
                        <i>".$recor_fechas['fecha_corta_comp']."</i>
                    </div>
                    <div class='ComprasImagenes'>";
                        
                       foreach($compras as $recor_compras){
                        $html.="<div><img src='".$recor_compras['imagen_pro']."' alt='' srcset='' width='30px'>
                            <span>".$recor_compras['unidades_car']."</span></div>";                               
                        }
                $html.="</div>

                 </div>";
         

            }
        $html.="</div>"; 
}

$html.="</div>";
}


 
 echo  $html;

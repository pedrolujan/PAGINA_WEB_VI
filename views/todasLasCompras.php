<?php
	include("../model/conexion.php");
	include("../model/url.php");
	$bus=new ApptivaDB();
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilos_principal.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilosCarritoDetalle.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>fonts/fonts/style.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilosUsuComun.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilosHeader.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/ventas.css">

    <script src="../js/jquery-3.5.1.min.js"></script>
</head>
<body>
	<?php
include("header.php");
/* include("menu_lateral.php"); */
$html="";?>
<div class="contenedorComprasGeneralAdmin">
<?php	$usuarios= 
    $bus->buscarFech("
                usuarios.id_usu, usuarios.nombre_usu, usuarios.apellido_usu, usuarios.imagen_usu",
                "compras
                INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car
                INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
                INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
                "'1' GROUP by carrito.ID_USUARIOS
                ORDER BY compras.fecha_corta_comp");   ?>
            
  
    <?php foreach($usuarios as $recor_Usuarios){
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
                       GROUP by compras.fecha_corta_comp
                       ORDER BY compras.fecha_corta_comp");?>

            <div class="contenedorUsuarioYCompras">
                <div class="cDatosUsuario">
                    <p><?php echo $recor_Usuarios["apellido_usu"];?></p>
                    <p><?php echo $recor_Usuarios["nombre_usu"];?></p>
                    <img src="../<?php echo $recor_Usuarios["imagen_usu"];?>" alt="" srcset="">
                </div>
           
                <?php foreach($fechas as $recor_fechas){
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
                            AND carrito.ID_USUARIOS='".$recor_Usuarios["id_usu"]."'");?>
                    
                    <div class="contenCompras" capturoNombre="<?php echo $recor_Usuarios["nombre_usu"];?>" recor_Usuarios="<?php echo $recor["id_usu"];?>" capturofecha="<?php echo $recor_fechas["fecha_corta_comp"];?>">
                        <div class="ComprasFechaYTotal">
                            <i><?php echo $recor_fechas["fecha_corta_comp"];?></i>
                            
                          <!-- aca ban las suma del total de compras por fecha 
                          
                          -->
                           
                        </div>
                        <div class="ComprasImagenes">
                            
                            <?php foreach($compras as $recor_compras){?>
                                <div><img src="<?php echo $recor_compras["imagen_pro"];?>" alt="" srcset="" width="30px"></div>
                                <span><?php echo $recor_compras["unidades_car"];?></span>                                
                            <?php }?>
                        </div>

                     </div>
             
<?php           
                } ?>
            </div>   
<?php }
?>

</div>
    
    <script src="../js/principal.js"></script>    
    <script src="../js/scripVentas.js"></script>
</body>
</html>
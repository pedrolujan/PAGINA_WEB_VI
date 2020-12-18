<?php
	include("../views/header.php");
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
<div class="contenedorMisCompras">
<?php	$fechaCompra= 
    $bus->buscarFech("carrito.id_car,
                carrito.ID_PRODUCTOS,               
				productos.imagen_pro,
				usuarios.id_usu,                
				usuarios.nombre_usu,                
				usuarios.imagen_usu,                
                compras.fecha_comp,
                compras.ID_CARRITO,
                carrito.unidades_car,
                compras.fecha_corta_comp, COUNT(*) AS totalCompras",
                "compras
                INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car
                INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
                INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
                "'1' GROUP BY carrito.ID_USUARIOS
                HAVING COUNT(*)
                ORDER BY compras.fecha_corta_comp");
    
     ?>
   <?php foreach($fechaCompra as $recor){
           $imagenes= 
           $bus->buscarFech("carrito.id_car,             
					   productos.imagen_pro,
					   carrito.ID_PRODUCTOS",
                       "compras
                       INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car
                       INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
                       INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
					   "carrito.ID_USUARIOS='".$recor["id_usu"]."'");
           $sumas= 
           $bus->buscarFech("carrito.id_car,             
					   productos.imagen_pro,SUM(subTotal_car) AS TOTAL,
					   carrito.ID_PRODUCTOS",
                       "compras
                       INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car
                       INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
                       INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
					   "carrito.ID_USUARIOS='".$recor["id_usu"]."'");?>
                        

                        <p><?php echo $recor["nombre_usu"];?></p>
                        <?php foreach($sumas as $imag){?>
                        <span>S/ <?php echo number_format($imag["TOTAL"],1);?></span>
                        <?php }?>
                         <div><img src="../<?php echo $recor["imagen_usu"];?>" alt="" srcset="" width="30px"></div>
			<div class="contenCompras" capturofecha="<?php echo $recor["fecha_corta_comp"];?>">
            <i><?php echo $recor["fecha_corta_comp"];?></i>        
             
                
			 
            <p>COMPRAS <?php echo $recor["totalCompras"];?></p>

            <?php foreach($imagenes as $imag){?>
                 <div><img src="<?php echo $imag["imagen_pro"];?>" alt="" srcset="" width="30px"></div>
            <?php }?>

        </div>
        
    <?php }?>


	
	<?php
echo $html;
   ?>
</div>
    <script src="../js/principal.js"></script>    
    <script src="../js/scripVentas.js"></script>
</body>
</html>
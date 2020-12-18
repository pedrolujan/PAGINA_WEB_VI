<?php
include("../model/conexion.php");
include("../model/url.php");
session_start();
$bus=new ApptivaDB();
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
<body class="body">
    <?php
    include("header.php");
    ?>
    <div class="contenedorMisCompras">
    <?php
    $fechaCompra= 
    $bus->buscarFech("carrito.id_car,
                carrito.ID_USUARIOS,               
                productos.imagen_pro,                
                compras.fecha_comp,
                carrito.unidades_car,
                compras.fecha_corta_comp, COUNT(*) AS totalCompras",
                "compras
                INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car
                INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
                INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
                "carrito.ID_USUARIOS=".$_SESSION["usuarioLogeado"]." GROUP BY compras.fecha_corta_comp
                HAVING COUNT(*)
                ORDER BY compras.fecha_corta_comp");
    
     ?>
   <?php foreach($fechaCompra as $recor){
           $imagenes= 
           $bus->buscarFech("carrito.id_car,             
                       productos.imagen_pro",
                       "compras
                       INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car
                       INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
                       INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
                       "carrito.ID_USUARIOS='".$_SESSION["usuarioLogeado"]."'
                        AND compras.fecha_corta_comp='".$recor["fecha_corta_comp"]."'");?>
                        
     
        <div class="contenCompras" capturofecha="<?php echo $recor["fecha_corta_comp"];?>">
            
            <i><?php echo $recor["fecha_corta_comp"];?></i>   
            <p>COMPRAS <?php echo $recor["totalCompras"];?></p>

            <?php foreach($imagenes as $imag){?>
                 <div><img src="<?php echo $imag["imagen_pro"];?>" alt="" srcset=""></div>
            <?php }?>

        </div>
        
    <?php }?>
  
  
    </div>
    <div class="cargarComprasDetalle">

    </div>
    <script src="../js/principal.js"></script>    
    <script src="../js/scripVentas.js"></script>
</body>
</html>
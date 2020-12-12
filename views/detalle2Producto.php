<?php
include("../model/conexion.php");
session_start();
$bus=new ApptivaDB();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/L&M.StoreTecnology/css/estilos_principal.css">
    <link rel="stylesheet" href="http://localhost/L&M.StoreTecnology/css/estilosCarritoDetalle.css">
    <link rel="stylesheet" href="../fonts/fonts/style.css">
    <link rel="stylesheet" href="http://localhost/L&M.StoreTecnology/css/estilosUsuComun.css" type="text/css">
    <link rel="stylesheet" href="http://localhost/L&M.StoreTecnology/css/estilosHeader.css">
    <!-- <link rel="stylesheet" href="http://localhost/PAGINA_WEB_VI/css/carrito/estilos.css"> -->


    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery-Carrito/simpleCart.min.js"></script>
    <script src="js/jquery-Carrito/app.js"></script>
</head>

<body>
    <div class="container">
        <div class="contenPDCGeneral">
        <?php
               $datos=$bus->buscarCar(
               "productos.id_pro,productos.imagen_pro,
               productos.nombre_pro,
               productos.precio_pro,
               carrito.unidades_car,
               carrito.subTotal_car,
               carrito.fecha_car",
               "carrito,productos,usuarios",
               "carrito.ID_PRODUCTOS=productos.id_pro
               AND carrito.ID_USUARIOS=usuarios.id_usu
               AND usuarios.id_usu=".$_SESSION["usuarioLogeado"]);
             foreach($datos as $recor){?>
        <div class="contenPDC">

            <div><img src="<?php echo $recor["imagen_pro"]; ?>" alt="" srcset="" width="80px"></div>
            <div><?php echo $recor["nombre_pro"];?></div>
            <div>S/ <?php echo $recor["precio_pro"];?></div>
            <div><?php echo $recor["unidades_car"]; ?> Un</div>
            <div><?php echo $recor["subTotal_car"]; ?></div>

        </div>
        <?php }?>
        </div>
        <div class="contenPDCInportes">
          
            <div>
            <h3>Datos Financieros</h3>
                <input type="text">
                <input type="text">
                <input type="text">
                <input type="text">
          
            <div class="contenTotalPagar">
                <h3>Total</h3> <span class="simpleCart_total"></span>
            </div>
            <button class="btn simpleCart_checkout"> PAGAR </button>
            </div>
        </div>
    </div>
    <?php
include("header.php");
?>

    <script src="js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
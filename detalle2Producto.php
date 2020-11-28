<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/carrito/bootstrap-grid.css">
    <link rel="stylesheet" href="css/carrito/estilos.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery-Carrito/simpleCart.min.js"></script>
    <script src="js/jquery-Carrito/app.js"></script>
</head>
<body>
   
    <?php
   
        /* $data = json_decode($_GET['dat'], true);
        $cantidad=count($data); */
    ?>
    <div class="container" style="margin-top: 70px">
        <table class="table  table-hover table-condensed">
        <tr style="color:#fff; background: #ccc;">
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th>Fecha registro</th>
        </tr>
            <?php
                include("model/conexion.php");
                $bus=new ApptivaDB();
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
                    <tr>
                        
                        <td><img src="<?php echo $recor["imagen_pro"]; ?>" alt="" srcset="" width="80px"></td>
                        <td><?php echo $recor["nombre_pro"];?></td>
                        <td><?php echo $recor["precio_pro"];?></td>
                        <td><?php echo $recor["unidades_car"]; ?></td>
                        <td><?php echo $recor["subTotal_car"]; ?></td>
                        <td><?php echo $recor["fecha_car"]; ?></td>
                    </tr>
                    <?php }?>
            </table>
            <div class="contenTotalPagar"><h3>Total</h3> <span class="simpleCart_total"></span> </div>
            <button class="btn btn-primary simpleCart_checkout"> PAGAR </button>
    </div>
 <?php
  include("interfas.php");
 ?>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
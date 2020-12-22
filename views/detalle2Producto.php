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
    <!-- <link rel="stylesheet" href="http://localhost/PAGINA_WEB_VI/css/carrito/estilos.css"> -->


    <script src="../js/jquery-3.5.1.min.js"></script><!-- 
    <script src="../js/jquery-Carrito/simpleCart.min.js"></script>
    <script src="..7js/jquery-Carrito/app.js"></script>
    <script src="../js/scripVentas.js"></script> -->
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
               AND carrito.estado_car=0
               AND usuarios.id_usu=".$_SESSION["usuarioLogeado"]);

               $totalPago= $bus->buscarCar("SUM(subTotal_car) AS TOTAL","carrito","ID_USUARIOS='"
               .$_SESSION["usuarioLogeado"]."'AND carrito.estado_car='0'");
              
             foreach($datos as $recor){?>
        <div class="contenPDC">
            <div><img src="<?php echo $recor["imagen_pro"]; ?>" alt="" srcset="" width="80px"></div>
            <div><?php echo $recor["nombre_pro"];?></div>
            <div>S/ <?php echo number_format($recor["precio_pro"],1);?></div>
            <div><?php echo $recor["unidades_car"]; ?> Un</div>
            <div>S/ <?php echo number_format($recor["subTotal_car"],1); ?></div>
            <img src="../imagenes/fuentes/iconos/eliminar.svg" width="80px">
        </div>
        <?php }
         foreach($totalPago as $TP){   ?>
          <input type="hidden" name="" id="totalCarrito" value="<?php echo  $TP["TOTAL"];?>">
          <input type="hidden" name="" id="CostoEnvioBolet" value="<?php echo $TP["TOTAL"];?>">
           
            <?php  } ?>
        
       
    </div>

    <div class="contenPDCInportes">    
            
        <div>
            <h3>Elige direcion de envio</h3>
            <?php
            $dep=new ApptivaDB();
            $departamento=$dep->buscarCar("id_departamento,dep_nombre,dep_costo_envio","departamento","1");
            ?>
                <label for="cbodeDartamento">Departamento</label>
                <select name="cbodeDartamento" id="cbodeDartamento"> 
                <?php foreach($departamento as $dep){?>
                    <option id="precio" precio="<?php echo $dep['dep_costo_envio']?>" value="<?php echo $dep['id_departamento']?>"><?php echo $dep['dep_nombre']?></option>
                <?php }?>

                </select>   
                <label for="cboProvincia">Provincia</label>
                <select name="cboProvincia" id="cboProvincia">
                   
                </select>
                <label for="cboDistrito">Distrito</label>
                <select name="cboDistrito" id="cboDistrito">
                   
                </select>     
            <div class="contenTotalPagar">
                <table>
                    <tr>
                        <td><label>Sub Total</label></td>
                        <td><span class="simpleCart_total"></span></td>
                    </tr>
                    <tr>    
                        <td><label>Envio</label></td>
                        <td> S/ <span class="CostoEnvio"></span></td>
                    </tr>
                    <tr>
                        <td><label>Total</label></td>
                        <td> S/  <span class="totalAPagarCarrito"></span></td>
                    </tr>
                </table>
            </div>       
           <div class="botonesCarrito">
                <button class="btn " id="btnRalizarCompra"> realizar compra </button>
            </div>    
        </div>
       
    </div>
    <?php
include("header.php");
?>
<!-- 
    <script src="../js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script> -->
    
    <script src="../js/principal.js"></script>
    
<script src="../js/scripVentas.js"></script>
</body>

</html>
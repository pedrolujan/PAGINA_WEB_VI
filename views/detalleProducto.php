<script src="../js/jquery-3.5.1.min.js"></script>    
    <script src="../js/jquery-Carrito/simpleCart.min.js"></script>
    <!-- <link rel="stylesheet" href="CSS/carrito/bootstrap-grid.css"> -->
    <link rel="stylesheet" href="http://localhost/PAGINA_WEB_VI/CSS/carrito/estilos.css">
    <link rel="stylesheet" href="../fonts/fonts/style.css">
<?php

include("../model/conexion.php");
    $bus=new ApptivaDB();
    $datos=$bus->buscar("productos","productos.id_pro=".$_GET["id"]);
    foreach($datos as $recor){ ?> 
<div class="container">

    <div class="contenedor_general">
        <div class="col-md-6 col-lg-3 simpleCart_shelfItem" capId="<?php echo $recor["id_pro"] ?>" >
            <center>
            
            <input type="text" class="item_idpro" value="<?php echo $recor["id_pro"] ?>" style="display:none;">
            <h4 class="item_name"><?php echo $recor["nombre_pro"] ?></h4>
            <img class="item_" src="<?php echo $recor["imagen_pro"] ?>" width="300px" alt="" srcset="">
            <img class="item_image" src="<?php echo $recor["imagen_pro"] ?>" width="300px" alt="" style="display:none;" srcset="">
            ingrese cantidad
            <input class="item_quantity" type="number" min="1" max="10" value="1" name="" id="">
            <div class="item_price"><?php echo $recor["precio_pro"] ?></div>
            <a href="javascript:;" class="item_add"> añadir a carrito</a>
            </center>
        </div>
    </div>
</div>
    <?php } ?>
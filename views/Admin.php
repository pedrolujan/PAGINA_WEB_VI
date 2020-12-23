<?php
session_start();
if(!isset($_SESSION["usuarioLogeado"]) and !isset($_SESSION["adminLogeado"]) ){
    header("Location: ../index.php");
}
error_reporting(0);
include("../model/url.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/jquery-3.5.1.min.js"></script>    <!-- 
    <script src="../js/jquery-Carrito/simpleCart.min.js"></script>
    <script src="../js/jquery-Carrito/app.js"></script> -->

    <!-- <link rel="stylesheet" href="CSS/carrito/bootstrap-grid.css"> -->
    <link rel="stylesheet" href="../css/estilos_principalAdmin.css">

    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/carrito/estilos.css">
    <link rel="stylesheet" href="../fonts/style.css">
<link rel="stylesheet" href="../js/jquery.modal.min.css">
    <link rel="stylesheet" href="../fonts/fonts/style.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilosUsuComun.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilos_regProducto.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilosFooter.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilosHeader.css">
    <link rel="stylesheet" href="../css/estilos_accionesAdmin.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
</head>

<body class="body-expanded">
    <?php include("header.php"); ?>
    <?php include("menu_lateral.php");?>
       
    <div id="" class="area_trabajo">
        <div class="contenedorEstadisticas">
            <div class="cajas EstadisticaCantidadProdVendidos">
                <div class="contenDatos_icono ECProdVendidos">
                    <div class="datos">
                        <h2 id="ProductosVendidos">190</h2>
                        <p>Productos Vendidos</p>
                    </div>
                    <div class="icono">
                        <img src="../imagenes/fuentes/icon_prodVend.png" />
                    </div>
                </div>
                <div class="masInfo masInfoProVendidos">
                    <p>mas informacion <span class="fas fa-arrow-circle-right"></p>
                </div>
            </div>
            <div class="cajas EstadisticaCantidadDinero">
                <div class="contenDatos_icono ECantDinero">
                    <div class="datos">
                        <h2 id="DineroGenerado"></h2>
                        <p>Dinero Generado</p>
                    </div>
                    <div class="icono">
                    <span class="fas fa-hand-holding-usd"></span>
                    </div>
                </div>
                <div class="masInfo masInfoCantDinero">
                    <p>mas informacion <span class="fas fa-arrow-circle-right"></p>
                </div>
            </div>
            <div class="cajas EstadisticaCantidadUsuarios">
                <div class="contenDatos_icono ECantUsuarios">
                    <div class="datos">
                        <h2 id="clientesRegistrados">150</h2>
                        <p>Clientes</p>
                    </div>
                    <div class="icono">
                    <span class="fas fa-users"></span>
                    </div>
                </div>
                <div class="masInfo masInfoCantUsuarios">
                    <p>mas informacion <span class="fas fa-arrow-circle-right"></p>
                </div>
            </div>
            <div class="cajas EstadisticaCantidadProd">
                <div class="contenDatos_icono ECantProdStok">
                    <div class="datos">
                        <h2 id="productosStock">50</h2>
                        <p>Productos en Stock</p>
                    </div>
                    <div class="icono">
                    <img src="../imagenes/fuentes/icon_prod.png" />
                    </div>
                </div>
                <div class="masInfo masInfoCantProdStok">
                    <p>mas informacion <span class="fas fa-arrow-circle-right"></span></p>
                </div>
            </div>
        </div>
        <div class="cargarDatos">
        </div>
    </div>
    <?php
    ?>
 <?php include("../controller/datos_usuario.php"); ?>
    <?php include("ventanas_modal.php"); ?>
   

    <script>
    function abrirMenu() {
        const menu = document.querySelector('.sidemenu');
        menu.classList.toggle("menu-espanded");
        menu.classList.toggle("menu-collapsed");

        document.querySelector('body').classList.toggle('body-expanded');

    }
    </script>


    <script src="../js/principal.js"></script>
    <script src="../js/scrip_admin.js"></script>
    <script src="../js/scripVentas.js"></script>
</body>

</html>
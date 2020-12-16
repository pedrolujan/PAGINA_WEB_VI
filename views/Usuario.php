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
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilos_principal.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/carrito/estilos.css">
    <link rel="stylesheet" href="../fonts/style.css">
<link rel="stylesheet" href="../js/jquery.modal.min.css">
    <link rel="stylesheet" href="../fonts/fonts/style.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilosUsuComun.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilos_regProducto.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilosFooter.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto?>css/estilosHeader.css">
</head>

<body>
    <?php include("header.php"); ?>
    <?php include("menu_lateral.php");?>
        <div class="logoEBaners">
            <div class="banerCabecera">
                <?php if(isset($_SESSION["usuarioLogeado"])){ ?>
                <img src="<?php echo $urlProyecto?>imagenes/fuentes/baner3.png" alt=""
                    srcset="" width="50px">
                <?php }?>
            </div>
    </div> 
    <div id="" class="area_trabajo">
        <div class="cargarDatos"></div>
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
    <script src="../js/scripVentas.js"></script>
</body>

</html>
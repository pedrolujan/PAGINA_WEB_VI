<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilosUsuComun.css">

</head>

<body>
    <div class="headerGeneral">       
        <div id="header-main" class="header-main">
            <div class="contenHMain">
                <img src="imagenes/mi-logo.gif" alt="" srcset="">
                <div class="contenMenu">
                <?php
                if(!isset($_SESSION["usuarioLogeado"]) && !isset($_SESSION["adminLogeado"])){ ?>
                    <span class="icon-menu" onclick="abrirMenuProductos()"></span>
                <?php }?> 
                </div>
            
                <div class="busqueda">
                    <input class="searchBuscar" id="searchBuscar" type="search" placeholder="buscar producto"
                        style="width: 80%; padding: 8px;border-radius: 7px;">
                    <div class="contengif"></div>
                </div>
               
            
                <div class="divCarrito">
                <?php if(isset($_SESSION["usuarioLogeado"])){ ?>
                    <div class="row">
                        <div class="carrito">
                            <div class="carrito-total">
                                <span class="lnr lnr-cart"></span>
                                <p class="simpleCart_quantity cantidadUnidades">0</p>
                                <span class="simpleCart_total">0.00</span>
                            </div>
                            <div class="bolsa">
                                <div class="simpleCart_items"></div>
                                <button class="btn btnDetalleCarrito btn-primary">ver carrito</button>
                            </div>

                        </div>
                    </div>
                     <?php }?>
                </div>
               

                <div class="datos_usuario">
                    <?php
				    include("controller/datos_usuario.php");
			        ?>
                    <!-- <a href="views/login.php" class="btnlogin">login</a> -->
                </div>
            </div>
            <?php
            if(isset($_SESSION["usuarioLogeado"])){ ?>
        <div class="logoEBaners">
            <div class="banerCabecera"><img src="imagenes/fuentes/baner3.png" alt="" srcset="" width="50px"></div>
        </div>
        <?php }?>

        </div>
        <?php
        ?>
    </div>
    <div class="menuProcutos-espanded" id="menuProductos">
        <ul>
            <li class="icon-laptop"><a href="">Laptops</a></li>
            <li class="icon-tv"><a href="">Celulares</a></li>
            <li class="icon-mobile"><a href="">Celulares</a></li>
            <li class="icon-speaker_group"><a href="">Audio</a></li>
            <li class="icon-mouse"><a href="">Maus</a></li>
            <li class="icon-keyboard"><a href="">Teclados</a></li>
        </ul>
    </div>
    <script>
    function abrirMenuProductos() {
        const menu = document.querySelector('#menuProductos');
        menu.classList.toggle("menuProcutos-espanded");
        menu.classList.toggle("menuProcutos-collapsed");
    }
    </script>
</body>

</html>
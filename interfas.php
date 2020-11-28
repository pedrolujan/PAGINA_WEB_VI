<?php
error_reporting(0);
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PeJaTec Servis</title>
<!--     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
   <!--  <link rel="stylesheet" href="css/estilos_principal.css"> -->
   <link rel="stylesheet" href="http://localhost/PAGINA_WEB_VI/css/estilos_principal.css">
    <link rel="stylesheet" href="fonts/style.css">
    <link rel="stylesheet" href="fonts/fonts/style.css">
    <link rel="stylesheet" href="js/jquery.modal.min.css">
    <link rel="icon" href="imagenes/monitor.png" type="image/png">
    <script src="https://kit.fontawesome.com/0c226161df.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="conten_body2index">
        <div id="sidemenu" class="menu-collapsed sidemenu">
            <div id="header" class="header">
                <div class="title" id="title"><span>PeJaTec Servis</span></div>
                <div class="menu-btn" id="menu-btn" onclick="abrirMenu()">
                    <div class="btn-hamburger"></div>
                    <div class="btn-hamburger"></div>
                    <div class="btn-hamburger"></div>
                </div>
            </div>
            <div id="profile" class="profile">
                <div id="photo" class="photo"><?php
            if ( is_file( "imagenes/usuarios/" . $_SESSION[ 'usuarioLogeado' ] . ".jpg" ) ) {
                ?>
                    <img src="imagenes/usuarios/<?php echo($_SESSION['usuarioLogeado'])?>.jpg" width="150"
                        onclick="desplemenulogin()" class="img_usuario" />
                    <?php
            } else {
                ?>
                    <img src="imagenes/usuarioblanco.jpg" width="150" class="img_usuario" onclick="desplemenulogin()" />
                    <?php }?>
                </div>
                <div id="name" class="name"><span class="bievenido_usu"></span></div>
            </div>
            <div id="menu-items" class="menu-items" onclick="abrirMenu()">
                <?php include("views/items.php");?>
            </div>
        </div>
        <div id="header-main" class="header-main">
            <div class="contenHMain">
                <span class="icon-arrow-left2"></span>
                <div class="busqueda">
                    <input class="searchBuscar" id="searchBuscar" type="search" placeholder="buscar producto"
                        style="width: 80%; padding: 8px;border-radius: 7px;">
                    <div class="contengif"></div>
                </div>
                <div class="divCarrito">
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
                </div>

                <div class="datos_usuario">
                    <?php
				include("controller/datos_usuario.php");
			    ?>
                    <!-- <a href="views/login.php" class="btnlogin">login</a> -->
                </div>
            </div>
        </div>
     
 
    </div>
    <script>
    function abrirMenu() {
        console.log("aca toy");
        const menu = document.querySelector('.sidemenu');
        menu.classList.toggle("menu-espanded");
        menu.classList.toggle("menu-collapsed");

        document.querySelector('body').classList.toggle('body-expanded');

    }
    </script>
   
</body>

</html>
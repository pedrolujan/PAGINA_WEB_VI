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
    <link rel="stylesheet" href="css/estilos_principal.css">
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
                <div class="title" id="title"><span>pejatec</span></div>
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
                <div class="busqueda">
                    <input class="searchBuscar" id="searchBuscar" type="search" placeholder="buscar producto"
                        style="width: 80%; padding: 10px;border-radius: 7px;">
                    <div class="contengif"></div>
                </div>
                <div class="divCarrito">
                    <span class="lnr lnr-cart">
                        <p class="sumarCarrito">32</p>
                    </span>
                </div>

                <div class="datos_usuario">
                    <?php
				include("controller/datos_usuario.php");
			    ?>
                    <!-- <a href="views/login.php" class="btnlogin">login</a> -->
                </div>
            </div>
        </div>
        <div id="" class="area_trabajo">
            <div class="respuestas"></div>
            <div class="cargarDatos"></div>
        </div>
        <div class="messagechat" id="messagechat">
            <img src="imagenes/fuentes/icono_messeger.PNG" alt="" srcset="">
        </div>
        <div class="conten_chat" id="conten_chat">
            <div class="contenCH_header">
                <h3>Realiza tus consultas</h3>
            </div>
            <div class="contenCH_body"></div>
            <div class="contenCH_footer">
                <input type="text" name="txtmensaje" id="txtmensaje" placeholder="Escribe un mensaje">
                <div class="CHFoterImg"><span class="icon-send"></span></div>
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
   
    <?php include("views/ventanas_modal.php"); ?>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/principal.js"></script>
</body>

</html>
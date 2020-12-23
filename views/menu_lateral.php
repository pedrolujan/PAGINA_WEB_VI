<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PeJaTec Servis</title>
</head>

<body>
    <div class="conten_body2index">
        <?php
        if(isset($_SESSION["adminLogeado"])){?>
        <div id="sidemenu" class="menu-espanded sidemenu sidemenuAdmin">
            <?php }else{?>
            <div id="sidemenu" class="menu-collapsed sidemenu">
                <?php }?>
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
            if ( is_file($urlProyecto."imagenes/usuarios/" . $_SESSION[ 'usuarioLogeado' ] . ".jpg" ) ) {
                ?>
                        <img src="<?php echo $urlProyecto?>imagenes/usuarios/<?php echo($_SESSION['usuarioLogeado'])?>.jpg" width="150"
                            onclick="desplemenulogin()" class="img_usuario" />
                        <?php
            } else {
                ?>
                        <img src="<?php echo $urlProyecto?>imagenes/usuarioblanco.jpg" width="150" class="img_usuario"
                            onclick="desplemenulogin()" />
                        <?php }?>
                    </div>
                    <div id="name" class="name"><span class="bievenido_usu"></span></div>
                </div>
                <?php
            if(isset($_SESSION["adminLogeado"])){?>
                <div id="menu-items" class="menu-items">
                    <?php include("items.php");?>
                </div>
            <?php }else{?>
                <div id="menu-itemsUsu" class="menu-items menu-itemsUsu">
                    <?php include("items.php");?>
                </div>
            <?php }?>
            </div>

        </div>
</body>

</html>
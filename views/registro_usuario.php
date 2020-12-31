<?php
include("../model/url.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login / Registro PeJaTec Servis</title>

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


    <link rel="stylesheet" href="../fonts/fonts/style.css">
    <link rel="stylesheet" href="../css/stilos_login.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto ?>css/estilosUsuComun.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $urlProyecto ?>css/estilos_principal.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $urlProyecto ?>css/estilosFooter.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto ?>css/estilosHeader.css">

</head>

<body>
    <div class="headerGeneral">
        <div id="header-main" class="header-main" style="background: #fff;">
            <div class="contenHMain">
                <div class="logo">
                    <img src="<?php echo $urlProyecto ?>imagenes/fuentes/logo.jpg" alt="" srcset="" class="logoEmpresa">
                </div>
                <div class="contenMenu">
                    <?php
                    if (!isset($_SESSION["usuarioLogeado"]) && !isset($_SESSION["adminLogeado"])) { ?>
                        <span class="icon-menu" onclick="abrirMenuProductos()"></span>
                    <?php } ?>
                </div>

                <div class="busqueda">
                    <div class="contengif"></div>
                </div>

                <div class="divCarrito">
                </div>
                <div class="datos_usuario" onclick="desplemenulogin()">
                    <?php
                  /*   include("../controller/datos_usuario.php"); */
                    ?>
                    <a href="#login-form" rel="modal:open" class="aAbrirLogeo"></a>
                    <?php if (!isset($_SESSION["usuarioLogeado"]) and !isset($_SESSION["adminLogeado"])) { ?>
                        <div class="datos_usuarioEsp abrirLogeo">
                        <?php } else { ?>
                            <div class="datos_usuarioEsp">
                            <?php } ?>

                            <img src="<?php echo $urlProyecto ?>imagenes/usuarioblanco.jpg" width="150" / class="img_usuario" />


                            <p class="bievenido_usu"></p>
                            </div>
                            <?php if (isset($_SESSION["usuarioLogeado"])) { ?>
                                <ul class="celusubmenuUsuario" id="celusubmenu" onclick="desplemenulogin()">
                            <?php } else { ?>
                                <ul class="celusubmenu" id="celusubmenu" onclick="desplemenulogin()">
                                <?php } ?>
                                    <li><a href="php/cambiar_contrasena">Cabiar Contraseña</a></li>
                                    <li><a id="btnperfil">Perfil</a></li>
                                    <li><a href="../controller/salir.php">Salir</a></li>
                                </ul>
                                <!-- <a href="views/login.php" class="btnlogin">login</a> -->
                        </div>
                </div>

                






            </div>
        </div>
    </div>

    <div class="fondoLogin">
        <div class="contenImagenFondo">
            <img src="../imagenes/fuentes/fondoHombreConLaptop.png" alt="" srcset="">
        </div>
        <div class="container-form">


            <form action="#" method="post" class="form" id="formulario_registro">
                <div class="conten-cajas">
                    <div class="welcome-form">
                        <h1>Crea tu cuenta</h1>
                    </div>
                    <div class="datos-personales">
                        <div class="user line-input">
                            <label class="lnr lnr-user"></label>
                            <input type="text" placeholder="Nombres" name="txtnombre" id="txtnombre">
                        </div>
                        <div class="user line-input">
                            <label class="lnr lnr-users"></label>
                            <input type="text" placeholder="Apellidos" name="txtapellido" id="txtapellido">
                        </div>
                    </div>
                    <div class="datos-personales">
                        <div class="user line-input">
                            <label class="lnr lnr-license"></label>
                            <input type="number" placeholder="DNI" name="txtdni" id="txtdni">
                        </div>
                        <div class="user line-input">
                            <label class="lnr lnr-phone-handset"></label>
                            <input type="number" placeholder="Telefono" name="txttelefono" id="txttelefono">
                        </div>
                    </div>
                    <div class="datos-personales">
                        <div class="combo line-input">
                            <label class="lnr lnr-map-marker"></label>
                            <select name="cbo_pais" class="combobox" id="cbo_pais">
                                <option>Seleccione Pais</option>
                                <?php
                                include("../model/conexion.php");
                                $user = new ApptivaDB();

                                $departamentos = $user->buscar("pais", "1");
                                foreach ($departamentos as $dep) {   ?>
                                    <option value="<?php echo $dep['id_pais'] ?>">
                                        <?php echo $dep['nombre_pais'] ?>
                                    </option>
                                <?php   }   ?>
                            </select>
                        </div>
                        <div class="combo line-input">
                            <label class="lnr lnr-map-marker"></label>
                            <select name="cbo_provincia" class="combobox" id="cbo_provincia" width="113">
                                <?php $dprov = $user->buscar("provincia", "1");
                                foreach ($dprov as $pr) { ?>
                                    <option value="<?php echo $pr['id_provincia'] ?>"><?php echo $pr['prov_nombre'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="coreo-usuario">
                        <div class="user line-input">
                            <label class="lnr lnr-envelope"></label>
                            <input type="email" placeholder="Correo" name="txtcorreo" id="txtcorreo">
                        </div>
                        <div class="user line-input">
                            <label class="lnr lnr-user"></label>
                            <input type="text" placeholder="Nombre Usuario" name="txtusuario" id="txtusuario">
                        </div>
                    </div>
                    <div class="claves">
                        <div class="password line-input">
                            <label class="lnr lnr-lock"></label>
                            <input type="password" placeholder="Contraseña" name="txtclave" id="txtclave">
                        </div>
                        <div class="password line-input">
                            <label class="lnr lnr-lock"></label>
                            <input type="password" placeholder="Confirmar contraseña" name="txtconfclave" id="txtconfclave">
                        </div>
                    </div>

                    <div class="mensajeerror"></div>
                    <div class="mensajeok"></div>
                    <div class="container" id="container"></div>
                    <button id="btnRegistrar">Registrarse<label class="lnr lnr-chevron-right"></label></button>
                    <div class="salida" id="salida" style="background: #000; color: #fff;"></div>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/principal.js"></script>
    <script src="../js/script_login.js"></script>
</body>

</html>
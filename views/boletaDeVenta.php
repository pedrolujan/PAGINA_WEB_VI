<?php
error_reporting(0);
include("../model/conexion.php");
include("../model/url.php");
session_start();
$bus = new ApptivaDB();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="<?php echo $urlProyecto ?>css/estilos_principal.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto ?>css/estilosUsuComun.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $urlProyecto ?>css/estilosHeader.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto ?>css/ventas.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto ?>css/estilosFooter.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto ?>css/estilos_regProducto.css">
    <link rel="stylesheet" href="../pdf/factura/plantillas/reporte/style.css">
    
    
    <script src="../js/jquery-3.5.1.min.js"></script>

    <!-- 
    <script src="../js/jquery-Carrito/simpleCart.min.js"></script>
    <script src="..7js/jquery-Carrito/app.js"></script> -->
    <script src="../js/principal.js"></script>
</head>

<body>
    <div class="headerGeneral">
        <div id="header-main" class="header-main">
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
                    include("controller/datos_usuario.php");
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
        <div class="respuesta" id="respuesta"></div>
    </div>

    <?php
    $datos = $bus->buscarCar(
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
               AND usuarios.id_usu=" . $_SESSION["usuarioLogeado"]
    );

    $datUsu = $bus->buscar("usuarios", "usuarios.id_usu=" . $_SESSION["usuarioLogeado"]);
    $plantilla .=
'<div class="tamanioFactura" style="margin-top:90px;">
        <header class="clearfix">
            <div id="logo">
                <img src="../imagenes/fuentes/logo.png">
            </div>
            <div id="company">
                <h2 class="name">L&M TECNO STORE</h2>
                <div>CALLE MACGREGOR #712 LA ESPARANZA TRUJILLO</div>
                <div>910210378</div>
                <div><a href="mailto:lujanmarcelo1203@gmail.com">L&MTECNOSTORE.PRERU@GMAIL.COM</a></div>
            </div>       
        </header>
        <main class="main">
            <div id="details" class="clearfix">
            <div id="client">
                <div class="to">CLIENTE</div>';
                foreach ($datUsu as $dUs) {
                $plantilla .= '<h2 class="name">' . $dUs["apellido_usu"] . '' . $dUs["nombre_usu"] . '</h2>
                <div class="address">DNI ' . $dUs["dni_usu"] . '</div>
                <div class="email">TELEFONO ' . $dUs["telefono_usu"] . '</div>
                <div class="email"><a href="mailto:' . $dUs["correo_usu"] . '">' . $dUs["correo_usu"] . '</a></div>';
                }
            $plantilla.='
            </div>
            <div id="invoice">';
            $ZonaHoraria = date_default_timezone_set('America/lima');
            $fecha_actual = date("d/m/yy G:i");
                /* foreach ($datUsuarioUbigeo as $recor) { */
                    $plantilla .= '<h1>CL&M_001</h1>
                    <div class="date">'.$fecha_actual.'</div>
                    <div class="BVdepartamento date">' .$_POST["departamento"] . '</div>
                    <div class="BVprovincia date">' . $_POST["provincia"] . '</div>
                    <div class="BVdistrito date">' . $_POST["distrito"] . '</div>';
               /*  } */
            $plantilla.=
            '</div>
            </div>
            <table border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                    <th colspan="2" class="cabecera">PRODUCTO</th>
                    <th class="cabecera">CANTIDAD</th>
                    <th class="cabecera">P. UNIDAD</th>
                    <th class="cabecera">SUBTOTAL</th>
                    </tr>
                </thead>
                <tbody>';
                    foreach ($datos as $recor) {
                        $plantilla .= '<tr>
                        <td class="desc"><img src="' . $recor["imagen_pro"] . '" alt="" srcset="" width="80px"></td>
                        <td class="">' . $recor["nombre_pro"] . '</td>
                        <td class="qty">' . $recor["unidades_car"] . '</td>
                        <td class="qty">S/' . number_format($recor["precio_pro"], 1) . '</td>
                        <td class="total">S/ ' . number_format($recor["subTotal_car"], 1) . '</td>
                        </tr>';
                    }
                $plantilla .= '
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">SUBTOTAL</td>';
                       /*  foreach ($datUsuarioUbigeo as $recor) { */
                            $plantilla .= '<td class="simpleCart_total">S/' . $recor["subTotal"] . '</td>';
                       /*  } */
                $plantilla 
                 .='</tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Costo envio</td>
                            <td>'.$_POST["CostoEnvio"].'</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">TOTAL</td>';
                           /*  foreach ($datUsuarioUbigeo as $recor) { */
                                $plantilla .= '<td>S/'.$_POST["total"]. '</td>';
                            /* } */
                    $plantilla .= '
                        </tr>
                </tfoot>
            </table>
            
        </main>
   
</div>
<button class="btn btnTerminarCompra"> realizar pago</button>';
    echo $plantilla;
    
    ?>
    <?php include("footer.php"); ?>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/principal.js"></script>
    <script src="../js/scripVentas.js"></script>
</body>

</html>
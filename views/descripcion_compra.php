<?php
include("../model/url.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../pdf/factura/plantillas/reporte/style.css">
    <link rel="stylesheet" href="../css/estilos_principal.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto ?>css/estilosUsuComun.css" type="text/css">

    <link rel="stylesheet" href="<?php echo $urlProyecto ?>css/estilosHeader.css">
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/principal.js"></script>
</head>

<body>
    <?php

    $fecha = $_GET["fechaReg"];
    $idUasuario = $_GET["idUsu"];
    $codigoCompra = $_GET["codComp"];
    mostarFactura($idUasuario, $fecha, $codigoCompra);
    function mostarFactura($idUasuario, $fecha, $codigoCompra)
    {
        include("header.php");
        include("../model/conexion.php");

        session_start();
        $bus = new ApptivaDB();
        $plantilla = "";
        $usuarios = $bus->buscarFech(
            "usuarios.id_usu,
            usuarios.nombre_usu, 
            usuarios.apellido_usu, 
            usuarios.dni_usu, 
            usuarios.telefono_usu, 
            usuarios.correo_usu, 
            usuarios.imagen_usu",
            "compras
            INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car
            INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
            INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
            "carrito.ID_USUARIOS=" . $idUasuario . "
            GROUP by carrito.ID_USUARIOS
            ORDER BY compras.fecha_corta_comp"
        );
        foreach ($usuarios as $recor_Usuarios) {
            $fechaCompra = $bus->buscarFech(
                "carrito.id_car,
              carrito.ID_USUARIOS,               
              productos.imagen_pro,                
              productos.nombre_pro,                
              productos.precio_pro,                
              compras.COD_COMPRA,
              compras.fecha_comp,
              compras.departamento_comp,
              compras.provincia_comp,
              compras.distrito_comp,
              carrito.unidades_car,
              carrito.subTotal_car,              
              compras.fecha_corta_comp",
                "compras
              INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car
              INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
              INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
                "carrito.ID_USUARIOS='" . $recor_Usuarios["id_usu"] . "'
              AND compras.fecha_corta_comp='" . $fecha . "' 
              AND compras.COD_COMPRA='" . $codigoCompra . "'"
            );

            /*  $datUsu = $bus->buscar("usuarios", "usuarios.id_usu=" . $_SESSION["usuarioLogeado"]); */
            $datUsuarioUbigeo = $bus->buscarFech(
                "
              compras.departamento_comp,
              compras.provincia_comp,
              compras.fecha_comp,
              compras.fecha_corta_comp,
              compras.COD_COMPRA,
              SUM(subTotal_car) as subTotal,
              compras.distrito_comp",
                "compras
              INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car
              INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
              INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
                "usuarios.id_usu='" . $recor_Usuarios["id_usu"] . "'
              AND compras.COD_COMPRA='" . $codigoCompra . "'
              AND compras.fecha_corta_comp='" . $fecha . "'
              GROUP BY .usuarios.id_usu"
            );
            $plantilla .= '
        <div class="contenedorBoletasAdmin">
            <div class="tamanioFactura">
                <header class="clearfix">
                    <div id="logo">
                        <img src="../imagenes/fuentes/logo.png">
                    </div>
                    <div id="company">
                        <h2 class="name">L&M TECNO STORE</h2>
                        <div class="datEmpresa">CALLE MACGREGOR #712 LA ESPARANZA TRUJILLO</div>
                        <div class="datEmpresa">910210378</div>
                        <div><a href="mailto:lujanmarcelo1203@gmail.com">L&MTECNOSTORE.PRERU@GMAIL.COM</a></div>
                    </div>       
                </header>
                <main class="main">
                    <div id="details" class="clearfix">
                    <div id="clienteComprador">
                        <div class="to">
                            CLIENTE
                            <img src=../'.$recor_Usuarios["imagen_usu"].' alt="" srcset="" 
                                style="border-radius: 50%;background: #fff;
                                border: solid 1px #ccc;
                                margin: 5px;
                                object-fit: scale-down; width:80px;height:80px;"> 
                        </div>';
                        $plantilla .= '
                        <h2 class="name">' . $recor_Usuarios["apellido_usu"] .''. $recor_Usuarios["nombre_usu"] . '</h2>
                        <div class="address">
                            DNI ' . $recor_Usuarios["dni_usu"] . '
                        </div>
                        <div class="email">
                          TELEFONO ' . $recor_Usuarios["telefono_usu"] . '
                        </div>
                        <div class="email">
                            <a href="mailto:' . $recor_Usuarios["correo_usu"] . '">' . $recor_Usuarios["correo_usu"] . '
                        </a></div>';

        $plantilla.='</div>
                    <div id="EnviarA">
                        <span id="dondeEnviar">Enviar A</span>';
                        foreach ($datUsuarioUbigeo as $recor) {
                        $plantilla .= '
                        <div class="date">
                            DEP:' . $recor["departamento_comp"] . '
                        </div>
                        <div class="date">
                            PROV: ' . $recor["provincia_comp"] . '
                        </div>
                        <div class="date ">
                            DIST: ' . $recor["distrito_comp"] . '
                        </div>';
                        }
        $plantilla.='</div>
                    <div id="invoice">';
                        foreach ($datUsuarioUbigeo as $recor) {
                         $plantilla .= '
                            <h1>' . $recor["COD_COMPRA"] . '</h1>
                            <div class="date">' . $recor["fecha_corta_comp"] . '</div>';
                        }
        $plantilla.='</div>
                            </div>
                    <table border="0" style="width: 100%;">
                        <thead>
                            <tr>
                            <th colspan="2" class="cabecera">PRODUCTO</th>
                            <th class="cabecera">CANTIDAD</th>
                            <th class="cabecera">P. UNIDAD</th>
                            <th class="cabecera">SUBTOTAL</th>
                            </tr>
                        </thead>
                        <tbody>';
                            foreach ($fechaCompra as $recor) {
                            $plantilla .= '
                            <tr>
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
                                foreach ($datUsuarioUbigeo as $recor) {
                                $plantilla .= '
                                <td>S/' . $recor["subTotal"] . '</td>';
            }
                                $plantilla.= '
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">Costo envio</td>
                                <td>S/ 20</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">TOTAL</td>';
                                foreach ($datUsuarioUbigeo as $recor) {
                                $plantilla .= '<td>S/' . ($recor["subTotal"] + 20) . '</td>';
                                 }
            $plantilla .= '</tr>
                        </tfoot>
                    </table>
                    
                </main>
   
            </div>
        ';
            echo $plantilla;
        }
    }

    ?>

    <div class="contenedorBotones" style="display:flex; justify-content: space-evenly; width: 95%; margin: 50px;">
        <a class="btn" style="font-size:16px; border:solid 1px #F1C643; color: red;padding: 10px 20px; text-align:center;width: 200px;display: flex; align-items: center;" href="../pdf/factura/index.php?fecha=<?php echo $fecha ?>&codCompra=<?php echo $codigoCompra ?>&idUsu=<?php echo $idUasuario ?>">
            imprimir boleta
            <img src="../imagenes/fuentes/iconPdf.png" style=" border-radius: 5px;width: 35px; background: #fff;margin-left:5px; " alt="" srcset="">
        </a>
    </div>
    </div>
</body>

</html>


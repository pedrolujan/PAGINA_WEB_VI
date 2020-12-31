<?php
include("../model/conexion.php");
include("../model/url.php");
session_start();
$bus = new ApptivaDB();
setlocale(LC_ALL, "es_ES.UTF-8", "es_ES", "es");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo $urlProyecto ?>css/estilos_principal.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto ?>css/estilosCarritoDetalle.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto ?>fonts/fonts/style.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto ?>css/estilosUsuComun.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $urlProyecto ?>css/estilosHeader.css">
    <link rel="stylesheet" href="<?php echo $urlProyecto ?>css/ventas.css">
    <link rel="stylesheet" href="../pdf/factura/plantillas/reporte/style.css">

    <script src="../js/jquery-3.5.1.min.js"></script>

</head>

<body class="body">
    <?php
    include("header.php");
    ?>
    <div class="contenedorMisComprasGeneral">
        <?php
        $fechaCompra =
            $bus->buscarFech(
                "carrito.id_car,
                carrito.ID_USUARIOS,               
                productos.imagen_pro,                
                compras.fecha_comp,
                carrito.unidades_car,
                compras.fecha_corta_comp, COUNT(*) AS totalCompras",
                "compras
                INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car
                INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
                INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
                "carrito.ID_USUARIOS=" . $_SESSION["usuarioLogeado"] . "
                GROUP BY compras.fecha_corta_comp
                HAVING COUNT(*)
                ORDER BY compras.fecha_corta_comp"
            );

        ?>
        <div class="contenedor_porCompra">
            <?php foreach ($fechaCompra as $recorFecha) {
                $codigo_compras = $bus->buscarFech(
                    "carrito.id_car,
                            carrito.ID_USUARIOS,
                            SUM(subTotal_car) AS TOTAL,               
                            productos.imagen_pro,                
                            compras.fecha_comp,
                            SUM(subTotal_car) AS TOTAL,
                            compras.COD_COMPRA,
                            SUM(carrito.unidades_car) as totalProductos,
                            compras.fecha_corta_comp",
                            "compras
                            INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car
                            INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
                            INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
                            "carrito.ID_USUARIOS='" . $_SESSION["usuarioLogeado"] . "'
                            AND compras.fecha_corta_comp='" . $recorFecha["fecha_corta_comp"] . "'
                            GROUP BY compras.COD_COMPRA
                            HAVING COUNT(*)
                            ORDER BY compras.COD_COMPRA"
                ); ?>
                <div class="contenedor_compras">

                    <i><?php echo strftime("%d de %B del %Y", strtotime( $recorFecha["fecha_corta_comp"]));?></i>
                    <?php foreach ($codigo_compras as $recorCodigo_compras) {
                        $imagenes =
                            $bus->buscarFech(
                                "carrito.id_car,             
                            productos.imagen_pro,
                            carrito.unidades_car",
                                "compras
                            INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car
                            INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
                            INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
                                "carrito.ID_USUARIOS='" . $_SESSION["usuarioLogeado"] . "'
                            AND compras.COD_COMPRA='" . $recorCodigo_compras["COD_COMPRA"] . "'
                            AND compras.fecha_corta_comp='" . $recorFecha["fecha_corta_comp"] . "'"
                            ); ?>

                        <div class="contenCompras" capturofecha="<?php echo $recorFecha["fecha_corta_comp"]; ?>" capturoCodCompra="<?php echo $recorCodigo_compras["COD_COMPRA"]; ?>">
                            <div class="ComprasFechaYTotal">

                                <p>Cod: Compra <?php echo $recorCodigo_compras["COD_COMPRA"]; ?></p>
                                <p> Productos <?php echo $recorCodigo_compras["totalProductos"]; ?></p>
                                <span>S/ <?php echo number_format($recorCodigo_compras["TOTAL"], 1); ?></span>
                            </div>
                            <div class="ComprasImagenes">
                                <?php foreach ($imagenes as $imag) { ?>
                                    <div><img src="<?php echo $imag["imagen_pro"]; ?>" alt="" srcset="">
                                        <span><?php echo $imag["unidades_car"]; ?></span></div>
                                <?php } ?>

                            </div>
                        </div>
                    <?php
                    } ?>
                </div>
            <?php  } ?>
        </div>
        <div class="cargarComprasDetalle">

        </div>

    </div>

    <script src="../js/principal.js"></script>
    <script src="../js/scripVentas.js"></script>
</body>

</html>
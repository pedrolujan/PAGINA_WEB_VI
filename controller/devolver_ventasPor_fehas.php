<?php
include("../model/conexion.php");
include("../model/url.php");
$bus = new ApptivaDB();
session_start();

$html = "";
$fecha_inicio = $_POST["fechaIni"];
$fecha_final = $_POST["fechaFin"];
$itemDashboard = $_POST["itemDashboard"];

$ZonaHoraria = date_default_timezone_set('America/lima');
$fecha = date("y-m-d");

if ($itemDashboard == "productosVendidos") {
    if (empty($fecha_inicio) && empty($fecha_final)) {
        $fecha_inicio = "2020-01-01";
        $fecha_final = $fecha;
    }


?>
    <div class='contenedorComprasGeneralAdmin'>
        <?php
        $usuarios = $bus->buscarFech(
            "usuarios.id_usu, usuarios.nombre_usu, usuarios.apellido_usu, usuarios.imagen_usu",
            "compras
            INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car
            INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
            INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
                    "'1' GROUP by carrito.ID_USUARIOS
            ORDER BY compras.fecha_corta_comp"
        );

        foreach ($usuarios as $recor_Usuarios) {
            $fechas = $bus->buscarFech(
                "carrito.id_car,usuarios.id_usu, usuarios.imagen_usu, compras.fecha_comp, compras.ID_CARRITO, carrito.unidades_car, compras.fecha_corta_comp",
                "compras 
                INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car 
                INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu 
                INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
                "carrito.ID_USUARIOS=" . $recor_Usuarios["id_usu"] . "
                AND compras.fecha_corta_comp BETWEEN '" . $fecha_inicio . "' AND '" . $fecha_final . "'
                GROUP by compras.fecha_corta_comp
                ORDER BY compras.fecha_corta_comp"
            );
        ?>
            <div class='contenedorUsuarioYCompras'>
                <div class='cDatosUsuario'>
                    <p><?php echo $recor_Usuarios['apellido_usu'] ?></p>
                    <p><?php echo $recor_Usuarios['nombre_usu'] ?></p>
                    <img src="../<?php echo $recor_Usuarios['imagen_usu'] ?>" alt='' srcset=''>
                </div>
                <?php

                foreach ($fechas as $recor_fechas) {
                    $compras =
                        $bus->buscarFech(
                            "carrito.id_car,
                            carrito.ID_PRODUCTOS,
                            productos.imagen_pro,
                            carrito.ID_USUARIOS,
                            usuarios.nombre_usu,
                            usuarios.imagen_usu,
                            carrito.unidades_car,
                            compras.fecha_corta_comp",
                                                    "compras
                            INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car
                            INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
                            INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
                                                    "compras.fecha_corta_comp ='" . $recor_fechas["fecha_corta_comp"] . "'
                            AND compras.fecha_corta_comp BETWEEN '" . $fecha_inicio . "' AND '" . $fecha_final . "'
                            AND carrito.ID_USUARIOS='" . $recor_Usuarios["id_usu"] . "'"
                        );

                ?>

                    <a href="descripcion_compra.php?idUsu=<?php echo $recor_Usuarios['id_usu'] ?>&fechaReg=<?php echo $recor_fechas['fecha_corta_comp'] ?>" class='contenCompras' capturoIdUsu="<?php echo $recor_Usuarios['id_usu'] ?>" capturofecha="<?php echo $recor_fechas['fecha_corta_comp'] ?>">
                        <div class='ComprasFechaYTotal'>
                            <i><?php echo $recor_fechas['fecha_corta_comp'] ?></i>
                        </div>
                        <div class='ComprasImagenes'>
                            <?php

                            foreach ($compras as $recor_compras) {
                            ?>
                                <div>
                                    <img src="<?php echo $recor_compras['imagen_pro'] ?>" alt='' srcset='' width='30px'>
                                    <span><?php echo $recor_compras['unidades_car'] ?></span>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </a>

                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>
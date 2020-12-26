<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">


</head>
<body>
<?php
include("../model/conexion.php");
include("../model/url.php");
$bus = new ApptivaDB();
session_start();

$html = "";
/* $fecha_inicio = $_GET["fechaIni"];
$fecha_final = $_GET["fechaFin"];
$itemDashboard = $_POST["itemDashboard"]; */
$fecha=$_GET["fechaReg"];
$idUasuario=$_GET["idUsu"];

/* $ZonaHoraria = date_default_timezone_set('America/lima');
$fecha = date("y-m-d"); */

/* if ($itemDashboard == "productosVendidos") { */
    /* if (empty($fecha_inicio) && empty($fecha_final)) {
        $fecha_inicio = "2020-01-01";
        $fecha_final = $fecha;
    } */


?>
    <div class='card'>
        <?php
        $usuarios = $bus->buscarFech(
            "usuarios.id_usu, usuarios.nombre_usu, usuarios.apellido_usu, usuarios.imagen_usu",
            "compras
            INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car
            INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
            INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
            "carrito.ID_USUARIOS=".$idUasuario."
            GROUP by carrito.ID_USUARIOS
            ORDER BY compras.fecha_corta_comp"
        );

        foreach ($usuarios as $recor_Usuarios) {
            $fechas = $bus->buscarFech(
                "carrito.id_car,usuarios.id_usu, usuarios.imagen_usu, compras.fecha_comp, compras.ID_CARRITO, carrito.unidades_car, compras.fecha_corta_comp",
                "compras 
                INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car 
                INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu 
                INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
                "carrito.ID_USUARIOS=".$idUasuario."
                AND compras.fecha_corta_comp='".$fecha."'
                GROUP by compras.fecha_corta_comp
                ORDER BY compras.fecha_corta_comp"
            );
        ?>
            <div class='col-lg-12 bg-danger'>
                <div class='card-header'>
                    <p><?php echo $recor_Usuarios['apellido_usu'] ?></p>
                    <p><?php echo $recor_Usuarios['nombre_usu'] ?></p>
                    <img src="../<?php echo $recor_Usuarios['imagen_usu'] ?>" width="60px" alt='' srcset=''>
                </div>
                <?php

                foreach ($fechas as $recor_fechas) {
                    $compras =
                        $bus->buscarFech(
                            "carrito.id_car,
                            carrito.ID_PRODUCTOS,
                            productos.imagen_pro,
                            productos.id_pro,
                            productos.nombre_pro,
                            carrito.ID_USUARIOS,
                            usuarios.nombre_usu,
                            usuarios.imagen_usu,
                            carrito.unidades_car,
                            compras.fecha_corta_comp",
                            "compras
                            INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car
                            INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
                            INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
                            "compras.fecha_corta_comp ='".$fecha."'
                            AND carrito.ID_USUARIOS='" . $idUasuario. "'"
                        );

                ?>

                  
                        <div class='col-lg-12'>
                            <i><?php echo $recor_fechas['fecha_corta_comp'] ?></i>
                        </div>
                        <div class='card-body"'>
                            <?php

                            foreach ($compras as $recor_compras) {
                            ?>
                            <table class="table mt-5 mb-5" border="1">
                                <thead class="bg-primary">
                                    <tr>
                                        <td>Imagen</td>
                                        <td>Nombre</td>
                                        <td>Precio</td>
                                        <td>Cantidad</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img class="my-4" src="<?php echo $recor_compras['imagen_pro'] ?>" alt='' srcset='' width='30px'></td>
                                        <td><a href="detalle_producto.php?id=<?php echo $recor_compras['id_pro'] ?>"><?php echo $recor_compras['nombre_pro'] ?></a></td>
                                        <td></td>
                                        <td><?php echo $recor_compras['unidades_car'] ?></td>
                                    </tr>
                                </tbody>

                            </table>
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
    </div>
<?php
/* } */
?>


</body>
</html>
<?php
session_start();
$html = "";
include("../model/conexion.php");
$user = new ApptivaDB();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/estilos_activaciones.css">
</head>

<body>
    <div class="contenEstados">
        <div class="contenItemsEstados">
            <div class="contEstadosProductos">
                <p>productos</p>

            </div>
            <div class="contenEstadosUsuarios">
                <p>Usuarios</p>
            </div>
        </div>
        <div class="contenCargarDatos_Estados">
        <?php include("cambiar_estadosProductos.php"); ?>
        </div>
    </div>
</body>

</html>
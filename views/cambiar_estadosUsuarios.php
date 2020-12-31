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
<div class="contenedorEstados">
            <div class="datos datosActivos">
                <h3>activos</h3>
                <?php include("../controller/todosUsuarios.php"); ?>
            </div>

            <div class="datos datosInactivos">
                <h3>Inactivos</h3>
                <?php include("../controller/todosUsuarios.php"); ?>
            </div>
    </div>
</body>

</html>
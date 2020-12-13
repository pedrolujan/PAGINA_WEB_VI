<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
</head>
<body>
<input type="hidden" name="txtidFT" id="txtidFT">
<div class="contenFTPAcciones">
    <?php  if(isset($_SESSION["adminLogeado"])){?>
        <a href="#form-fichaTecnica" rel="modal:open">
            <img src="imagenes/fuentes/icon_editar.png" alt="" srcset="" class="btnEditFT">
        </a>
    <?php }?>
</div>
    <div class="conten-ficha-tecnica">
     
        <ul>
            <li><span>Tipo</span><span class="ftec-tipoP" id="ftec-tipoP">Laptop</span></li>
            <li><span>Modelo</span><span class="ftec-modelP">X543NA-DM355T</span></li>
            <li><span>Tamaño de pantalla</span><span class="ftec-tamPantP">15.6"</span></li>
            <li><span>Definicion</span><span class="ftec-DefinicionP">HD</span></li>
            <li><span>resolucion de pantalla</span><span class="ftec-resolPP">(1366 x 768)</span></li>
            <li><span>Pantalla Tactil</span><span class="ftec-pantTactilP">No</span></li>
            <li><span>Ancho</span><span class="ftec-anchoP">2.72 cm</span></li>
            <li><span>Alto</span><span class="ftec-altoP">25.1 cm</span></li>
        </ul>
    </div>
    <?php include("footer.php"); ?>
    <!-- <script src="js/jquery-3.5.1.min.js"></script>
 -->
</body>

</html>
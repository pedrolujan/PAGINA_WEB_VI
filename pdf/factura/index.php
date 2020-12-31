<?php
$fecha=$_GET["fecha"];
$codigo=$_GET["codCompra"];
$idUsuario=$_GET["idUsu"];

require_once("../vendor/autoload.php");
require_once("plantillas/reporte/index.php");
$css=file_get_contents("plantillas/reporte/style.css");

$mpdf= new Mpdf\Mpdf([

]);
$plantilla =mostarFactura($fecha,$codigo,$idUsuario);

$mpdf->writeHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($plantilla,\Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output("Mi Compra_".$codigo." L&M-TECNO-STORE.pdf","i");
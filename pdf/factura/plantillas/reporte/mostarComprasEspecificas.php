<link rel="stylesheet" href="plantillas/reporte/factura.css">
<?php
function mostarFactura($fech,$cod){
  
include("../../model/conexion.php");
include("../../model/url.php");
session_start();
$bus = new ApptivaDB();
$html = "";
$fecha =$fech;
$codigoCompra =$cod;

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
    "carrito.ID_USUARIOS='" . $_SESSION["usuarioLogeado"] . "'
                AND compras.fecha_corta_comp='" . $fecha . "' 
                AND compras.COD_COMPRA='" . $codigoCompra . "'"
);

$datUsu = $bus->buscar("usuarios", "usuarios.id_usu=" . $_SESSION["usuarioLogeado"]);
$datUsuarioUbigeo = $bus->buscarFech(
    "
                compras.departamento_comp,
                compras.provincia_comp,
                SUM(subTotal_car) as subTotal,
                compras.distrito_comp",
                "compras
                INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car
                INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
                INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
            "usuarios.id_usu='" . $_SESSION["usuarioLogeado"] . "'
                AND compras.COD_COMPRA='" . $codigoCompra . "'
                AND compras.fecha_corta_comp='" . $fecha . "'
                GROUP BY .usuarios.id_usu"
);


$disenio="";

$disenio='<div id="contenedorGeneralBoleta" style="width: 100%; margin-top: 50px;">
    <div class="contenHeaderBoleta">
        <div class="contenDatosEmpresa">
            <h2>L&M TecnoStore</h2>
            <div class="contactoEmpresa">
                <p>Calle Macgregor #712 La Esperanza</p>
                <p>http//L&M.StoreTecnology.in</p>
                <p>910210378</p>
            </div>
        </div>
        <div class="contenLogoEmpresa">
            <img src="../imagenes/fuentes/logo.png" alt="" srcset="">
        </div>
    </div>
    <div class="contenDatosCliente">
        <div class="contenDatosCli">
            <h2 class="dtCliente">Cliente</h2>';
            foreach ($datUsu as $dUs) {
    $disenio.='<p>NOMBRE <span>'.$dUs["apellido_usu"].''. $dUs["nombre_usu"].'</span></p>
                <p>DNI <span>'.$dUs["dni_usu"].'</span></p>
                <p>TELEFONO <span>'.$dUs["telefono_usu"].'</span></p>
                <p>CORREO <span>'.$dUs["correo_usu"].'</span></p>';

            }
    $disenio.='</div>
        <div class="contenDatosClieAEnviar">
            <h2 class="dtCliente">Enviar A:</h2>';
            foreach ($datUsuarioUbigeo as $recor) {
    $disenio.='<p>Departamento <span class="BVdepartamento">'. $recor["departamento_comp"].'</span></p>
                <p>Provincia <span class="BVprovincia">'.$recor["provincia_comp"].'</span></p>
                <p>Distrito <span class="BVdistrito">'.$recor["distrito_comp"].'</span></p>';
            } 
    $disenio.='</div>
        <div class="contenFechaBoleta">
            <div class="fecha_Nfactura">
                <p class="labelFecha">FECHA </p>';
                $ZonaHoraria = date_default_timezone_set("America/lima");
                $fecha_actual = date("d/m/yy G:i");
                $disenio.='<p>'.$fecha_actual.'</p>
                <p class="labelNfactura">N° FACTURA</p>
                <P>0000012</P>
            </div>
        </div>
    </div>
    <div class="contenDetalleBoleta">
        <table>
            <thead>
                <tr>
                    <th colspan="2">PRODUCTO</th>
                    <th>CANTIDAD</th>
                    <th>P. UNIDAD</th>
                    <th>SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>';
                foreach ($fechaCompra as $recor) {
        $disenio.='<tr>
                        <td class="td">
                            <div><img src="'.$recor["imagen_pro"].'" alt="" srcset="" width="80px"></div>
                        </td>
                        <td class="td">
                            <div>'.$recor["nombre_pro"].'</div>
                        </td>
                        <td class="td">
                            <div>'.$recor["unidades_car"].'Un</div>
                        </td>
                        <td class="td">
                            <div>S/'.number_format($recor["precio_pro"], 1).'</div>
                        </td>
                        <td class="td">
                            <div>S/ '.number_format($recor["subTotal_car"], 1).'</div>
                        </td>
                    </tr>';
                }

    $disenio.='</tbody>

        </table>
        <div class="boletadSaldosAPagar">
            <div class="etiquetas">
                <p>SUBTOTAL</p>
                <p>Costo Envio</p>
                <p>TOTAL</p>
            </div>
            <div class="etiquetasPrecios">';
               foreach ($datUsuarioUbigeo as $recor) { 
        $disenio.='<p class="CostoEnvio">S/'.$recor["subTotal"].'</p>
                    <p class="totalAPagar">S/ 20</p>
                    <p class="totalAPagar">S/' . ($recor["subTotal"] + 20).'</p>';
                } 
        $disenio.='</div>
        </div>
    </div>
</div>';
return $disenio;
}
?>

<!-- <div class="contenedorBotones" style="display:flex; justify-content: space-evenly; width: 95%; margin: 50px;">
<a style="padding: 20px 50px;" href="../pdf/factura/index.php"> ir a pdf</a>    
<button style="padding: 20px 50px;"> Desacagar</button>
    <button style="padding: 20px 50px;"> ver factura</button>
</div> -->
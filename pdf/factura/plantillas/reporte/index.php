<?php
function mostarFactura($fech, $cod,$idUsuario)
{
  include("../../model/conexion.php");
  include("../../model/url.php");
  session_start();
  $bus = new ApptivaDB();
  $html = "";
  $fecha = $fech;
  $codigoCompra = $cod;
  $plantilla = "";
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
    "carrito.ID_USUARIOS='" . $idUsuario. "'
                AND compras.fecha_corta_comp='" . $fecha . "' 
                AND compras.COD_COMPRA='" . $codigoCompra . "'"
  );

  $datUsu = $bus->buscar("usuarios", "usuarios.id_usu='" . $idUsuario."'");
  $datUsuarioUbigeo = $bus->buscarFech(
    "
                compras.departamento_comp,
                compras.provincia_comp,
                compras.fecha_comp,
                compras.COD_COMPRA,
                SUM(subTotal_car) as subTotal,
                compras.distrito_comp",
    "compras
                INNER JOIN carrito ON compras.ID_CARRITO=carrito.id_car
                INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu
                INNER JOIN productos ON carrito.ID_PRODUCTOS=productos.id_pro",
    "usuarios.id_usu='" . $idUsuario . "'
                AND compras.COD_COMPRA='" . $codigoCompra . "'
                AND compras.fecha_corta_comp='" . $fecha . "'
                GROUP BY .usuarios.id_usu"
  );
  $plantilla .='<body>
                    <header class="clearfix">
                      <div id="logo">
                        <img src="imagenes/logo.png">
                      </div>
                      <div id="company">
                        <h2 class="name">L&M TECNO STORE</h2>
                        <div class="datEmpresa">CALLE MACGREGOR #712 LA ESPARANZA TRUJILLO</div>
                        <div class="datEmpresa">910210378</div>
                        <div><a href="mailto:lujanmarcelo1203@gmail.com">L&MTECNOSTORE.PRERU@GMAIL.COM</a></div>
                      </div>
                      </div>
                    </header>
                    <main>
                      <div id="details" class="clearfix">
                        <div id="client" class="to">
                        CLIENTE
                          <div class="to">
                            ';
                            foreach ($datUsu as $dUs) {
                       $plantilla.='<img src=../../'.$dUs["imagen_usu"].' alt="" srcset="" 
                                style="border-radius: 50%;background: #fff;
                                border: solid 1px #ccc;
                                margin: 5px;
                                object-fit: scale-down; width:50px;height:50px;">';
                            }
                     $plantilla.='</div>';
                              foreach ($datUsu as $dUs) {
                              $plantilla .= '<h2 class="name">' . $dUs["apellido_usu"] . '' . $dUs["nombre_usu"] . '</h2>
                              <div class="address">DNI ' . $dUs["dni_usu"] . '</div>
                              <div class="email">TELEFONO ' . $dUs["telefono_usu"] . '</div>
                              <div class="email"><a href="mailto:' . $dUs["correo_usu"] . '">' . $dUs["correo_usu"] . '</a></div>';
                              }

            $plantilla.='</div>
                        <div id="invoice">';
                            foreach ($datUsuarioUbigeo as $recor) {
                            $plantilla .= '<h1>' . $recor["COD_COMPRA"] . '</h1>
                            <div class="date">' . $recor["fecha_comp"] . '</div>
                            ';
                            }
           $plantilla.='</div>
                        <div id="EnviarA">
                        <span id="dondeEnviar">Enviar A</span>';
                        
                            foreach ($datUsuarioUbigeo as $recor) {
                            $plantilla .= '<div class="date">DEP:' . $recor["departamento_comp"] . '</div>
                            <div class="date">PROV: ' . $recor["provincia_comp"] . '</div>
                            <div class="date "> DIST: ' . $recor["distrito_comp"] . '</div>';
                            }
           $plantilla.='</div>
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
                  foreach ($fechaCompra as $recor) {
                    $plantilla .= '<tr>
                            <td class="desc"><img src="' . $recor["imagen_pro"] . '" alt="" srcset="" width="80px"></td>
                            <td class="">' . $recor["nombre_pro"] . '</td>
                            <td class="qty">' . $recor["unidades_car"] . '</td>
                            <td class="qty">S/' . number_format($recor["precio_pro"], 1) . '</td>
                            <td class="total">S/ ' . number_format($recor["subTotal_car"], 1) . '</td>
                          </tr>';
                  }
                  $plantilla .= '</tbody>
                        <tfoot>
                          <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>';
                  foreach ($datUsuarioUbigeo as $recor) {
                    $plantilla .= '<td>S/' . $recor["subTotal"] . '</td>';
                  }
                  $plantilla .= '</tr>
                          <tr>
                            <td colspan="2"></td>
                            <td colspan="2">ENVIO</td>
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
                      <div id="thanks">GRACIAS POR SU COMPRA!</div>
                      <div id="notices">
                        <div>IMPORTANTE:</div>
                        <div class="notice">Se aplicará un cargo financiero del 1,5% sobre los saldos impagos después de 30 días.</div>
                      </div>
                    </main>
    <footer>
    La factura fue creada y emitida por la empresa L&M TECNO STORE y es valida sin firma ni sello.
    </footer>
  </body>';
  return $plantilla;
}

<?php

include "../model/conexion.php";
$con = new ApptivaDB();
session_start();

/* $comp_departamento = $_POST["departamento"];
$comp_provincia = $_POST["provincia"];
$comp_distrito = $_POST["distrito"];
$comp_direccion = $_POST["direccion"];
$comp_telefono = $_POST["telefono"];

$comp_series_compradas = $_POST["series_compradas"]; */

/* $comp_cantidad_compras = $_POST["cantidad_compras"];
$comp_gasto_total = intval($_POST["gasto_total"]);
$comp_costo_envio = intval($_POST["costo_envio"]);
$comp_sub_total = intval($_POST["sub_total"]); */
$cantRegistros=array();
$buscar="";
$obtener_ultimo_id=0;
/* consulta para buscar la cantidad de registros existentes en la tabla copras */
$buscar = $con->buscarCar("id_comp","compras","1");
foreach($buscar as $v){   
       $cantRegistros[]=$v["id_comp"];
}  

 /* si has menos de un registro a la variable le agrego uno si no le agrego el id maximo */
if(count($cantRegistros)<=1){
 $obtener_ultimo_id =1;
} else {
    $buscar = $con->buscarCar("MAX(id_comp) as id","compras","1");
    foreach($buscar as $v){   
       $obtener_ultimo_id=$v["id"];
    }  
}
/* obtengo el id del usuario logeado */
$obtener_id = $_SESSION['usuarioLogeado'];

$carrito = $con->buscarCar(
    "id_car",
    "carrito 
    INNER JOIN usuarios ON carrito.ID_USUARIOS=usuarios.id_usu",
    "carrito.ID_USUARIOS='$obtener_id' AND carrito.estado_car=0 GROUP BY carrito.id_car"
);

$ids_carrito = array();

foreach($carrito as $car){

    $ids_carrito[] =  $car["id_car"];
}

print_r($ids_carrito);

$cantidad_Comras=count($ids_carrito);

date_default_timezone_set("America/Lima");
$fecha_actual = date('Y-m-d H:i:s');

for ($i = 0; $i < $cantidad_Comras; $i++) {
    $generar_cod = "COMPRAL&M_0" . $obtener_ultimo_id;
     /* $compra_serie =  json_encode( $comp_series_compradas[$i], JSON_FORCE_OBJECT);  */
    $registrar_compras = $con->insertar(
        "compras",
        "'$ids_carrito[$i]','$generar_cod','1','2020','$fecha_actual'");

    if (!$registrar_compras) {
        $respuesta =  "todo mal";
       
    } else {
        $actualiza=$con->actualizar("carrito","carrito.estado_car=1","carrito.ID_USUARIOS=".$obtener_id);
        $respuesta =  "todo bien";
    }
}
echo $respuesta;
<?php
include("../model/conexion.php");
$busq=new ApptivaDB();

$consulta=$busq->buscar("productos","1");
echo json_encode($consulta);

<?php
 $altura =$_POST['altura'];
 $radio =$_POST['radio'];
$pi=3.1415;
 $procesar= ($altura*($radio*$radio)*$pi);
$arreglo['exito']=$procesar;
echo json_encode($arreglo);
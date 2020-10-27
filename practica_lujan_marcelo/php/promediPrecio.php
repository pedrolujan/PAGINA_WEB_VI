<?php
 $precio1 =$_POST['precio1'];
 $precio2 =$_POST['precio2'];
 $precio3 =$_POST['precio3'];

 $procesar= (($precio1+$precio2+$precio3)/3);
$arreglo2['ok']=$procesar;
echo json_encode($arreglo2);
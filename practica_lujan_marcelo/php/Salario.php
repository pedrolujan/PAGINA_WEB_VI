<?php
$arreglo3="";
 $horas =$_POST['horas'];
 $salario =$_POST['salario'];
 $sbruto=$horas*$salario;
    $descuento=($sbruto*10)/100;
    $sneto=$sbruto-$descuento;
$arreglo3.="<p>Sueldo bruto =".$sbruto."<br>
                    Descuento =".$descuento."<br>
                    Sueldo neto= ".$sneto."</p>";
echo $arreglo3;
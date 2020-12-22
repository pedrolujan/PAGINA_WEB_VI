<?php
session_start();
include("model/conexion.php");
include("../model/conexion.php");
$user=new ApptivaDB();      
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Documento sin título</title>
</head>

<body>
    <!-- aca creo una vetana modal -->
    <div class="modalRegpro" id="modal"> </div>
    <form action="#" method="post" enctype="multipart/form-dat" id="formularioRegPro">
        <div class="conten_regProG">
            <div class="conten_regPro">
                <div class="btnCerrar">X</div>
                <h3 id="msg">Registra producto</h3>
                <div class="contenFoto_prod">
                    <input type="file" name="imagenProducto" id="imagenProducto" style="display: none;">
                    <img src="../imagenes/fuentes/subir_imagen.gif" alt="" srcset="" id="acaFotoProducto">
                    <div class="btnSubeImgPro" id="btnSubeImgPro"><span class="icon-camera"></span></div>
                </div>
                <div class="contenCajas">
                    <div class="contenInputs" id="">
                        <input type="text" name="txtnombre" placeholder="Nombre del Producto">
                        <textarea name="txtdescripcion" id="" placeholder="Escribe aca la descripcion"></textarea>
                        <input type="text" name="txtmarca" id="" placeholder="Marca del Producto">

                        <div class="precio-cat"> 
                            <input type="number" name="txtprecio" id="" placeholder="Precio">
                            <input type="number" name="txtstok" id="" placeholder="Stock">
                            <select name="cbocategoria" id="cbocategoria">
                                <option value="">Selec. categoria</option>
                                <?php
                              
                                          
                                echo $categorias=$user->buscarTodo("categorias");   
                                foreach($categorias as $cat){?>
                                <option value="<?php echo $cat['id_cat'] ?>">
                                    <?php  echo $cat['nombre_cat'] ?>
                                </option>
                                <?php   }   ?>
                            </select>
                        </div>
                        <button class="btnRegistrarPro"> Registrar</button>
                    </div>

                </div>

            </div>
        </div>
    </form>
   <!--  <script src="../js/principal.js"></script> -->
    

</body>

</html>
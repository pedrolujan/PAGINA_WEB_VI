<div class="modalActualizaPro" id="modalActualizaPro"> </div>
<form action="#" method="post" enctype="multipart/form-dat" id="formularioRegPro">
    <div class="conten_ActualizaProG" id="conten_ActualizaProG">
        <div class="conten_ActualizaPro">
            <div class="btnCerrar">X</div>
            <h3 id="msg">Actualiza producto</h3>
            <div class="contenFotoAct_prod">
                <input type="file" name="imagenActProducto" id="imagenActProducto" style="display: none;">
                <img src="" alt="" srcset="" id="acaFotoActProducto">
                <div class="btnSubeImgActPro" id="btnSubeImgActPro"><span class="icon-camera"></span></div>
            </div>
            <div class="contenCajas">
                <div class="contenInputs" id="">
                <input type="hidden" name="capIdPro" id="capIdPro">
                    <input type="text" name="txtnombre" id="txtnombre" placeholder="Nombre del Producto" value="">
                    <textarea name="txtdescripcion" id="txtdescripcion" ></textarea>
                    <input type="text" name="txtmarca" id="txtmarca" placeholder="Marca del Producto" value="<?php echo $recor['marca_pro']; ?>">
                    <div class="precio-cat"> <input type="number" name="txtprecio" id="txtprecio">
                        <select name="cbocategoria" id="cbocategoria">
                            <option value="">Selec. categoria</option>
                            <?php             
                                echo $categorias=$user->buscarTodo("categorias");   
                                foreach($categorias as $cat):   ?>
                            <option value="<?php echo $cat['id_cat'] ?>">
                                <?php  echo $cat['nombre_cat'] ?>
                            </option>
                            <?php   endforeach;   ?>
                        </select>
                    </div>
                    <button class="btnRegistrarPro"><span class="icon-checkmark"></span>Actualizar</button>
                </div>

            </div>

        </div>
    </div>
</form>
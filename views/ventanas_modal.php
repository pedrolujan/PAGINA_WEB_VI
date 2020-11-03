<link rel="stylesheet" href="css/estilos_modals.css">
<div class="modalActualizaPro" id="modalActualizaPro"> </div>
<form action="#" method="post" enctype="multipart/form-dat" id="formularioActPro">
    <div class="conten_ActualizaProG" id="conten_ActualizaProG">
        <div class="conten_ActualizaPro">
            <div class="btnCerrar">X</div>
            <h3 id="msg">Actualiza producto</h3>
            <div class="contenFotoAct_prod">
                <input type="hidden" name="txtimagen" id="txtimagen" value="<?php echo $imagen ?>">
                <input type="file" name="imagenActProducto" id="imagenActProducto" style="display: none;">
                <img src="" alt="" srcset="" id="acaFotoActProducto">
                <div class="btnSubeImgActPro" id="btnSubeImgActPro"><span class="icon-camera"></span></div>
            </div>
            <div class="contenCajas">
                <div class="contenInputs" id="">
                    <input type="hidden" name="capIdPro" id="capIdPro">
                    <input type="text" name="txtnombre" id="txtnombre" placeholder="Nombre del Producto" value="">
                    <textarea name="txtdescripcion" id="txtdescripcion"></textarea>
                    <input type="text" name="txtmarca" id="txtmarca" placeholder="Marca del Producto"
                        value="<?php echo $recor['marca_pro']; ?>">
                    <div class="precio-cat"> <input type="number" name="txtprecio" id="txtprecio">
                        <select name="cbocategoria" id="cbocategoria">
                            <option value="">Selec. categoria</option>
                            <?php             
                                echo $categorias=$user->buscarTodo("categorias");   
                                foreach($categorias as $cat):   ?>
                            <option value="<?php echo $cat['id_cat'] ?>">
                                <?php  echo $cat['nombre_cat'] ?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <button class="btnRegistrarPro btnActualizarPro" id="btnActualizarPro"><span
                            class="icon-checkmark"></span>Actualizar</button>
                </div>

            </div>

        </div>
    </div>
</form>

<div class="modal_confirmar"></div>
<div class="contenMConfirmar">
    <div class="btnCerrar">X</div>
    <div class="atenecion">¡ Atencion !</div>
    <input type="hidden" name="txtObtId" id="txtObtId">
    <h3>¿En realidad deseas eliminar?</h3><br>
    <button class="btn_cancelar">Cancelar</button>
    <button class="btn_eliminar">Eliminar</button>
</div>

<!-- codigo modal para el logeo del usuario -->
<form action="#" method="post" id="login-form" class="modal">
    <h1>Inicia session</h1>
    <input type="text" name="txtusuario" id="txtusuario" Placeholder="Ingese Usuario"><br>
    <input type="password" name="txtpassword" id="txtpassword" Placeholder="•••••"><br>
    <input type="submit" class="btnaccederM" value="ACCEDER"><br>
    <div class="respuestas respLogin2"></div>
    <a href="#">¿No tienes Cuenta/ Crear Cuenta?</a>
</form>


<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/script_modals.js"></script>
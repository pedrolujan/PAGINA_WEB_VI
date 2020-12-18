<link rel="stylesheet" href="js/jquery.modal.min.css">
<link rel="stylesheet" href="http://localhost/L&M.StoreTecnology/css/estilos_modals.css">


<div class="modalActualizaPro" id="modalActualizaPro"> </div>
<form action="#" method="post" enctype="multipart/form-dat" id="formularioActPro">
    <div class="conten_ActualizaProG" id="conten_ActualizaProG">
        <div class="conten_ActualizaPro">
            <div class="btnCerrar">X</div>
            <h3 id="msg">Actualiza producto</h3>
            <div class="contenFotoAct_prod">
                <input type="hidden" name="txtimagen" id="txtimagen" value="">
                <input type="file" name="imagenActProducto" id="imagenActProducto" style="display: none;">
                <img src="" alt="" srcset="" id="acaFotoActProducto">
                <div class="btnSubeImgActPro" id="btnSubeImgActPro"><span class="icon-camera"></span></div>
            </div>
            <div class="contenCajas">
                <div class="contenInputs" id="">
                    <input type="hidden" name="capIdPro" id="capIdPro">
                    <input type="text" name="txtnombre" id="txtnobre" placeholder="Nombre del Producto" value="">
                    <textarea name="txtdescripcion" id="txtdescripcion"></textarea>
                    <input type="text" name="txtmarca" id="txtmarca" placeholder="Marca del Producto"
                        value="<?php echo $recor['marca_pro']; ?>">
                    <div class="precio-cat">
                         <input type="number" name="txtprecio" id="txtprecio">
                         <input type="number" name="txtstok" id="txtstok" placeholder="Stock">
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
<!-- modal para confimar si se desea eliminar o no -->
<div class="modal_confirmar"></div>
<div class="contenMConfirmar">
    <div class="btnCerrar">X</div>
    <div class="atenecion">¡ Atencion !</div>
    <input type="hidden" name="txtObtId" id="txtObtId">
    <h3>¿En realidad deseas eliminar?</h3><br>
    <button class="btn_cancelar">Cancelar</button>
    <button class="btn_eliminar">Eliminar</button>
</div>

<!-- codigo para ficha del producto -->
<form action="#" method="post" id="form-fichaTecnica" class="modal">
   <fieldset >
   <legend>Ficha tecnica del producto:</legend>
        <input type="hidden" name="txtidFtModal" id="txtidFtModal" placeholder="tipo"></br>
        <input type="text" name="txttipoFTM" id="txttipoFTM" placeholder="tipo"></br>
       <input type="text" name="txtmodeloFTM" id="txtmodeloFTM" placeholder="Modelo"></br>
       <input type="text" name="txttamPantallaFTM" id="txttamPantallaFTM" placeholder="Tamaño pantalla"></br>
       <input type="text" name="txttdefiniPantallaFTM" id="txttdefiniPantallaFTM" placeholder="Definicion"></br>
       <input type="text" name="txtresolucionPantFTM" id="txtresolucionPantFTM" placeholder="Resolucion pantalla"></br>
       <input type="text" name="txtpantTactilFTM" id="txtpantTactilFTM" placeholder="Pantalla Tactil?"></br>
       <input type="text" name="txtaltoFTM" id="txtaltoFTM" placeholder="Alto"></br>
       <input type="text" name="txtanchoFTM" id="txtanchoFTM" placeholder="Ancho">
    </fieldset>
    <a href="#close-modal" rel="modal:close" class="btnGuardarDescripP">
          <input type="submit" value="Guardar" class="btnGuardarFTP">
    </a>
</form>
<!-- codigo para descripcion del producto -->
<form action="#" method="post" id="form-DescripcionProducto" class="modal" enctype="multipart/form-dat">
    <div class="conten-descripProducto"> 
        <div class="contenImgDescripProducto">
            <div class="imgDescripPro contenFoto1Descrip_prod">
                <input type="hidden" name="txtimg1DescripProducto" id="txtimg1DescripProducto" value="<?php echo $imagen ?>">
                <input type="file" name="imagen1DescripProducto" id="imagen1DescripProducto" style="display: none;">
                <img src="" alt="" srcset=""  class="imgDesPro" id="acaFoto1DescripProducto">
                <div class="btnSubeImgDescrip btnSubeImg1descripPro" id="btnSubeImg1descripPro"><span class="icon-camera"></span></div>
            </div>
            <div class="imgDescripPro contenFoto2Descrip_prod">
                <input type="hidden" name="txtimg2DescripProducto" id="txtimg2DescripProducto" value="<?php echo $imagen ?>">
                <input type="file" name="imagen2DescripProducto" id="imagen2DescripProducto" style="display: none;">
                <img src="" alt="" srcset="" class="imgDesPro"  id="acaFoto2DescripProducto">
                <div class="btnSubeImgDescrip btnSubeImg2descripPro" id="btnSubeImg2descripPro"><span class="icon-camera"></span></div>
            </div>
        </div> 
        <label for="">Descripcion</label><br>
        <input type="text" name="txtidDescripProModal" id="txtidDescripProModal" style="display:none">
        <textarea name="txtdescripcion" id="TAdescripcionnn" cols="30" rows="10"></textarea><br>
        <a href="#close-modal" rel="modal:close" class="btnGuardarDescripP">
            <input type="submit" id="averr" value="Guardar" >
        </a> 
    </div>
</form>

<!-- codigo modal para el logeo del usuario -->
<form action="#" method="post" id="login-form" class="modal">
   <input type="hidden" name="" id="idDetalle">
    <img src="<?php echo $urlProyecto?>imagenes/usuarioblanco.jpg" alt="" srcset="">
    <input type="text" name="txtusuario" id="txtusuario" Placeholder="Ingese Usuario"><br>
    <input type="password" name="txtpassword" id="txtpassword" Placeholder="•••••"><br>
    <div class="exito" id="salidaSMS"></div>
    <input type="submit" class="btnaccederM" value="ACCEDER"><br>
    <a href="#">¿No tienes Cuenta/ Crear Cuenta?</a>
</form>
<!-- codigo modal consultar direccion para recojo de productos -->
<form action="#" method="post" id="localizar-form" class="modal">
    <h3>Consultar Costo</h3>
    <div class="conten-busca-direccion">
        <div class="cbdcombobox">
            <p>Selecciona tu localidad donde desees que se envíe tu producto</p>
            <select name="cbo_departamentos" id="cbo_departamentos">
                <option>Seleccione Departamento</option>
                <?php
                include("../coneccion/conexion.php");
                $user=new ApptivaDB();                
                $departamentos=$user->buscar("departamento","1");   
                foreach($departamentos as $dep):   ?>
                <option value="<?php echo $dep['id_dep'] ?>">
                <?php  echo $dep['nombre_dep'] ?>
                </option>
                <?php   endforeach;   ?>
            </select>
            <select name="cbo_provincia" id="cbo_provincia" width="113">
                <option value="0">Seleccione Provincia</option>
            </select>
            <select name="cbo_distrito" id="cbo_distrito" width="113">
                <option value="0">Seleccione Distrito</option>
            </select>
        </div>
        <div class="cbdRespCombobox">
        </div>
    </div>
</form>



<script src="http://localhost/L&M.StoreTecnology/js/jquery.modal.min.js"></script>

<script src="http://localhost/L&M.StoreTecnology/js/script_modals.js"></script><!-- 
<script src="js/jquery-3.5.1.min.js"></script> -->
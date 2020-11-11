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
    <input type="submit" value="Guardar" class="btnGuardarFTP">
</form>

<!-- codigo modal para el logeo del usuario -->
<form action="#" method="post" id="login-form" class="modal">
    <h1>Inicia session</h1>
    <input type="text" name="txtusuario" id="txtusuario" Placeholder="Ingese Usuario"><br>
    <input type="password" name="txtpassword" id="txtpassword" Placeholder="•••••"><br>
    <input type="submit" class="btnaccederM" value="ACCEDER"><br>
    <div class="respuestas respLogin2"></div>
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




<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/script_modals.js"></script>
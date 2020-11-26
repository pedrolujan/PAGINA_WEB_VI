<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Documento sin título</title>
    <link rel="stylesheet" href="css/estilos_regProducto.css" type="text/css">
</head>

<body>
    <div class="datos_usuarioEsp" onclick="desplemenulogin()">
        <?php
            if ( is_file( "imagenes/usuarios/" . $_SESSION[ 'usuarioLogeado' ] . ".jpg" ) ) {
                ?>
        <img src="imagenes/usuarios/<?php echo($_SESSION['usuarioLogeado'])?>.jpg" width="150"
            onclick="desplemenulogin()" / class="img_usuario" />
        <?php
            } else {
                ?>
        <img src="imagenes/usuarioblanco.jpg" width="150" class="img_usuario" />
        <?php }?>

        <p class="bievenido_usu"></p>
    </div>
    <ul class="celusubmenu" id="celusubmenu" onClick="desplemenulogin()">
        <li><a href="php/cambiar_contrasena">Cabiar Contraseña</a></li>
        <li><a id="btnperfil">Perfil</a></li>
        <li><a href="controller/salir.php">Salir</a></li>
    </ul>
    <!--<div class="texbienvenida">
		
          <?php
         /* include( "php/funciones.php" );
          echo "<h1 class='bieusua'>" . fnMostrarNombreUsuario( $_SESSION[ 'usuariologeado' ] ) . "</h1>";
          */?>
        </div>-->

    <!-- aca creo una vetana modal -->
    <div class="modalRegpro" id="modal"> </div>
    <form action="#" method="post" enctype="multipart/form-dat" id="formularioRegPro">
        <div class="conten_regProG">
            <div class="conten_regPro">
                <div class="btnCerrar">X</div>
                <h3 id="msg">Registra producto</h3>
                <div class="contenFoto_prod">
                    <input type="file" name="imagenProducto" id="imagenProducto" style="display: none;">
                    <img src="imagenes/fuentes/subir_imagen.gif" alt="" srcset="" id="acaFotoProducto">
                    <div class="btnSubeImgPro" id="btnSubeImgPro"><span class="icon-camera"></span></div>
                </div>
                <div class="contenCajas">
                    <div class="contenInputs" id="">
                        <input type="text" name="txtnombre" placeholder="Nombre del Producto">
                        <textarea name="txtdescripcion" id="" placeholder="Escribe aca la descripcion"></textarea>
                        <input type="text" name="txtmarca" id="" placeholder="Marca del Producto">
                        <div class="precio-cat"> <input type="number" name="txtprecio" id=""
                                placeholder="Precio del Producto">
                            <select name="cbocategoria" id="cbocategoria">
                                <option value="">Selec. categoria</option>
                                <?php
                                include("model/conexion.php");
                                $user=new ApptivaDB();                
                                echo $categorias=$user->buscarTodo("categorias");   
                                foreach($categorias as $cat):   ?>
                                <option value="<?php echo $cat['id_cat'] ?>">
                                    <?php  echo $cat['nombre_cat'] ?>
                                </option>
                                <?php   endforeach;   ?>
                            </select>
                        </div>
                        <button class="btnRegistrarPro"> Registrar</button>
                    </div>

                </div>

            </div>
        </div>
    </form>
    <script src="js/principal.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>

</body>

</html>
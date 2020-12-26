

var urlProyecto="http://localhost/L&M.StoreTecnology/";
mostrarProductos1();
mostrarMensajes();
cargar_datosUsuLogeado();
cargar_datosUsuLogeadoIndex();
mostrarProductos();
$(document).ready(function(){
    $("#TOTALCARRITO").val();
    $(".cantidadUnidades").text($("#TOTALUNIDADES").val());
})
$(document).on("click",".logoEmpresa",function(){
    document.location.href = urlProyecto+"views/Usuario.php";
})
function abrirMenu() {
    const menu = document.querySelector('.sidemenu');
    menu.classList.toggle("menu-espanded");
    menu.classList.toggle("menu-collapsed");

    document.querySelector('body').classList.toggle('body-expanded');

}
/* escript para el chat */
$(document).on("click",".abrirLogeo",function(){
    $(".aAbrirLogeo").click();
})

$(document).on("click", "#messagechat", function () {
   
    let menuchico = document.getElementById('conten_chat');
    menuchico.classList.toggle('chat-espanded');
})

/* codigo para submenu usuario */
function desplemenulogin() {
    let menuchico = document.getElementById('celusubmenu');
    menuchico.classList.toggle('celmenuchico');
}
/* cargar datos del usuario */
function    cargar_datosUsuLogeado() {
    $.ajax({
        url: '../controller/funciones.php',
        type: 'GET',
        dataType: 'json',
        success: function (resp2) {
            $('.bievenido_usu').html(resp2.datos);
            $('.img_usuario').attr("src", resp2.img);
        }
    })
}
function  cargar_datosUsuLogeadoIndex() {
    $.ajax({
        url: 'controller/funciones.php',
        type: 'GET',
        dataType: 'json',
        success: function (resp2) {
            $('.bievenido_usu').html(resp2.datos);
            $('.img_usuario').attr("src", resp2.img);
        }
    })
}
/* codigo para buscar productos */
$(document).ready(function () {
    $("#searchBuscar").keyup(function () {
        $(".contengif").html('<div class="loading"><img src="../imagenes/loader.gif" style="height: 20px; margin-left: 10px;"/></div>').show();
        var parametros = "search=" + $("#searchBuscar").val();
        $.ajax({
            data: parametros,
            url: '../controller/buscar_producto.php',
            type: 'post',
            beforeSend: function () {},
            success: function (response) {
                $(".cargarDatos").html(response);
                $(".loading").hide();
            },
            error: function () {
                alert("error")
            }
        });
    })
})
$(document).on("click",".carritoDeCompras",function(){
    alert("esta opcion No esta disponible");
})

/* codigo para el detalle del producto */

$(document).on('click', '.contenProductosDetalle', function (e) {
    e.preventDefault();
    let element = $(this)[0];
    let id = $(element).attr('capturoid');
    
    document.location.href = urlProyecto+"views/detalle_Producto.php?id=" +id ;
    /* $.ajax({
        data: {id},
        url: 'controller/detalle_producto.php',
        type: 'post',
        beforeSend: function () {},
        success: function (response) {
            $(".cargarDatos").html(response);
            $(".ftbody").load("views/descripcion_producto.php",function(){
                $("#txtidDescripPro").val(id);
                mostrarDEscripcionPro(id);
            });
            
        },
        error: function () {
            alert("error")
        }
    }); */

});
$(document).on("click","#btnLogearse",function(){    
    let element = $(this)[0];
    var id = $(element).attr('capturoid');
        $("#idDetalle").val(id);

   
});
/* codigo para mostrar todo los productos */
function mostrarProductos() {
    $.ajax({
        url: '../controller/todosProductos.php',
        type: 'GET',
        beforeSend: function () {},
        success: function (res) {
            $(".cargarDatos").html(res);
        },
        error: function () {
            /* alert("error") */
        }
    })
}
function mostrarProductos1() {
    $.ajax({
        url: 'controller/todosProductos.php',
        type: 'GET',
        beforeSend: function () {},
        success: function (res) {
            $(".cargarDatos").html(res);
        },
        error: function () {
            /* alert("error") */
        }
    })
}


/* abrir y cerrar formulario de registro de producto */
function abrirRegistro() {
    $('.modalRegpro').fadeIn(100, function () {
        $('.conten_regProG').fadeIn(0, function () {
            $('.conten_regPro').fadeIn(0,function(){
                $('.btnSubeImgUsu').fadeOut();
                
            });
        });
    });
}
function cerrarRegistro() {
    $('.conten_regPro').fadeOut(300, function () {
        $('.conten_regProG').fadeOut(0, function () {
            $('.modalRegpro').fadeOut();
            $('.btnSubeImgUsu').fadeIn();
        });
    });
}
$(document).on('click', '.btnregistraProducto', abrirRegistro);
$(document).on('click', '.modalRegpro', cerrarRegistro)
$(document).on('click', '.btnCerrar', cerrarRegistro);

/* abrir y cerrar formulario de Actualiza de producto */
function abrirRegistroA() {  
    $('#modalActualizaPro').fadeIn(300, function () {
        $('#conten_ActualizaProG').fadeIn(0, function () {
            $('.conten_ActualizaPro').fadeIn();
        });
    });
}
function cerrarRegistroA() {
    $('.conten_ActualizaPro').fadeOut(300, function () {
        $('.conten_ActualizaProG').fadeOut(0, function () {
            $('.modalActualizaPro').fadeOut();
        });
    });
}
$(document).on('click', '.btnAbreActualizaPro', abrirRegistroA);
$(document).on('click', '.btnAbreActualizaPro', function () {
    let element = $(this)[0].parentElement.parentElement.parentElement;
    let id = $(element).attr('capturoid');
    $('#acaFotoActProducto').attr("src",$('#imagenDetPro').attr("src"));
    $('#capIdPro').val(id);
    $('#txtnobre').val( $('.nombre_pro').html());
    $('#txtdescripcion').val( $('.descripcion_pro').html());
    $('#txtmarca').val( $('.marca_pro').html());
    $('#txtprecio').val( $('.precio_pro').html());
    $('#txtstok').val( $('.stok_pro').html());
    $('#txtimagen').val( $('#imagenDetPro').attr("src"));  
})
$(document).on('click', '.modalActualizaPro', cerrarRegistroA)
$(document).on('click', '.btnCerrar', cerrarRegistroA);

/* enlazo el icono de la imagen con el input filr */
$(document).on('click', '.btnSubeImgPro', function () {
    $('#imagenProducto').click();
})


/* previsualizar la imagen de producto antes de subir */
$(document).on("change", "#imagenProducto", function () {
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#formularioRegPro + img').remove();
            $('#acaFotoProducto').attr("src", e.target.result);
        };

        reader.readAsDataURL(this.files[0]);
    }
});
/* codigo para registrar productos */
$(document).ready(function () {
    $('#formularioRegPro').submit(insertardatos);
    function insertardatos(e) {
        e.preventDefault();
        var datos = new FormData($("#formularioRegPro")[0]);
        $.ajax({
            url: "../controller/registro_productos.php",
            data: datos,
            type: "POST",
            dataType: "json",
            contentType: false,
            processData: false
        }).done(function correcto(resp) {
            if (resp.error !== undefined) {
                $("#msg").html(resp.error);
                mostrarProductos();
                return false;
            }
            if (resp.exito !== undefined) {
                $("#msg").html(resp.exito);
                mostrarProductos();
                cerrarRegistro(); 
                /* setTimeout("location.href='login.php'", 1000);*/
            }
        })
    }
})

/* actualizar datos de productos */
$(document).on('click', '#btnSubeImgActPro', function () {
    $('#imagenActProducto').click();
})
/* previsualizar imagen antes de subir */
$(document).on("change", "#imagenActProducto", function () {
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#formularioRegPro + img').remove();
            $('#acaFotoActProducto').attr("src", e.target.result);
        };

        reader.readAsDataURL(this.files[0]);
    }
});


/* cargo el perfil del usuario */
$(document).on("click", "#btnperfil", function () {
    $(".cargarDatos").load("actualizar_datos.php");
})


/*enlazo el boto para cargar la foto del usuario*/
$(document).on('click', '.btnSubeImgUsu', function () {
    $('#imagenUsuario').click();
})
/* previsualizar la imagen del usuario antes de subir */
var tipoImagen;
var imagen;
$(document).on("change", "#imagenUsuario", function () {
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.form-actualizar + img').remove();
            $('.imgcargarimagen').attr("src", e.target.result);
        };
        reader.readAsDataURL(this.files[0]);
    }
    tipoImagen = ["image/jpeg", "image/png", "image/gif"];
	imagen = this.files[0].type;	
	if (tipoImagen.indexOf(imagen) != -1) {
	
    }else{
		$(".respuestas").html("suba una imagen valida").fadeIn();
	}
	setTimeout(function () {
        $(".respuestas").fadeOut(1500);
    }, 3000);
});

$(document).on("click", "#btnActualizaDU", function (e) {
    e.preventDefault();
    let element = $(this)[0].parentElement;
    let id = $(element).attr('capIdUpdate');
    let datos = new FormData($("#form_actualizarDU")[0]);
    $.ajax({
        url: "../controller/actualizar_datos.php",
        data: datos,
        type: "POST",
        dataType: "json",
        contentType: false,
        processData: false
    }).done(function correcto(r) {
        if (r.error !== undefined) {
            $(".respuestas").html(r.error).fadeIn();
            return false;
        }
        if (r.exito !== undefined) {
            $(".respuestas").html(r.exito).fadeIn();
            cargar_datosUsuLogeado();

        }
    })

    setTimeout(function () {
        $(".respuestas").fadeOut(1500);
    }, 3000);
})

/* codigo para mensajes */
$(document).on("click", ".CHFoterImg", function () {
    var mensaje = $("#txtmensaje").val();
    $.ajax({
        url: "controller/insertar_mensaje.php", 
        data: {mensaje},
        type: "POST", dataType: "json"
    }).done(function correcto(resp) {
        if (resp.error !== undefined) {
            $("#msg").html(resp.error);
            return false;
        }
        if (resp.exito !== undefined) { /* 
			$(".contenCH_body").html(resp.exito); */
            mostrarMensajes();
            /* setTimeout("location.href='login.php'", 1000); */
        }
    })
})
function mostrarMensajes() {
    $.ajax({
        url: 'controller/todosMensajes.php',
        type: 'GET',
        beforeSend: function () {},
        success: function (res) {
            $(".contenCH_body").html(res);
        },
        error: function () {
            /* alert("error") */
        }
    });
}

 $(document).on("click",".MostLaptop",function(){
    DatosFiltrados(0);
 });
 $(document).on("click",".Mostceluares",function(){
    DatosFiltrados(1)
 });
 $(document).on("click",".MostMouses",function(){
    DatosFiltrados(2);
 });
 $(document).on("click",".MostDiscos",function(){
    DatosFiltrados(3);
 });
 $(document).on("click",".MostTelevisores",function(){
    DatosFiltrados(4);
 });
 $(document).on("click",".MostTeclados",function(){
    DatosFiltrados(5);
 });
 $(document).on("click",".MostEquiposSonido",function(){
    DatosFiltrados(6);
 });
        
 
 function DatosFiltrados(dato){
     $.ajax({
         url: "../controller/todosProductos_filtrados.php", 
         data: {dato},
         type: "POST",
        }).done(function correcto(resp) {
            $(".cargarDatos").html(resp);
        })
    }
    
    

$(document).on("click",".verCompras",function(){
    $.ajax({
        url: '../controller/todosUsuarios.php',
        type: 'GET',
        beforeSend: function () {},
        success: function (res) {
            $(".cargarDatos").html(res);
        },
        error: function () {
            /* alert("error") */
        }
    })
});
$(document).on("click",".img_descripProd1",function(){    
    $("#imagenDetPro").attr("src",$(".img_descripProd1").attr("src"));
    
}) 
$(document).on("click",".img_descripProd2",function() {
    $("#imagenDetPro").attr("src",$(".img_descripProd2").attr("src"));
}) 
$(document).on("click",".img_descripProd3",function() {
    $("#imagenDetPro").attr("src",$(".img_descripProd3").attr("src"));
}) 
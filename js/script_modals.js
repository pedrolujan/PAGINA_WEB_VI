function abrirConfirElimina() {
    $('.modal_confirmar').fadeIn(100, function () {
        $('.contenMConfirmar').fadeIn(0);
    });
}
function cerrarConfirElimina() {
    $('.contenMConfirmar').fadeOut(100, function () {
        $('.modal_confirmar').fadeOut(0);
    });
}
$(document).on('click', '.btnAbreEliminarPro', function(){
    let element = $(this)[0].parentElement.parentElement.parentElement;
    let id = $(element).attr('capturoid');    
    $("#txtObtId").val(id);
    abrirConfirElimina();
  
});
$(document).on('click', '.modal_confirmar', cerrarConfirElimina)
$(document).on('click', '.btnCerrar', cerrarConfirElimina);
$(document).on('click', '.btn_cancelar', cerrarConfirElimina);

/* codigo para elimminar producto */

$(document).on('click', '.btn_eliminar', function(){
    var id=$("#txtObtId").val();
    $.ajax({
        url: 'controller/eliminar_productos.php',
        data: {id},
        type: 'post',
        dataType: 'json',
    })
    .done(function correcto(resp) {
        if(resp.exito != undefined){            
            $(".respuestas").html(resp.exito).fadeIn();
            cerrarConfirElimina();
            mostrarProductos();
        }
        if(resp.error != undefined){
            $(".respuestas").html(resp.error).fadeIn();
            cerrarConfirElimina();
        }         
    })
    .fail(function error(e){
        $(".respuestas").html("No se pudo eliminar el producto").fadeIn();
        cerrarConfirElimina();
    })
    .always( function final(){			 
    });
    setTimeout(function () {
        $(".respuestas").fadeOut(1500);
    }, 3000);
});
/* codigo para actualizar producto */
$(document).on("click",".btnActualizarPro",function(e){
    e.preventDefault();
    var datos = new FormData($("#formularioActPro")[0]);
        $.ajax({
            url: "controller/actualizar_productos.php",
            data: datos,
            type: "POST",
            dataType: "json",
            contentType: false,
            processData: false
        }).done(function correcto(resp) {
            console.log(resp);
            if (resp.error !== undefined) {
                $(".respuestas").html(resp.error).fadeIn();
                return false;
            }
            if (resp.exito !== undefined) {
                cerrarRegistroA();
                $(".respuestas").html(resp.exito).fadeIn();
                
                    let id = $("#capIdPro").val(); 
                    $.ajax({
                        data: {id},
                        url: 'controller/detalle_producto.php',
                        type: 'post',
                        beforeSend: function () {},
                        success: function (response) {
                            $(".cargarDatos").html(response);
                        },
                        error: function () {
                            alert("error")
                        }
                    });                
            }
        })
        setTimeout(function () {
            $(".respuestas").fadeOut(1500);
        }, 3000);
})



/* codigo para adicionar a carrito */



 $(document).on("click","#btnAdLogeate",function(){
   alert("myvar");
})

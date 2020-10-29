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

$(document).on("click",".btnActualizarPro",function(e){
    e.preventDefault();
    alert("actualizare");
})

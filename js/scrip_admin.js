$(document).on("click",".TodosLosProductos",function(){
    $(".cargarDatos").load("../controller/todosProductos.php");
})
$(document).on("click",".btnEliminarPro",function(){
    let element = $(this)[0].parentElement;
    let idPro = $(element).attr('capturoIdProd');
    alert(idPro);
})
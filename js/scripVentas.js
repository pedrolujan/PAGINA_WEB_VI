
alertasCarrito();
mostrarStok();
mostrarProductosEnBolsa();
$(document).ready(function(){
  let subTotal= parseFloat($("#totalCarrito").val());
  let igv=parseFloat((subTotal*0.18));
  let totalPagar=(subTotal+igv);
  $(".CostoEnvio").html(igv);
  $(".totalAPagarCarrito").html(totalPagar+".00");

})
function desplegarCarrito(){
    let abreCarrito = document.getElementById('bolsa_carrito');
    abreCarrito.classList.toggle('bolsa_carritoExpanded');
}
function  alertasCarrito() {
    $.ajax({
        url: '../controller/carritoAlertas.php',
        type: 'GET',
        dataType: 'json',
        success: function (respuesta) {            
            $('.cantidadUnidades').html(respuesta.unidades);
            $('.simpleCart_total').html("S/ "+parseFloat(respuesta.total)+".00");
        }
    })
}
function  mostrarProductosEnBolsa() {
    $.ajax({
        url: '../controller/mostarProBolsa.php',
        type: 'GET',
        success: function (resp) {             
            $(".mostrarBolsa").html(resp);
        }
    })
}

$(document).on("click",".btnDetalleCarrito",function(){/* 
    $(".itemRow").click();
    mat=JSON.stringify(matrix);
    $.ajax({
      type:'post',
       cache:false,
       url:"RegistrarCarrito.php",
      data:{jObject:  mat},
      success:function(server){
       */
        document.location.href = "detalle2Producto.php";
       /*   }
    }); */
    });
    
$(document).on("keyup","#cantidadPro",function(){
    let stok=parseInt($("#stokDisponible").val());
    let cantidad=parseInt($("#cantidadPro").val());
    
    if(cantidad>stok){
        $("#respuesta").addClass("respuestaError").text("Stock insuficiente ").show(300).delay(2000).hide(300);              
        $("#respuesta").removeClass("respuestaOk");
        $("#cantidadPro").val(1);
    }else if(cantidad<=0){
        $("#respuesta").addClass("respuestaError").text("Ingrese cantidad mayor a cero ").show(300).delay(2000).hide(300);              
        $("#respuesta").removeClass("respuestaOk");
      $("#cantidadPro").val(1);
    }
  })
  $(document).on("change","#cantidadPro",function(){
    var stok=parseInt($("#stokDisponible").val());
    let cantidad=parseInt($("#cantidadPro").val());
    
    if(cantidad>stok){
        $("#respuesta").addClass("respuestaError").text("Stock insuficiente ").show(300).delay(2000).hide(300);              
        $("#respuesta").removeClass("respuestaOk");
      $("#cantidadPro").val(1);
    }else if(cantidad<=0){
        $("#respuesta").addClass("respuestaError").text("Ingrese cantidad mayor a cero ").show(300).delay(2000).hide(300);              
        $("#respuesta").removeClass("respuestaOk");
      $("#cantidadPro").val(1);
    }
  })

$(document).on("click",".item_add",function(e){
     e.preventDefault();  
     mostrarStok(); 
     let stok=parseInt($("#stokDisponible").val());
     if(stok>=1){       
     let idPro=parseInt($("#idProducto").val());
     let imagen=$(".item_image").attr("src");
     let nombre=$(".item_name").html();
     let precio=$("#precioProducto").val();       
     let cantidad=parseInt($("#cantidadPro").val());        
     $.ajax({
         data: {idPro,stok,cantidad,precio},
         url: urlProyecto+'controller/RegistrarCarrito.php',
         type: 'post',
         beforeSend: function () {},
         success: function (response) {
             actualizaStok();
             alertasCarrito();
              mostrarProductosEnBolsa();
             $("#respuesta").addClass("respuestaOk").text("Se añadio a carrito ✔").show(300).delay(2000).hide(300);              
             $("#respuesta").removeClass("respuestaError");
             $("#cantidadPro").val(1);
         },
          error: function () {
             alert("error")
         }
       });
     }else{
         $("#respuesta").addClass("respuestaError").text("Stock insuficiente ").show(300).delay(2000).hide(300);              
         $("#respuesta").removeClass("respuestaOk");
     }
      })

function actualizaStok(){
     let stok=parseInt($("#stokDisponible").val());
    let cantidad=parseInt($("#cantidadPro").val());
    let idPro=parseInt($("#idProducto").val());
   let restaStok=(stok-cantidad);
   $.ajax({
    data: {restaStok,idPro},
    url: urlProyecto+'controller/actualizarStok.php',
    type: 'post',
    beforeSend: function () {},
    success: function (response) {
        mostrarStok(); 
    },
    error: function () {
        alert("error")
    }
  });
}

function mostrarStok(){
       let idPro=parseInt($("#idProducto").val());
    $.ajax({
        data: {idPro},
        url: urlProyecto+'controller/mostrarStok.php',
        type: 'post',
        beforeSend: function () {},
        success: function (response) {
            $("#stokDisponible").val(response)
            validaStok();
            $("#stokDisponible").click();
        },
        error: function () {
            alert("error")
        }
      });
}
function validaStok(){
    $(document).on("click","#stokDisponible",function(){
      $("#subTotalPro").val($("#stokDisponible").val());
      let stok=$("#stokDisponible").val();
      if(stok<1){
        $(".mostStokDisponible").html("No se dispone de stock");
    }else{
        $(".mostStokDisponible").html("Unidades Disponibles: "+stok);
    }
    });

}
$(document).on("click","#btnRalizarCompra",function(){
    document.location.href = "boletaDeVenta.php" ;
    
})

$(document).on("change","#cbodeDartamento",function(){
  let idDepa= $("#cbodeDartamento").val();


falta calcularrrrrrrrrrrrrrrrr





  let costoEnvio=$("#cbodeDartamento").children("#precio").attr("precio");
 $(".CostoEnvio").html(costoEnvio);
  $.ajax({
    data: {idDepa},
    url: urlProyecto+'controller/cargarCombox.php',
    type: 'post',
    beforeSend: function () {},
    success: function (response) {
       $("#cboProvincia").html(response);
    },
    error: function () {
        alert("error")
    }
  });
})

$(document).on("change","#cboProvincia",function(){
    let idProv= $("#cboProvincia").val();
    $.ajax({
      data: {idProv},
      url: urlProyecto+'controller/cargarCombox.php',
      type: 'post',
      beforeSend: function () {},
      success: function (resp) {
         $("#cboDistrito").html(resp);
      },
      error: function () {
          alert("error")
      }
    });
  })
$(document).on("click",".btnTerminarCompra",function(){
    
})

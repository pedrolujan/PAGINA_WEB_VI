import {abrirConfirElimina} from './script_modals.js';

alertasDashboardAdmin();
const toCurrency=(number,currency,lang=1)=>
Intl.NumberFormat({ style :'currency',currency},lang).format(number);
alertasCarrito();
mostrarStok();
mostrarProductosEnBolsa();
$(document).ready(function(){ 
    $("#cbodeDartamento").click();
    calcularTotalAPagar();
})
function calcularTotalAPagar(){  
    let subTotal= parseFloat($("#totalCarrito").val());      
        let costoEnvio=parseFloat($(".CostoEnvio").html());
      
        $.ajax({
            data: {subTotal,costoEnvio},
            url: urlProyecto+'controller/calcularTotalAPagar.php',
            type: 'post',
            beforeSend: function () {},
            success: function (response) {
                $(".totalAPagarCarrito").html(response);
            },
             error: function () {
                alert("error")
            }
          });
        
  
}
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
          /*   const conver=toCurrency(,'PEN'); */
            $('.simpleCart_total').html("S/ "+respuesta.total);
           
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

  /* codigo para adicionar al carrito */

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
             $("#respuesta").addClass("respuestaOk").text(response+" ✔").show(300).delay(2000).hide(300);              
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

/* codigo para borrar producto de carrito */
$(document).on("click","#btnEliminarItemCarrito",function(){
    let element = $(this)[0].parentElement;
    let idPro = $(element).attr('capturarIdPro');
    alert(idPro);
    abrirConfirElimina();
})

 /* codigo para actualiuzar stok */
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

/* codigo para mostrar stok */
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

/* funcion para validar stok */
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

/* codigo para mandar datos a la boleta */
$(document).on("click","#btnRalizarCompra",function(e){
    e.preventDefault();    
   let departamento= $('select[name="cbodeDartamento"] option:selected').text();
   let provincia= $('select[name="cboProvincia"] option:selected').text();
   let distrito= $('select[name="cboDistrito"] option:selected').text();
    
   let costoEnvio=$("#CostoEnvioBolet").val();
   let total_pagar=$(".totalAPagarCarrito").html();
    var url = 'boletaDeVenta.php';
var form = $('<form action="' + url + '" method="post">' +
     '<input type="hidden" name="CostoEnvio" value="' + costoEnvio + '" />' +
     '<input type="hidden" name="total" value="' + total_pagar + '" />' +
     '<input type="hidden" name="departamento" value="' + departamento + '" />' +
     '<input type="hidden" name="provincia" value="' + provincia + '" />' +
     '<input type="hidden" name="distrito" value="' + distrito + '" />' +
     '</form>');
$('body').append(form);
form.submit();
    
})

/* codigo para cargar combox en la ventana de ver el carrito de compras */

$(document).on("click","#cbodeDartamento",function(){
  let idDepa= $("#cbodeDartamento").val();
  let costoEnvio=$("#cbodeDartamento").children("precio").val();
 $(".CostoEnvio").html(costoEnvio);
  $.ajax({
    data: {idDepa},
    url: urlProyecto+'controller/cargarCombox.php',
    type: 'post',
    beforeSend: function () {},
    success: function (response) {
        let datos=JSON.parse(response);
        let temporal='';
        datos.forEach(element => {
            temporal +=`<option value="${element.valorCombo}">${element.combo}</option>`
            $(".CostoEnvio").html(`${element.precio}`);
            $("#CostoEnvioBolet").val(`${element.precio}`);
        });
        
        $("#cboProvincia").html(temporal);
        calcularTotalAPagar();
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
  $(document).on("change","#cboDistrito",function(){
   /*  $(".CostoEnvio").show();
    $(".totalAPagarCarrito").show(); */
  })


  
$(document).on("click",".contenCompras",function(){
    let element = $(this)[0];
    let fecha = $(element).attr('capturofecha');
    $.ajax({
        data: {fecha},
        url: urlProyecto+'controller/mostarComprasEspecificas.php',
        type: 'post',
        beforeSend: function () {},
        success: function (response) {
            $("#respuesta").addClass("respuestaOk").text("Estas son tus Compras del dia:  "+fecha).show(300).delay(4000).hide(300);              
            $("#respuesta").removeClass("respuestaError");
            $(".cargarComprasDetalle").html(response);
        },
        error: function () {
            alert("error")
        }
      });
   
      
})

$(document).on("click",".contenTodasCompras",function(){
    let element = $(this)[0];
    let fecha = $(element).attr('capturofecha');
    let idUsu = $(element).attr('capturoIDUsu');
    let nombre = $(element).attr('capturoNombre');
    $.ajax({
        data: {fecha,idUsu},
        url: urlProyecto+'controller/mostarComprasEspecificas.php',
        type: 'post',
        beforeSend: function () {},
        success: function (response) {
            $("#respuesta").addClass("respuestaOk").text("Estas son las Compras de "+nombre+" del dia:  "+fecha).show(300).delay(4000).hide(300);              
            $("#respuesta").removeClass("respuestaError");
            $(".cargarComprasDetalle").html(response);
        },
        error: function () {
            alert("error")
        }
      });
   
      
})
$(document).on("click",".btnTerminarCompra",function(){
    let departamento=$(".BVdepartamento").html();
    let provincia=$(".BVprovincia").html();
    let distrito=$(".BVdistrito").html();
    $.ajax({
        data: {departamento,provincia,distrito},
        url: urlProyecto+'controller/RegistrarCompra.php',
        type: 'post',
        beforeSend: function () {},
        success: function (response) {
              document.location.href = urlProyecto+"views/misCompras.php";
        },
        error: function () {
            alert("error")
        }
      });
  
})
$(document).on("click",".verTodoElDinero",function(){
    
})
function alertasDashboardAdmin(){
    let dato=3;
    $.ajax({
        url: '../controller/dashboardAdmin.php',
        type: 'post',
        data:{dato},
        dataType: 'json',
        success: function (respuesta) {   
            
                $("#ProductosVendidos").html(`${respuesta.unidades}`);
                $("#DineroGenerado").html(`S/ ${respuesta.total}`);           
                $("#clientesRegistrados").html(`${respuesta.totalUsuarios}`);           
                $("#productosStock").html(`${respuesta.stockProductos}`);           
        }
        
    })
}
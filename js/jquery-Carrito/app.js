
var urlProyecto="http://localhost/L&M.StoreTecnology/";
$(document).ready(function($) {
 
  /* Función jQuery para el evento clic en la etiqueta "x" con la clase (.carrito-total)*/
  $('.carrito-total').click(function() {
    //Mostrar los items del carrito
    $('.bolsa').slideToggle();
  });

});

//SIMPLE CART
//Configuraciones básicas, recuerda tu lo puedas adaptar a tu medida
simpleCart({
cartColumns: [
    { view:'image' , attr:'image', label: "Imagen"}, //obtiene la imagen
    { attr: "name", label: "Nombre"}, //obtiene el nombre
    { view: "currency", attr: "price", label: "Precio"},//obtiene el precio
    { view: "decrement", label: "-"}, //Resta el producto
    { attr: "quantity", label: "Cant"}, //obtiene la cantidad del producto
    { attr: "idpro", label: "IdProducto"}, //obtiene el id del producto
    //{ attr: "stokpro", label: "stokProducto"},  obtiene stok
    { view: "increment", label: "+"}, //Suma el producto
    { view: "currency", attr: "total", label: "SubTotal" },// Obtiene el precio total del producto
    { view: "remove", text: "Quitar", label: false} //Quita o remueve el producto
],

cartStyle: "table", //puede ser div o table

checkout: { 
    type: "PayPal" , //Pago a través de PayPal
    email: "lujanmarcelo1203@gmail.com" //tu correo válido
}

});

var matrix=Array();
$(document).on("click",".itemRow",function(){
matrix.push([
[$(this).children(".item-idpro").html()],
[$(this).children(".item-image").children("img").attr("src")],
[$(this).children(".item-name").html()],
[$(this).children(".item-quantity").html()],
[$(this).children(".item-price").html()],
/* [$(this).children(".item-stokpro").html()], */
[$(this).children(".item-total").html()]]); // Matrix

})



$(document).on("click",".simpleCart_remove",function(){
  let element = $(this)[0].parentElement.parentElement;
  let id= $(element).children(".item-idpro").html();
  alert(id);
  $.ajax({
    type:'post',
     cache:false,
     url:"borrarDatos.php",
    data:{id},
    success:function(server){
      location.reload(function(){
        $(".bolsa").css("display", "block");
      });
      
    }
  });
});
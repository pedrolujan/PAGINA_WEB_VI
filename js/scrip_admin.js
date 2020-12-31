
alertasDashboardAdmin();
/* alertas dasboard admonistrador */

function alertasDashboardAdmin(){
  let fechaIni = $("#fecha_inicio").val();
  let fechaFin = $("#fecha_final").val();
  let dato=3;
  $.ajax({
      url: '../controller/dashboardAdmin.php',
      type: 'post',
      data:{dato,fechaIni,fechaFin},
      dataType: 'json',
      success: function (respuesta) {
              $("#ProductosVendidos").html(`${respuesta.unidades}`);
              $("#preoductosVendidosHoy").html(`${respuesta.unidadeshoy}`);
              $("#DineroGenerado").html(`S/ ${respuesta.total}`);           
              $("#dineroHoy").html(`S/ ${respuesta.totalhoy}`);           
              $("#clientesRegistrados").html(`${respuesta.totalUsuarios}`);           
              $("#clientesInactivos").html(`${respuesta.totalUsuariosInactivos}`);           
              $("#productosStock").html(`${respuesta.stockProductos}`);           
              $("#productosStockInactivos").html(`${respuesta.stockProductosInac}`);           
      }
      
  })
}
$(document).on("click", ".verClientes", function () {
  mostarClientesActivos();
});
$(document).on("click", ".verClientesInactivos", function () {
  mostarClientesInactivos();
});
$(document).on("click", ".TodosLosProductos", function () {
  mostarProductosActivos();
});
$(document).on("click", ".ProductosInactivos", function () {
  mostarProductosInactivos();
});

/* codigo para abrir ventana de confirmacion en cambiar estados de productos */
$(document).on("click", ".btnEliminarPro", function () {
  let element = $(this)[0].parentElement;
  let idPro = $(element).attr("capturoIdProd");
  $("#txtObtId").val(idPro);
  $("#txtTipoCon").val("producto");
  abrirConfirElimina();
});
$(document).on("click", ".btnEliminarUsuario", function () {
  let element = $(this)[0].parentElement;
  let idUsu = $(element).attr("capturoIdUsu");
  $("#txtObtId").val(idUsu);
  $("#txtTipoCon").val("usuario");
  abrirConfirElimina();
});
/* codigo para elimminar desactivar usuario y productos */
$(document).on("click", "#btn_CambiarEstado", function (e) {
  e.preventDefault();
  var id = $("#txtObtId").val();
  var tipoCon = $("#txtTipoCon").val();
  $.ajax({
    url: "../controller/eliminar_productos.php",
    data: { id,tipoCon},
    type: "post",
    dataType: "json",
  })
    .done(function correcto(resp) {
      if (resp.exito != undefined && resp.activarPro!=undefined) {
        mostarProductosInactivos();
        cerrarConfirElimina();
        alertasDashboardAdmin();
      }else if(resp.exito != undefined && resp.desActivarPro!=undefined){
        mostarProductosActivos();
        cerrarConfirElimina();
        alertasDashboardAdmin();
      }
      if (resp.exito != undefined && resp.activarUsu!=undefined) {
        mostarClientesInactivos();
        cerrarConfirElimina();
        alertasDashboardAdmin();
      }else if(resp.exito != undefined && resp.desActivarUsu!=undefined){
        mostarClientesActivos();
        cerrarConfirElimina();
        alertasDashboardAdmin();
      }

      if (resp.error != undefined) {
        $(".respuestas").html(resp.error).fadeIn();
        cerrarConfirElimina();
      }
    })
    .fail(function error(e) {
      cerrarConfirElimina();
    });
});


function abrirConfirElimina() {
  $(".modal_confirmar").fadeIn(100, function () {
    $(".contenMConfirmar").fadeIn(0);
  });
}
function cerrarConfirElimina() {
  $(".contenMConfirmar").fadeOut(100, function () {
    $(".modal_confirmar").fadeOut(0);
  });
}
$(document).on("click", ".modal_confirmar", cerrarConfirElimina);
$(document).on("click", ".btnCerrar", cerrarConfirElimina);
$(document).on("click", ".btn_cancelar", cerrarConfirElimina);

/* $(document).ready(function(){
    $(".cargarDatos").load("graficos.php");
       
}) */
$(document).on("click", ".imagenProductoAdmin", function () {
  let element = $(this)[0].parentElement.parentElement.parentElement;
  let idPro = $(element).attr("capturoIdProd");
  document.location.href =
    urlProyecto + "views/detalle_Producto.php?id=" + idPro;
});

function mostarClientesActivos() {
  $.ajax({
    url: "../controller/todosUsuariosActivos.php",
    type: "GET",
    beforeSend: function () {},
    success: function (res) {
      $(".cargarDatos").html(res);
    },
    error: function () {
      /* alert("error") */
    },
  });
}
function mostarClientesInactivos() {
  $.ajax({
    url: "../controller/todosUsuariosInActivos.php",
    type: "GET",
    beforeSend: function () {},
    success: function (res) {
      $(".cargarDatos").html(res);
    },
    error: function () {
      /* alert("error") */
    },
  });
}

function mostarProductosActivos(){
  $.ajax({
    url: "../controller/todosProductos.php",
    type: "GET",
    beforeSend: function () {},
    success: function (res) {
      $(".cargarDatos").html(res);
    },
    error: function () {
      /* alert("error") */
    },
  });
}
function mostarProductosInactivos(){
  $.ajax({
    url: "../controller/todosProductos_Inactivos.php",
    type: "GET",
    beforeSend: function () {},
    success: function (res) {
      $(".cargarDatos").html(res);
    },
    error: function () {
      /* alert("error") */
    },
  });
}

/* codigo de las cajas del dashboarda */

$(document).on("click", ".ECProdVendidos", function () {
  $("#txtItemABuscar").val("productosVendidos");
  cargarDatos_ParaGrafica();
  caragar_Ventas_segun_fechas();
  /* mostrarGraficasEspecificas(tipoDeBusqueda) */
});

$(document).on("click", ".ECantUsuarios", function () {
  $("#txtItemABuscar").val("clientes");
  cargarDatos_ParaGrafica();
  mostarClientesActivos();
});
$(document).on("click", ".ECantProdStok", function () {
  $("#txtItemABuscar").val("productosStok");
  cargarDatos_ParaGrafica();
  $(".cargarDatos").load("../controller/todosProductos.php");

  /* $(".cargarDatos").load("../controller/todosProductos.php"); */
});

/* codigo para cargar las compras por el items del sidemenu */
$(document).on("click",".verCompras",function(){
  caragar_Ventas_segun_fechas();

});
$(document).on("click", ".contenCompras", function () {
    let IdUsuario=$(this).attr("capturoIdUsu");
    let fechaCompra=$(this).attr("capturofecha");
    $.ajax({
        url: "../controller/devolver_ventasPor_fehas.php",
        type: "post",
        data: {IdUsuario, fechaCompra},
      }).done(function (resp) {
        $(".cargarDatos").html(resp);
      });
   
});







/* codigo para los graficos del dashboarda del administrador */

Graficopie();
function Graficopie() {
  $.ajax({
    url: "controlador_grafico.php",
    type: "post",
  }).done(function (resp) {
    if (resp.length > 0) {
      let titulo = [];
      let cantidad = [];
      let colores = [];
      let datos = JSON.parse(resp);
      let item = "";
      datos.forEach((element) => {
        titulo.push(element["marca_pro"]);
        cantidad.push(element["stok_pro"]);
        colores.push(colorRGB());
      });
      crear_graficos(
        titulo,
        cantidad,
        colores,
        "bar",
        "grafico por año",
        "GraficoFiltrado"
      );
      crear_graficosCircular(
        titulo,
        cantidad,
        colores,
        "pie",
        "grafico de barras normal",
        "graficopie"
      );
    }
  });
}

/* genero numero para colores */
function generarNumero(numero) {
  return (Math.random() * numero).toFixed(0);
}
/* genero colores aleatorias */
function colorRGB() {
  let coolor ="("+generarNumero(255) +"," +
    generarNumero(255) +","+generarNumero(255) +")";
  return "rgb" + coolor;
}

/* jalo los graficos cuando inicia el programa co cuando damos click */
cargarDatos_ParaGrafica();
$(document).on("click", "#btnBuscarEstadistica", function () {
  cargarDatos_ParaGrafica();
  caragar_Ventas_segun_fechas();
  alertasDashboardAdmin();
});

/* filtro por las fechas */
function cargarDatos_ParaGrafica() {
  let itemDashboard = $("#txtItemABuscar").val();
  let fechaIni = $("#fecha_inicio").val();
  let fechaFin = $("#fecha_final").val();
  $.ajax({
    url: "controlador_grafico_parametro.php",
    type: "post",
    data: { fechaIni, fechaFin, itemDashboard },
  }).done(function (resp) {
    if (resp.length > 0) {

      let titulo = [];
      let cantidad = [];
      let colores = [];
      let tipoGrafica = "";
      let datos = JSON.parse(resp);

      datos.forEach((element) => {

        titulo.push(`${element.fecha}`);
        cantidad.push(`${element.cantidad}`);
        colores.push(colorRGB());
        tipoGrafica = `${element.tipoGrafica}`;
      });

      myChart.destroy();
      myChartCircular.destroy();

      crear_graficos(titulo,cantidad,colores,"bar",tipoGrafica,"GraficoFiltrado");
      crear_graficosCircular(titulo,cantidad,colores,"pie",tipoGrafica,  "graficopie"
      );
    }
  });
}

///////////////////////////Genero los graficos///////////////////////
var myChart;
var myChartCircular;

function crear_graficos(titulo, cantidad, colores, tipo, encabezado, id) {
  var idCanva = document.getElementById(id);
  myChart = new Chart(idCanva, {
    type: tipo,
    data: {
      labels: titulo,
      datasets: [
        {
          label: encabezado,
          data: cantidad,
          backgroundColor: colores,
          borderColor: colores,
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
            },
          },
        ],
      },
    },
  });
}
function crear_graficosCircular(titulo,cantidad,colores,tipo,encabezado,id) {
  var idCanva = document.getElementById(id);
  myChartCircular = new Chart(idCanva, {
    type: tipo,
    data: {
      labels: titulo,
      datasets: [
        {
          label: encabezado,
          data: cantidad,
          backgroundColor: colores,
          borderColor: colores,
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
            },
          },
        ],
      },
    },
  });
}

function caragar_Ventas_segun_fechas() {
  let itemDashboard = $("#txtItemABuscar").val();
  let fechaIni = $("#fecha_inicio").val();
  let fechaFin = $("#fecha_final").val();
  $.ajax({
    url: "../controller/devolver_ventasPor_fehas.php",
    type: "post",
    data: { fechaIni, fechaFin, itemDashboard },
  }).done(function (resp) {
     $(".cargarDatos").html(resp);
  });
}

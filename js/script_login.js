$("input").focusin(function () {
  $(this).parent("div").addClass("border-input");
});

$("input").focusout(function () {
  $(this).parent("div").removeClass("border-input");
});

/* codigo para cargar combobox */

$(document).ready(function () {
  $("#cbo_pais").change(function () {
    let id = $("#cbo_pais").val();
    $.ajax({
      data: { id },
      url: "controller/llenar_provincias.php",
      type: "post",
      beforeSend: function () {},
      success: function (response) {
        $("#cbo_provincia").html(response);
      },
      error: function () {
        alert("error");
      },
    });
  });
});
/* codigo para registro de usuario */
$(document).ready(function () {
  $("#btnRegistrar").click(function (evt) {
    evt.preventDefault();
    $("#container")
      .html(
        '<div class="loading"><img src="../imagenes/loader.gif"/><br/>Un momento, por favor...</div>'
      )
      .show();
    $(".mensajeerror").hide();
    $(".mensajeok").hide();
    var datos = {
      nombre: $("#txtnombre").val(),
      apellido: $("#txtapellido").val(),
      dni: $("#txtdni").val(),
      telefono: $("#txttelefono").val(),
      pais: $("#cbo_pais").val(),
      provincia: $("#cbo_provincia").val(),
      correo: $("#txtcorreo").val(),
      usuario: $("#txtusuario").val(),
      clave: $("#txtclave").val(),
      repclave: $("#txtconfclave").val(),
    };

    $.ajax({
      data: datos,
      url: "../controller/registro_usuario.php",
      type: "post",
      dataType: "json",
      async: true,
    })
      .done(function correcto(resp) {
        if (resp.error !== undefined) {
          $(".mensajeerror").fadeIn(100).text(resp.error).show();
          $(".mensajeok").text(resp.exito).hide();
          $("#container").hide();
          return false;
        }
        if (resp.exito !== undefined) {
          $(".mensajeok").fadeIn(100).text(resp.exito).show();
          $(".mensajeerror").text(resp.error).hide();
          $("#container").hide();
          $("#txtnombre").val("");
          $("#txtapellido").val("");
          $("#txtdni").val("");
          $("#txttelefono").val("");
          $("#cbo_pais").val("Seleccione Pais");
          $("#cbo_provincia").val("Seleccione Ciudad");
          $("#txtcorreo").val("");
          $("#txtusuario").val("");
          $("#txtclave").val("");
          $("#txtconfclave").val("");
          setTimeout("location.href='login.php'", 1000);
        }
      })
      .fail(function error(e) {})
      .always(function final() {});
  });
});
var cont=0;
/* codigo para logeo */
$(document).ready(function () {
  $("#btnacceder").click(function (evt) {
    evt.preventDefault();
    $("#container")
      .html(
        '<div class="loading"><img src="../imagenes/loader.gif"/><br/>Un momento, por favor...</div>')
      .show();
    $("#msgexito").hide();
    $("#msgerror").hide();
    var usuario = $("input[name='usuario']").val();
    var clave = $("input[name='clave']").val();
    
    $.ajax({
      data: { usuario, clave },
      url: "../controller/validar_acceso.php",
      type: "post",
      dataType: "json",
      async: true,
    }).done(function correcto(resp) {
      if (resp.error !== undefined) {
        $("#msgerror").fadeIn(100).text(resp.error).show();
        $("#container").hide();
        $("#msgexito").text(resp.exito).hide();
        cont=cont+1;
        if(cont>=3){
          $("#msgerror").html("intentelo en un minuto");
          $("#btnacceder").fadeOut();
       
        }
        
      console.log(cont);
        return false;
      }
      if (resp.exito !== undefined) {
        $("#container").hide();
        $("#msgexito").fadeIn(100).text(resp.exito).show();
        $("#msgerror").fadeIn(100).text(resp.error).hide();
        setTimeout("location.href='../index.php'", 1000);
      }
    });
  });
});
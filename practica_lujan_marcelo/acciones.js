
  /* codigo para cilindro */
  $(document).ready(function () {
	$("#btncilindro").click(function (evt) {
	  evt.preventDefault();
	  var datos = {
		altura: $("#txtaltura").val(),
		radio: $("#txtradio").val(),
	  };
  
	  $.ajax({
		data: datos,
		url: "php/volumenCilindro.php",
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
			$(".mensaje").text("La respuesta es: "+resp.exito);
			
		  }
		})
		.fail(function error(e) {})
		.always(function final() {});
	});
  });
  
  
  /* codigo para precios*/
  $(document).ready(function () {
	$("#btnprecio").click(function (evt) {
	  evt.preventDefault();
	  var datos = {
		precio1: $("#txtprecio1").val(),
		precio2: $("#txtprecio2").val(),
		precio3: $("#txtprecio3").val(),
	  };
  
	  $.ajax({
		data: datos,
		url: "php/promediPrecio.php",
		type: "post",
		dataType: "json",
		async: true,
	  })
		.done(function correcto(respu) {
		  if (respu.error !== undefined) {
			$(".mensajeerror").fadeIn(100).text(resp.error).show();
			$(".mensajeok").text(resp.exito).hide();
			$("#container").hide();
			return false;
		  }
		  if (respu.ok !== undefined) {
			$(".mensaje").text("El promedi es : "+respu.ok);
			
		  }
		})
		.fail(function error(e) {})
		.always(function final() {});
	});
  });

  
  /* codigo para cilindro */
  $(document).ready(function () {
	$("#btnpsueldo").click(function (evt) {
	  evt.preventDefault();
	  var datos = {
		horas: $("#txthoras").val(),
		salario: $("#txtsalario").val(),
	  };
  
	  $.ajax({
		data: datos,
		url: "php/salario.php",
		type: "post",
		async: true,
	  })
		.done(function correcto(resp) {
		  
			$(".mensaje").html("La respuesta es: "+resp);
			
		  
		})
		.fail(function error(e) {})
		.always(function final() {});
	});
  });
  
const inputs = document.querySelectorAll('#celular');
const longitud = document.querySelectorAll('#descripcion');

const expresiones = {
	
	celular: /^\d[9|7|1][0-9]{8}$/ // 7 a 14 numeros.
}
const campos = {
	
	celular: false
}
const validarFormulario = (e) => {
	switch (e.target.name) {
		case "celular":
			validarCampo(expresiones.celular, e.target, 'celular');
		
	}
}
const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}
inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

$(".guardar_denuncia").click(function(){
	palabras= document.getElementById("descripcion").value;
	texto_dividido = palabras.split(" ");
	numero_palabras = texto_dividido.length;
	if($(".descripcion").val() != "" && $(".observacion").val() != "" && $(".usuario_id").val() != ""  &&  $(".id_estado").val() != "" &&  $(".id_tipo_maltrato").val() != ""){

		
	   				var datosMultimedia = new FormData();
	   			
	   				datosMultimedia.append("descripcion", $(".descripcion").val());
					datosMultimedia.append("celular", $(".celular").val());
					datosMultimedia.append("latitud", $(".latitud").val());
					datosMultimedia.append("longitud", $(".longitud").val());
					datosMultimedia.append("usuario_id", $(".usuario_id").val());
					
					datosMultimedia.append("estados", $(".estados").val());
					datosMultimedia.append("id_tipo_maltrato", $(".id_tipo_maltrato").val());
					
					if (campos.celular==true) {
					if (numero_palabras<=70){
					
					$.ajax({
						url:"subida_reporte.php",
						method: "POST",
						data: datosMultimedia,
						cache: false,
						contentType: false,
						processData: false,
						beforeSend: function() {
						    $('.guardar_denuncia').html("Enviando ...");
						    swal({
						  type: "success",
						  title: "El reporte ha sido enviado",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							$('.guardar_denuncia').html("Guardar producto");
							window.location = "lista_denuncias.php";
						}

							})

						 },
					
					})

	   			}

else{
	swal({
	      title: "La descripcion solo acepta hasta 70 palabras",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });
	   	}
	   	}
	   	else{
	   	swal({
	      title: "El celular ingresado no es valido ",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });	
	   	}	
}

	else{
		

		swal({
	      title: "Rellenar todos los campos",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

		return;
	}


})

	/*=============================================
AGREGAR MULTIMEDIA CON DROPZONE
=============================================*/

var arrayFiles = [];

$(".multimediaFisica").dropzone({

	url: "/",
	addRemoveLinks: true,
	acceptedFiles: "image/jpeg, image/png",
	maxFilesize: 2, //2mb
	maxFiles: 10, 	//maximo 10 archivos
	init: function(){

		this.on("addedfile", function(file){

			arrayFiles.push(file);

			// console.log("arrayFiles", arrayFiles);

		})

		this.on("removedfile", function(file){

			var index = arrayFiles.indexOf(file);

			arrayFiles.splice(index, 1);

			// console.log("arrayFiles", arrayFiles);

		})

	}

})


/*=============================================
GUARDAR EL PRODUCTO
=============================================*/

var multimediaFisica = null;



$(".cargar_evidencia").click(function(){

	/*=============================================
	PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
	=============================================*/

	if($(".id_denuncia").val() != "" && arrayFiles != "" ){

		/*=============================================
	   	PREGUNTAMOS SI VIENEN IMÁGENES PARA MULTIMEDIA O LINK DE YOUTUBE
	   	=============================================*/

	   		if(arrayFiles.length > 0 ){

	   			var listaMultimedia = [];
	   			var finalFor = 0;

	   			for(var i = 0; i < arrayFiles.length; i++){

	   				var datosMultimedia = new FormData();
	   				datosMultimedia.append("file", arrayFiles[i]);
	   				
					$.ajax({
						url:"productos.ajax.php",
						method: "POST",
						data: datosMultimedia,
						cache: false,
						contentType: false,
						processData: false,
						beforeSend: function() {
						    $('.cargar_evidencia').html("Enviando ...");
						    swal({
						  type: "success",
						  title: "La evidencia ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							$('.cargar_evidencia').html("evidencia cargada");
							window.location = "lista_denuncias.php";
						}

							})

						 },
						success: function(respuesta){
							
							listaMultimedia.push({"foto" : respuesta})
							multimediaFisica = JSON.stringify(listaMultimedia);
							

							if((finalFor + 1) == arrayFiles.length){

								agregarMiProducto(multimediaFisica); 
								finalFor = 0; 

							}

							finalFor++;
							
							$('.cargar_evidencia').html("evidencia cargada");
							
							
							
						}

					})

	   			}


	   		}

	   		

	}else{
		swal({
	      title: "Rellenar todos los campos",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

		return;
	}


})


function agregarMiProducto(imagen){

		/*=============================================
		ALMACENAMOS TODOS LOS CAMPOS DE PRODUCTO
		=============================================*/
		
		var id_denuncia = $(".id_denuncia").val();


	 	var datosProducto = new FormData();
	 	datosProducto.append("id_denuncia", id_denuncia);
		datosProducto.append("multimedia", imagen);
		$.ajax({
				url:"productos.ajaxSubida.php",
				method: "POST",
				data: datosProducto,
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function() {
				    $('.cargar_evidencia').html("Enviando ...");
				 },
				success: function(respuesta){
						
					 //console.log("respuesta", respuesta);

					if(respuesta == "ok"){

						swal2({
						  type: "success",
						  title: "El producto ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							$('.cargar_evidencia').html("evidencia cargada");
							window.location = "lista_denuncias";

							}

						})
					}else if(respuesta == "error"){
						swal({
						  type: "error",
						  title: "¡Ocurrio un error!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
						  $('.cargar_evidencia').html("evidencia cargada");	
							
						})
					}

				}

		})


}
var foto;
$(document).on("click", ".mostrar", function(){
foto = $(this).closest("tr");
imagen=foto.find('td:eq(0)').text();

$("#id_denuncia").val(imagen);
$("#exampleModal").modal("show");

});
var foto;
$(document).on("click", ".mostrar2", function(){
foto = $(this).closest("tr");
imagen=foto.find('td:eq(0)').text();

$("#id_denuncia2").val(imagen);
$("#exampleModal2").modal("show");

});
var foto;
$(document).on("click", ".mostrar3", function(){
foto = $(this).closest("tr");
imagen=foto.find('td:eq(0)').text();

$("#id_denuncia3").val(imagen);
$("#exampleModal3").modal("show");

});




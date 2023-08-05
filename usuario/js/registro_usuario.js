const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	usuario_cod: /^[a-zA-Z0-9\_\-]{7,10}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	apellido: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	clave: /^.{8,12}$/ // 4 a 12 digitos.
	
	
}

const campos = {
	usuario_cod: false,
	nombre: false,
	apellido: false,
	correo: false,
	clave: false
	
	
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "usuario_cod":
			validarCampo(expresiones.usuario_cod, e.target, 'usuario_cod');
		break;
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
		case "apellido":
			validarCampo(expresiones.apellido, e.target, 'apellido');
		break;
		case "clave":
			validarCampo(expresiones.clave, e.target, 'clave');
			validarPassword2();
		break;
		case "clavev":
			validarPassword2();
		break;
		case "correo":
			validarCampo(expresiones.correo, e.target, 'correo');
		break;
		
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

const validarPassword2 = () => {
	const inputPassword1 = document.getElementById('clave');
	const inputPassword2 = document.getElementById('clavev');

	if(inputPassword1.value !== inputPassword2.value){
		document.getElementById(`grupo__clavev`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__clavev`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__clavev i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__clavev i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__clavev .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['clave'] = false;
	} else {
		document.getElementById(`grupo__clavev`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__clavev`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__clavev i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__clavev i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__clavev .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['clave'] = true;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
	e.preventDefault();

	const terminos = document.getElementById('terminos');
	if(campos.usuario_cod && campos.nombre && campos.apellido && campos.correo  && campos.clave){
		formulario.submit();

		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 5000);

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});

	} else {
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	}
});
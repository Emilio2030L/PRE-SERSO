const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	nombreUnidad: /^[a-zA-ZÀ-ÿ\s]{1,50}$/, // Letras y espacios, pueden llevar acentos.
	domicilioUni: /\w$/,
	telefonoUni:  /^\d{7,10}$/ // 7 a 10 numeros.
}

const campos = {
	nombreUnidad: false,
	domicilioUni: false,
	telefonoUni: false,
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "nombreUnidad":
			validarCampo(expresiones.nombreUnidad, e.target, 'nombreUnidad');
		break;
		case "domicilioUni":
			validarCampo(expresiones.domicilioUni, e.target, 'domicilioUni');
		break;
		case "telefonoUni":
			validarCampo(expresiones.telefonoUni, e.target, 'telefonoUni');
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

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

function regUnidad(){

	formulario.addEventListener('submit', (e) => {
		e.preventDefault();
		if(campos.nombreUnidad && campos.domicilioUni && campos.telefonoUni){
			var nombreUnidad = $('#nombreUnidad').val();
			var domicilioUni = $('#domicilioUni').val();
			var telefonoUni = $('#telefonoUni').val();
			var giroEmpresarial = $('#giroEmpresarial').val();
			var numTrabajadores = $('#numTrabajadores').val();
			$.post('../control/agregarUnidad.php',{nombreUnidad:nombreUnidad, domicilioUni:domicilioUni,
			 telefonoUni:telefonoUni, giroEmpresarial:giroEmpresarial, numTrabajadores:numTrabajadores})

			formulario.reset();

			document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
			setTimeout(() => {
				document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
			}, 5000);

			document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
				icono.classList.remove('formulario__grupo-correcto');
			});
			document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
		} else {
			document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
			setTimeout(() => {
				document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
			}, 5000);
		}
	});	
}

function actUnidad(){

	formulario.addEventListener('submit', (e) => {
		e.preventDefault();
		if(campos.nombreUnidad && campos.domicilioUni && campos.telefonoUni){
			var idUnidad = $('#idUnidad').val();
			var nombreUnidad = $('#nombreUnidad').val();
			var domicilioUni = $('#domicilioUni').val();
			var telefonoUni = $('#telefonoUni').val();
			var giroEmpresarial = $('#giroEmpresarial').val();
			var numTrabajadores = $('#numTrabajadores').val();
			$.post('../control/cambiarUnidad.php',{idUnidad:idUnidad, nombreUnidad:nombreUnidad, domicilioUni:domicilioUni,
			 telefonoUni:telefonoUni, giroEmpresarial:giroEmpresarial, numTrabajadores:numTrabajadores})

			formulario.reset();

			document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
			setTimeout(() => {
				document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
			}, 5000);

			document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
				icono.classList.remove('formulario__grupo-correcto');
			});
			document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
		} else {
			document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
			setTimeout(() => {
				document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
			}, 5000);
		}
	});	
}
const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	nombreProfesor: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	apellidoPaterno: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	apellidoMmaterno: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	fechaNacProfesor: /\w$/,
}

const campos = {
	nombreProfesor: false,
	apellidoPaterno: false,
	apellidoMmaterno: false,
	fechaNacProfesor: false,
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "nombreProfesor":
			validarCampo(expresiones.nombreProfesor, e.target, 'nombreProfesor');
		break;
		case "apellidoPaterno":
			validarCampo(expresiones.apellidoPaterno, e.target, 'apellidoPaterno');
		break;
		case "apellidoMmaterno":
			validarCampo(expresiones.apellidoMmaterno, e.target, 'apellidoMmaterno');
		break;
		case "fechaNacProfesor":
			validarCampo(expresiones.fechaNacProfesor, e.target, 'fechaNacProfesor');
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

function reg(){

	formulario.addEventListener('submit', (e) => {
		e.preventDefault();
		if(campos.nombreProfesor && campos.apellidoPaterno && campos.apellidoMmaterno && campos.fechaNacProfesor){
			var nombreProfesor = $('#nombreProfesor').val();
			var apellidoPaterno = $('#apellidoPaterno').val();
			var apellidoMmaterno = $('#apellidoMmaterno').val();
			var generoProfesor = $('#generoProfesor').val();
			var puestoProfesor = $('#puestoProfesor').val();
			var fechaNacProfesor = $('#fechaNacProfesor').val();
			var idUnidad = $('#idUnidad').val();
			$.post('../control/agregarDocente.php',{nombreProfesor:nombreProfesor, apellidoPaterno:apellidoPaterno, apellidoMmaterno:apellidoMmaterno, generoProfesor:generoProfesor, 
				puestoProfesor:puestoProfesor, fechaNacProfesor:fechaNacProfesor, idUnidad:idUnidad})

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

function actProfe(){

	formulario.addEventListener('submit', (e) => {
		e.preventDefault();
		if(campos.nombreProfesor && campos.apellidoPaterno && campos.apellidoMmaterno && campos.fechaNacProfesor){
			var matriculaProfesor = $('#matriculaProfesor').val();
			var nombreProfesor = $('#nombreProfesor').val();
			var apellidoPaterno = $('#apellidoPaterno').val();
			var apellidoMmaterno = $('#apellidoMmaterno').val();
			var generoProfesor = $('#generoProfesor').val();
			var puestoProfesor = $('#puestoProfesor').val();
			var fechaNacProfesor = $('#fechaNacProfesor').val();
			var idUnidad = $('#idUnidad').val();
			$.post('../control/cambiarProfesor.php',{matriculaProfesor:matriculaProfesor, nombreProfesor:nombreProfesor, apellidoPaterno:apellidoPaterno, apellidoMmaterno:apellidoMmaterno, generoProfesor:generoProfesor, 
				puestoProfesor:puestoProfesor, fechaNacProfesor:fechaNacProfesor, idUnidad:idUnidad})

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
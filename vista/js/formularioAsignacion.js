const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	actividadRealizar: /^[a-zA-ZÀ-ÿ\s]{10,50}$/, // Letras y espacios, pueden llevar acentos.
	fecha: /\w$/,
}

const campos = {
	actividadRealizar: false,
	apellidoPaterno: false,
	apellidoMaterno: false,
	fecha: false,
	fechaFin: false,
	telefonoAlumno: false,

}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "actividadRealizar":
			validarCampo(expresiones.actividadRealizar, e.target, 'actividadRealizar');
		break;
		case "apellidoPaterno":
			validarCampo(expresiones.apellidoPaterno, e.target, 'apellidoPaterno');
		break;
		case "apellidoMaterno":
			validarCampo(expresiones.apellidoMaterno, e.target, 'apellidoMaterno');
		break;
		case "fecha":
			validarCampo(expresiones.fecha, e.target, 'fecha');
		break;
		case "fechaFin":
			validarCampo(expresiones.fechaFin, e.target, 'fechaFin');
		break;
		case "telefonoAlumno":
			validarCampo(expresiones.telefonoAlumno, e.target, 'telefonoAlumno');
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

function regAsig(){

	formulario.addEventListener('submit', (e) => {
		e.preventDefault();
		if(campos.actividadRealizar && campos.fecha){
			var actividadRealizar = $('#actividadRealizar').val();
			var fecha = $('#fecha').val();
			var idAlta = $('#idAlta').val();

			$.post('../control/agregarActividad.php',{actividadRealizar:actividadRealizar, fecha:fecha, idAlta:idAlta})

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
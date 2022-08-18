const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	nombreAlumno: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	apellidoPpaterno: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	apellidoMaterno: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	fechaInicio: /\w$/, //todo tipo de dato
	fechaFin: /\w$/,
	telefonoAlumno:  /^\d{7,10}$/, // 7 a 10 numeros.
	generacion: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo,
}
/*Todos los campos del formulario deben estar falsos para posteriormente evaluar 
que no estan vacios y poder registrar*/
const campos = {
	nombreAlumno: false,
	apellidoPpaterno: false,
	apellidoMaterno: false,
	fechaInicio: false,
	fechaFin: false,
	telefonoAlumno: false,
	generacion: false,
}
/*Validamos el campo con la información insertada del usuario y comparamos con 
las expresiones regulares*/
const validarFormulario = (e) => {
	switch (e.target.name) {
		case "nombreAlumno":
			validarCampo(expresiones.nombreAlumno, e.target, 'nombreAlumno');
		break;
		case "apellidoPpaterno":
			validarCampo(expresiones.apellidoPpaterno, e.target, 'apellidoPpaterno');
		break;
		case "apellidoMaterno":
			validarCampo(expresiones.apellidoMaterno, e.target, 'apellidoMaterno');
		break;
		case "fechaInicio":
			validarCampo(expresiones.fechaInicio, e.target, 'fechaInicio');
		break;
		case "fechaFin":
			validarCampo(expresiones.fechaFin, e.target, 'fechaFin');
		break;
		case "telefonoAlumno":
			validarCampo(expresiones.telefonoAlumno, e.target, 'telefonoAlumno');
		break; 
		case "generacion":
			validarCampo(expresiones.generacion, e.target, 'generacion');
		break; 
	}
}
/* Validación de los campos y estilos */
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
/* funcion para el registro del alumno aqui primero validamos que todos tengan información
para posteriormente mandarlos por el metodo post a la ruta donde se enviara a guardar
a la base de datos */
function regAlumno(){

	formulario.addEventListener('submit', (e) => {
		e.preventDefault();
		if(campos.nombreAlumno && campos.apellidoPpaterno && campos.generacion &&
			campos.apellidoMaterno && campos.fechaInicio && campos.fechaFin && campos.telefonoAlumno){
			var nombreAlumno = $('#nombreAlumno').val();
			var apellidoPpaterno = $('#apellidoPpaterno').val();
			var apellidoMaterno = $('#apellidoMaterno').val();
			var fechaInicio = $('#fechaInicio').val();
			var fechaFin = $('#fechaFin').val();
			var telefonoAlumno = $('#telefonoAlumno').val();
			var genero = $('#genero').val();
			var proceso = $('#proceso').val();
			var idPrograma = $('#idPrograma').val();
			var cuatrimestre = $('#cuatrimestre').val();
			var grupo = $('#grupo').val();
			var generacion = $('#generacion').val();
			var matriculaProfesor = $('#matriculaProfesor').val();

			$.post('../control/agregarAlumno.php',{nombreAlumno:nombreAlumno, apellidoPpaterno:apellidoPpaterno,
			 apellidoMaterno:apellidoMaterno, fechaInicio:fechaInicio, fechaFin:fechaFin, 
			 telefonoAlumno:telefonoAlumno, genero:genero, proceso:proceso, idPrograma:idPrograma,
			 cuatrimestre:cuatrimestre, grupo:grupo, generacion:generacion, matriculaProfesor:matriculaProfesor})

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
/* funcion para el registro del alumno aqui primero validamos que todos tengan información
para posteriormente mandarlos por el metodo post a la ruta donde se enviara a modificar
a la base de datos */
function actAlumno(){

	formulario.addEventListener('submit', (e) => {
		e.preventDefault();
		if(campos.nombreAlumno && campos.apellidoPpaterno && campos.generacion &&
			campos.apellidoMaterno && campos.fechaInicio && campos.fechaFin && 
			campos.telefonoAlumno){
			
			var matriculaAlumno = $('#matriculaAlumno').val();
			var nombreAlumno = $('#nombreAlumno').val();
			var apellidoPpaterno = $('#apellidoPpaterno').val();
			var apellidoMaterno = $('#apellidoMaterno').val();
			var fechaInicio = $('#fechaInicio').val();
			var fechaFin = $('#fechaFin').val();
			var telefonoAlumno = $('#telefonoAlumno').val();
			var genero = $('#genero').val();
			var proceso = $('#proceso').val();
			var idPrograma = $('#idPrograma').val();
			var cuatrimestre = $('#cuatrimestre').val();
			var grupo = $('#grupo').val();
			var generacion = $('#generacion').val();
			var estadoliberacion = $('#estadoliberacion').val();

			$.post('../control/cambiarAlumno.php',{matriculaAlumno:matriculaAlumno, nombreAlumno:nombreAlumno, apellidoPpaterno:apellidoPpaterno,
			 apellidoMaterno:apellidoMaterno, fechaInicio:fechaInicio, fechaFin:fechaFin, 
			 telefonoAlumno:telefonoAlumno, genero:genero, proceso:proceso, idPrograma:idPrograma,
			 cuatrimestre:cuatrimestre, grupo:grupo, generacion:generacion, estadoliberacion:estadoliberacion})

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
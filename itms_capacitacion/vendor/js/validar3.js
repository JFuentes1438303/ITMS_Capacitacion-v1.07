function validarTexto(parametro) {
	var patron = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/;
	if (parametro.search(patron)) {
		return false;

	}else {
		return true;
	}
}

function validarCorreo(parametro){
	var patron = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
	if (!patron.test(parametro)) {
		return false;
	}else {
		return true;
	}
}

/*Validar espacios en blanco*/
function validarEspacios(parametro) {
	var patron = /^\s+$/;
	if (patron.test(parametro)) {
		return false;
	}else {
		return true;
	}
}

/*Validar numero de caracteres*/
function validarCaracteres(parametro) {
	if (parametro.length<3 || parametro.length>30) {
		return false;
	}else {
		return true;
	}
}


function validar() {

	var formulario = document.form3;

	if (formulario.nombres.value == "" || validarEspacios(formulario.nombres.value) == false) {
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger t_centro"><a href="" class="close" data-dismiss="alert">&times;</a>Por favor ingrese su(s) nombre(s).</div>';
		formulario.nombres.value = "";
		formulario.nombres.focus();
		return false;
	}else if (validarTexto(formulario.nombres.value) == false) {
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger t_centro"><a href="" class="close" data-dismiss="alert">&times;</a>No estan permitidos valores numéricos en el nombre.</div>';
		formulario.nombres.value = "";
		formulario.nombres.focus();
		return false;
	}else if (validarCaracteres(formulario.nombres.value) == false) {
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger t_centro"><a href="" class="close" data-dismiss="alert">&times;</a>El nombre ingresado no es valido Minimo (3 caracteres) Maximo (30 caracteres).</div>';
		formulario.nombres.value = "";
		formulario.nombres.focus();
		return false;
	}else {
		document.getElementById("alerta").innerHTML = "";
	}


	if (formulario.apellidos.value == "" || validarEspacios(formulario.apellidos.value) == false) {
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger t_centro"><a href="" class="close" data-dismiss="alert">&times;</a>Por favor ingrese sus apellidos.</div>';
		formulario.apellidos.value = "";
		formulario.apellidos.focus();
		return false;
	}else if (validarTexto(formulario.apellidos.value) == false) {
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger t_centro"><a href="" class="close" data-dismiss="alert">&times;</a>No estan permitidos valores numéricos en los apellidos.</div>';
		formulario.apellidos.value = "";
		formulario.apellidos.focus();
		return false;
	}else if (validarCaracteres(formulario.apellidos.value) == false) {
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger t_centro"><a href="" class="close" data-dismiss="alert">&times;</a>Los apellidos ingreados no son validos Minimo (3 caracteres) Maximo (30 caracteres)</div>';
		formulario.apellidos.value = "";
		formulario.apellidos.focus();
		return false;
	}else {
		document.getElementById("alerta").innerHTML = "";
	}


	if (formulario.correo.value == "") {
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger t_centro"><a href="" class="close" data-dismiss="alert">&times;</a>Por favor ingrese su correo electrónico.</div>';
		formulario.correo.value = "";
		formulario.correo.focus();
		return false;
	}else if (validarCorreo(formulario.correo.value) == false) {
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger t_centro"><a href="" class="close" data-dismiss="alert">&times;</a>El correo electrónico ingresado no es valido.</div>';
		formulario.correo.focus();
		return false;
	}else {
		document.getElementById("alerta").innerHTML = "";
	}

	formulario.submit();

}
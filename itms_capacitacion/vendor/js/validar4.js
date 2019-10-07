/*Validar q solo se ingrese texto*/
function validarTexto(parametro) {
	var patron = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/;
	if (parametro.search(patron)) {
		return false;

	}else {
		return true;
	}
}

/*Validar q solo se ingresen numeros*/
function validarNumeros(parametro) {
	if (!/^([0-9])*$/.test(parametro)) {
		return false;
	}else {
		return true;
	}
}

function validarDocumento(parametro) {
	if (parametro.length<6 || parametro.length>11) {
		return false;
	}else {
		return true;
	}
}

/*Validar correo electronico*/
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

	var formulario = document.form4;

	if (formulario.documento.value == "") {
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger t_centro"><a href="" class="close" data-dismiss="alert">&times;</a>Por favor ingrese el numero de documento.</div>';
		formulario.documento.value = "";
		formulario.documento.focus();
		return false;
	}else if (validarNumeros(formulario.documento.value) == false) {
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger t_centro"><a href="" class="close" data-dismiss="alert">&times;</a>Solo estan permitidos valores numéricos en el numero de documento.</div>';
		formulario.documento.value = "";
		formulario.documento.focus();
		return false;
	}else if (validarDocumento(formulario.documento.value) == false) {
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger t_centro"><a href="" class="close" data-dismiss="alert">&times;</a>El numero de documento ingresado no es valido Minimo (6 caracteres) y Maximo (11 caracteres)</div>';
		formulario.documento.value = "";
		formulario.documento.focus();
		return false;
	}else {
		document.getElementById("alerta").innerHTML = "";
	}


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


	if (formulario.n_password.value == "") {
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger t_centro"><a href="" class="close" data-dismiss="alert">&times;</a>Por favor ingrese una nueva contraseña.</div>';
		formulario.n_password.focus();
		return false;
	}else {
		document.getElementById("alerta").innerHTML = "";
	}


	if (formulario.c_password.value == "") {
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger t_centro"><a href="" class="close" data-dismiss="alert">&times;</a>Por favor ingrese la confirmacion de la contraseña.</div>';
		formulario.c_password.focus();
		return false;
	}else {
		document.getElementById("alerta").innerHTML = "";
	}


	if (formulario.n_password.value != formulario.c_password.value) {
		document.getElementById("alerta").innerHTML = '<div class="alert alert-danger t_centro"><a href="" class="close" data-dismiss="alert">&times;</a>Las contraseñas ingresadas no coinciden.</div>';
		formulario.n_password.value = "";
		formulario.c_password.value = "";
		formulario.n_password.focus();
		return false;
	}

	formulario.submit();
}
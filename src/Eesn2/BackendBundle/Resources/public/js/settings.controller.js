$("#guardar").click(function(){
	// VARIABLES DE CONFIGURACION
	var cantAsignaturas = $("#cantAsignaturas").val();
	var asignaturas = $("#asig").val().split(',');
	var cantCargos = $("#cantCargos").val();
	var cargos = $("#carg").val().split(',');
	var cantCursos = $("#cantCursos").val();
	var cursos = $("#curs").val().split(',');
	var cantDivisiones = $("#cantDivisiones").val();
	var divisiones = $("#divs").val().split(',');
	var cantNormas = $("#cantNormas").val();
	var normas = $("#norm").val().split(',');
	var cant_tipo_estudiantes = $("#cantT-Estudiantes").val();
	var tipos_estudiantes = $("#t-est").val().split(',');
	var cant_tipo_examenes = $("#cantT-exam").val();
	var tipos_examenes = $("#t-exa").val().split(',');
	var cantTurnos = $("#cantTurnos").val();
	var turnos = $("#turn").val().split(',');

	//VALIDACIONES DE DATOS
	var asignaturasOK = validate(cantAsignaturas, asignaturas, 'asignaturas');
	var cargosOK = validate(cantCargos, cargos, 'cargos');
	var cursosOK = validate(cantCursos, cursos, 'cursos');
	var divisionesOK = validate(cantDivisiones, divisiones, 'divisiones');
	var normasOK = validate(cantNormas, normas, 'normas');
	var tipoEstudiantesOK = validate(cant_tipo_estudiantes, tipos_estudiantes, 'tipo_de_estudiantes');
	var tipoExamenesOK = validate(cant_tipo_examenes, tipos_examenes, 'tipo_de_examenes');
	var turnosOK = validate(cantTurnos, turnos, 'turnos');

	//JSON DE REQUEST
	var data = armarJSON(asignaturasOK,cargosOK,cursosOK,divisionesOK,normasOK,tipoEstudiantesOK,tipoExamenesOK,turnosOK);
	if(data['validado']){
		$("#loading").show();
		$.ajax({
			url: 'guardarSettings',
			data: data,
			type: 'POST',
			dataType: 'json',
			success: function(res){
				$("#loading").hide();
				if(res.guardado == true){
					alertify.success("Se Ha Guardado La Configuración en Base De Datos, Ya Puede Utilizar El Sistema");
					$(location).attr('href','index');
				}else{
					alertify.error("No se pudo guardar la configuración, verifique los datos ingresados");
				}
			}
		});
	}
});

function armarJSON(asignaturasOK,cargosOK,cursosOK,divisionesOK,normasOK,tipoEstudiantesOK,tipoExamenesOK,turnosOK){
	var data = {};

	if(asignaturasOK['bool']){
		data['asignaturas'] = asignaturasOK['asignaturas'];
	}else{
		alertify.error(asignaturasOK['message']);
		return false;
	}

	if(cargosOK['bool']){
		data['cargos'] = cargosOK['cargos'];
	}else{
		alertify.error(cargosOK['message']);
		return false;	
	}

	if(cursosOK['bool']){
		data['cursos'] = cursosOK['cursos'];
	}else{
		alertify.error(cursosOK['message']);
		return false;
	}

	if(divisionesOK['bool']){
		data['divisiones'] = divisionesOK['divisiones'];
	}else{
		alertify.error(divisionesOK['message']);
		return false;
	}

	if(normasOK['bool']){
		data['normas'] = normasOK['normas'];
	}else{
		alertify.error(normasOK['message']);
		return false;
	}

	if(tipoEstudiantesOK['bool']){
		data['tipoEstudiantes'] = tipoEstudiantesOK['tipo_de_estudiantes'];
	}else{
		alertify.error(tipoEstudiantesOK['message']);
		return false;
	}

	if(tipoExamenesOK['bool']){
		data['tipoExamenes'] = tipoExamenesOK['tipo_de_examenes'];
	}else{
		alertify.error(tipoExamenesOK['message']);
		return false;
	}

	if(turnosOK['bool']){
		data['turnos'] = turnosOK['turnos'];
	}else{
		alertify.error(turnosOK['message']);
		return false;
	}
	data['validado'] = true;
	return data;
}

function validate(cant, arrayVariable, stringMessage){
	var mi_array = new Array();
	mi_array['bool'] = true;
	mi_array['message'] = 'sin errores';
	mi_array[stringMessage] = arrayVariable;

	var errores = new Array();

	//ERRORES DE IGUAL CANTIDAD
	errores['asignaturas_d'] = 'Número de Asignaturas y Cantidad de Asignaturas Ingresadas son Distintas';
	errores['cargos_d'] = 'Número de Cargos y Cantidad de Cargos Ingresados son Distintos';
	errores['cursos_d'] = 'Número de Cursos y Cantidad de Cursos Ingresados son Distintos';
	errores['divisiones_d'] = 'Número de Divisiones y Cantidad de Divisiones Ingresadas son Distintas';
	errores['normas_d'] = 'Número de Normas y Cantidad de Normas Ingresadas son Distintas';
	errores['tipo_de_estudiantes_d'] = 'Número de Tipo de Estudiantes y Cantidad de Tipo de Estudiantes Ingresados son Distintos';
	errores['tipo_de_examenes_d'] = 'Número de Tipo de Exámenes y Cantidad de Tipo de Exámenes Ingresados son Distintos';
	errores['turnos_d'] = 'Número de Turnos y Cantidad de Turnos Ingresados son Distintos';

	//ERRORES DE CANTIDAD MINIMA
	errores['asignaturas_m'] = 'Debe Ingresar Al Menos una Asignatura';
	errores['cargos_m'] = 'Debe Ingresar Al Menos un Cargo';
	errores['cursos_m'] = 'Debe Ingresar Al Menos un Curso';
	errores['divisiones_m'] = 'Debe Ingresar Al Menos una División';
	errores['normas_m'] = 'Debe Ingresar Al Menos una Norma Legal';
	errores['tipo_de_estudiantes_m'] = 'Debe Ingresar Al Menos un Tipo de Estudiante';
	errores['tipo_de_examenes_m'] = 'Debe Ingresar Al Menos un Tipo de Exámen';
	errores['turnos_m'] = 'Debe Ingresar Al Menos un Turno';

	if(arrayVariable.length != cant){
		mi_array['bool'] = false;
		mi_array['message'] = errores[stringMessage+'_d'];
	}

	if(arrayVariable == 0){
		mi_array['bool'] = false;
		mi_array['message'] = errores[stringMessage+'_m'];
	}

	if(mi_array['bool']){
		mi_array[stringMessage] = recorrerArray(arrayVariable);
	}

	return mi_array;

}

function recorrerArray(array){
	var newArray = new Array();
	$.each(array, function(index, value){
		newArray[index] = HTMLentitiesEncode(value);
	});

	return newArray;
}

function HTMLentitiesEncode(string){
	var newString = '';
	for(var i = 0; i<string.length;i++){
		var caracter = string[i];

		
		if(caracter == 'á'){
			caracter = string[i].replace(caracter,'&aacute;');
		}
		if(caracter == 'é'){
			caracter = string[i].replace(caracter,'&eacute;');
		}
		if(caracter == 'í'){
			caracter = string[i].replace(caracter,'&iacute;');
		}
		if(caracter == 'ó'){
			caracter = string[i].replace(caracter,'&oacute;');
		}
		if(caracter == 'ú'){
			caracter = string[i].replace(caracter,'&uacute;');
		}
		if(caracter == 'ñ'){
			caracter = string[i].replace(caracter,'&ntilde;');
		}
		if(caracter == '°'){
			caracter = string[i].replace(caracter,'&deg;');
		}

		newString += caracter;

	}

	return newString;
}
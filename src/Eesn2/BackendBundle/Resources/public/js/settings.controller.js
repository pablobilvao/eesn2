$("#guardar").click(function(){
	$.each($("#settings").children(), function(index,value){
		var entorno = $(value).attr('entorno');
		if(typeof(entorno) != "undefined"){

			// VARIABLES DE CONFIGURACION
			if(entorno == 'asignaturas'){
				var cantAsignaturas = $("#cantAsignaturas").val();
				var asignaturas = $("#asig").val().split(',');
			}
			if(entorno == 'cargos'){
				var cantCargos = $("#cantCargos").val();
				var cargos = $("#carg").val().split(',');
			}
			if(entorno == 'cursos'){
				var cantCursos = $("#cantCursos").val();
				var cursos = $("#curs").val().split(',');
			}
			if(entorno == 'divisiones'){
				var cantDivisiones = $("#cantDivisiones").val();
				var divisiones = $("#divs").val().split(',');
			}
			if(entorno == 'normas'){
				var cantNormas = $("#cantNormas").val();
				var normas = $("#norm").val().split(',');
			}
			if(entorno == 'estudiantes'){
				var cant_tipo_estudiantes = $("#cantT-Estudiantes").val();
				var tipos_estudiantes = $("#t-est").val().split(',');
			}
			if(entorno == 'examenes'){
				var cant_tipo_examenes = $("#cantT-exam").val();
				var tipos_examenes = $("#t-exa").val().split(',');
			}
			if(entorno == 'turnos'){
				var cantTurnos = $("#cantTurnos").val();
				var turnos = $("#turn").val().split(',');
			}

			var validaciones = new Array();
			//VALIDACIONES DE DATOS
			if(typeof(asignaturas) != 'undefined'){
				var asignaturasOK = validate(cantAsignaturas, asignaturas, 'asignaturas');
				validaciones['asignaturas'] = asignaturasOK;
			}
			if(typeof(cargos) != 'undefined'){
				var cargosOK = validate(cantCargos, cargos, 'cargos');
				validaciones['cargos'] = cargosOK;
			}
			if(typeof(cursos) != 'undefined'){
				var cursosOK = validate(cantCursos, cursos, 'cursos');
				validaciones['cursos'] = cursosOK;
			}
			if(typeof(divisiones) != 'undefined'){
				var divisionesOK = validate(cantDivisiones, divisiones, 'divisiones');
				validaciones['divisiones'] = divisionesOK;
			}
			if(typeof(normas) != 'undefined'){
				var normasOK = validate(cantNormas, normas, 'normas');
				validaciones['normas'] = normasOK;
			}
			if(typeof(tipos_estudiantes) != 'undefined'){
				var tipoEstudiantesOK = validate(cant_tipo_estudiantes, tipos_estudiantes, 'tipo_de_estudiantes');
				validaciones['estudiantes'] = tipoEstudiantesOK;
			}
			if(typeof(tipos_examenes) != 'undefined'){
				var tipoExamenesOK = validate(cant_tipo_examenes, tipos_examenes, 'tipo_de_examenes');
				validaciones['examenes'] = tipoExamenesOK;
			}
			if(typeof(turnos) != 'undefined'){
				var turnosOK = validate(cantTurnos, turnos, 'turnos');
				validaciones['turnos'] = turnosOK;
			}

			var data = armarJSON(validaciones);

			//JSON DE REQUEST
	
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
		}
	});
});

function armarJSON(array){
	var data = {};

	if(typeof(array['asignaturas']) != 'undefined'){
		if(array['asignaturas']['bool']){
			data['asignaturas'] = array['asignaturas']['asignaturas'];
		}else{
			alertify.error(array['asignaturas']['message']);
			return false;
		}
	}

	if(typeof(array['cargos']) != 'undefined'){
		if( array['cargos']['bool']){
			data['cargos'] = array['cargos']['cargos'];
		}else{
			alertify.error(array['cargos']['message']);
			return false;	
		}
	}

	if(typeof(array['cursos']) != 'undefined'){
		if( array['cursos']['bool']){
			data['cursos'] = array['cursos']['cursos'];
		}else{
			alertify.error(array['cursos']['message']);
			return false;
		}
	}

	if(typeof(array['divisiones']) != 'undefined'){
		if( array['divisiones']['bool']){
			data['divisiones'] = array['divisiones']['divisiones'];
		}else{
			alertify.error(array['divisiones']['message']);
			return false;
		}
	}

	if(typeof(array['normas']) != 'undefined'){
		if( array['normas']['bool']){
			data['normas'] = array['normas']['normas'];
		}else{
			alertify.error(array['normas']['message']);
			return false;
		}
	}

	if(typeof(array['estudiantes']) != 'undefined'){
		if( array['estudiantes']['bool']){
			data['tipoEstudiantes'] = array['estudiantes']['tipo_de_estudiantes'];
		}else{
			alertify.error(array['estudiantes']['message']);
			return false;
		}
	}

	if(typeof(array['examenes']) != 'undefined'){
		if( array['examenes']['bool']){
			data['tipoExamenes'] = array['examenes']['tipo_de_examenes'];
		}else{
			alertify.error(array['examenes']['message']);
			return false;
		}
	}

	if(typeof(array['turnos']) != 'undefined'){
		if( array['turnos']['bool']){
			data['turnos'] = array['turnos']['turnos'];
		}else{
			alertify.error(array['turnos']['message']);
			return false;
		}
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
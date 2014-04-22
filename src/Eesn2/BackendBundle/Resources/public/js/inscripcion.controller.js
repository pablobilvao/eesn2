$("#crear").click(function(){
	/* Datos del Alumno */
	var nombre = $("#nombre").val();
	var apellido = $("#apellido").val();
	var edad = $("#edad").val();
	var calle = $("#calle").val();
	var numero = $("#numero").val();
	var email = $("#mail").val();
	var dni = $("#dni").val();
	var cuil = $("#cuil").val();
	var matricula = $("#matricula").val();
	var fecha_nacimiento = $("#fnacimiento").val();
	var lugar_nacimiento = $("#lnacimiento").val();
	var nacionalidad = $("#nacionalidad").val();
	var telefono = $("#telefono").val();
	var debe_materias = $("#debe-materia").find('option[selected]').val();
	if(debe_materia == "1"){
		var cuantas = $("#cuantas").val();
		var cuales = $("#materias-previas").val().split(',');
	}
	var curso = $("#curso-matricula").val();
	var division = $("#division-matricula").val();

	/* Datos del Padre */
	var pNombre = $("#Pnombre").val();
	var pApellido = $("#Papellido").val();
	var pNacionalidad = $("#Pnacionalidad").val();
	var pVive = $("#Pvive").find('option[selected]').val();
	if(pVive == "1"){
		var pDni = $("#Pdni").val();
		var pProfesion = $("#Pprofesion").val();
	}

	/* Datos de la Madre */
	var mNombre = $("#Mnombre").val();
	var mApellido = $("#Mapellido").val();
	var mNacionalidad = $("#Mnacionalidad").val();
	var mVive = $("#Mvive").find('option[selected]').val();
	if(mVive == "1"){
		var mDni = $("#Mdni").val();
	}

	/* Datos del Tutor */
	var tNombre = $("#Tnombre").val();
	var tApellido = $("#Tapellido").val();
	var tDni = $("#Tdni").val();
	var tCuil = $("#Tcuil").val();
	var tCalle = $("#Tcalle").val();
	var tNumero = $("#Tnumero").val();
});
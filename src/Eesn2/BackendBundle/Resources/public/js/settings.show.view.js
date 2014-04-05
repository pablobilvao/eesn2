var config = returnConfig();
configurarDivsHide();


var scriptConteiner = $("#logica-button");
var scriptButton = '<script>';
	$.each(config, function(index, value){
		if(index != 0){
			scriptButton += '$("#button'+index+'").click(function(){if(typeof($("#'+value+'-tbody").attr("role")) == "undefined"){realizarPeticion("'+value+'");}$("#table-'+value.toLowerCase()+'").modal({fadeDuration:500,fadeDelay:.5});});';
		}
	});
scriptButton += '</script>';
scriptConteiner.html(scriptButton);

function traerRegistrosIds(entorno){
	var ids = new Array();
	var cant = $("#"+entorno+"-tbody tr").length - 1;
	for(var i=0;i<=cant*3;i+=3){
		ids[$("#"+entorno+"-tbody tr ").find("td").eq(i).text()] = $("#"+entorno+"-tbody tr ").find("td").eq(i+1).text();
	}
	return ids;
}

function generarScript(entorno){

	contenedor = $("#jquery-script");
	var script = "<script type='text/javascript'>";

	var ids = traerRegistrosIds(entorno);
	$.each(ids,function(index, value){
		script += '$("#edit-'+index+'").click(function(){editarRegistro("'+index+'","'+entorno+'");});';
		script += '$("#remove-'+index+'").click(function(){var confim = confirm("¿Desea Confirmar La Eliminación de éste Registro en '+entorno+'?");if(confim){borrarRegistro('+index+',"'+entorno+'");}});';
	});

	script += '</script>';
	contenedor.html(script);
	
	if($("#"+entorno+"-table_wrapper").length == 0){
		$("#"+entorno+"-table").dataTable({
			"bStateSave": true,
			"sDom": 'Rlfrtip',
			"oLanguage": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ning&uacute;n dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "&Uacute;ltimo",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
			"sPaginationType" : "full_numbers",
			"aLengthMenu": [[4, 5, 6, 7], [4, 5, 6, 7]],
			"bPaginate": true,
			"bLengthChange": true,
			"bFilter": true,
			"bSort": true,
			"bAutoWidth": true,
			"bInfo": false,
			'iDisplayLength': 4,
		});

		$("select[name="+entorno+"-table_length]").css({
			'width':'50px', 
		});
	}
	return true;
}

function realizarPeticion(entorno){
	$.ajax({
		url: 'getDatosTable',
		type: 'POST',
		dataType: 'json',
		data: {'entorno':entorno},
		success: function(response){
			implantarEnTabla(response,entorno);
		}
	});
}

function implantarEnTabla(object, entorno){
	var html = '';
	var contenedor = $("#"+entorno+"-tbody");
	$.each(object, function(index, value){
		if(!isNaN(index)){
			html += '<tr><td>'+index+'</td><td>'+value+'</td><td><a id="edit-'+index+'" href="#"><img title="editar" class="image" src="/bundles/eesn2backend/images/editar.png" /></a><a id="remove-'+index+'" href="#"><img title="eliminar" class="image" src="/bundles/eesn2backend/images/delete.png" /></a></td>';
		}
	});

	contenedor.html(html);
	generarScript(entorno);

	return true;
}

function borrarRegistro(id, entorno){
	$.ajax({
		url: 'borrarRegistro',
		type: 'POST',
		dataType: 'json',
		data: {'id':id, 'entorno':entorno},
		success: function(res){
			if(res.mensaje){
				alertify.success('El registro ha sido borrado, Solo debe hacer click en Guardar');
			}else{
				alertify.error('No se pudo borrar el registro');
			}
		}
	});
}

function editarRegistro(id, entorno){
	alertify.success(id +'ENTORNO: '+entorno);
}

function returnConfig(){
	var config = new Array();
	config[1] = 'Asignaturas';
	config[2] = 'Cargos';
	config[3] = 'Cursos';
	config[4] = 'Divisiones';
	config[5] = 'Normas';
	config[6] = 'Estudiantes';
	config[7] = 'Examenes';
	config[8] = 'Turnos';

	return config;
}

function configurarDivsHide(){
	$("#table-asignaturas").hide();
	$("#table-cargos").hide();
	$("#table-cursos").hide();
	$("#table-divisiones").hide();
	$("#table-normas").hide();
	$("#table-estudiantes").hide();
	$("#table-examenes").hide();
	$("#table-turnos").hide();
	$("#loading").hide();

	return true;
}
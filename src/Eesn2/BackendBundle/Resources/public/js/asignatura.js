$(document).ready(function(){
	cargarTabla();
	$("#asignaturas").hide();
});

function cargarTabla(){
	var html = '';
	var contenedor = $("#Asignaturas-tbody");
	if($("#Asignaturas-table_wrapper").length != 0){
		$('#Asignaturas-table').dataTable().fnDestroy();
	}
	contenedor.empty();
	$.ajax({
		url: 'getDatosTable',
		type: 'POST',
		dataType: 'json',
		data: {'entorno':'Asignaturas'},
		success: function(asignaturas){
			$.each(asignaturas, function(index, value){
				if(!isNaN(index)){
					html += '<tr><td>'+index+'</td><td><a pk='+index+' class="edit-able" >'+value+'</a></td><td><span class="remove-'+index+'" onclick=eliminarRegistro('+index+'); ><img title="eliminar" class="image" src="/bundles/eesn2backend/images/delete.png" /></span><span class="editar-'+index+'" onclick=configurarEditable('+index+'); ><img title="editar" class="image" src="/bundles/eesn2backend/images/edit.png" /></span></td>';
				}
			});
			contenedor.html(html);
			configurarDataTable();
		}
	});
}

function eliminarRegistro(id){
	var yes = confirm('Desea eliminar este registro?');
	if(yes){
		$.ajax({
    		url: 'borrarRegistro',
			type: 'POST',
			dataType: 'json',
			data: {'id':id, entorno: 'Asignaturas'},
			success: function(res){
				if(res.mensaje){
					alertify.success('El registro ha sido eliminado');
					cargarTabla();
				}else{
					alertify.error('No se pudo borrar el registro');
				}
			}
    	});
	}
}

function configurarDataTable(){
	if($("#Asignaturas-table_wrapper").length == 0){
		$("#Asignaturas-table").dataTable({
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
			"aLengthMenu": [[5, 8, 10, 15], [5, 8, 10, 15]],
			"bPaginate": true,
			"bLengthChange": true,
			"bFilter": true,
			"bSort": true,
			"bAutoWidth": false,
			"bInfo": false,
			'iDisplayLength': 5,
    		"sPaginationType": "bootstrap",
		});
	}
	
	$("select[name=Asignaturas-table_length]").css({
			'width':'50px', 
		});

	//configurarEditable();

	var paginador = $("#Asignaturas-table_paginate");
	paginador.addClass('pagination pagination-small');
}

function configurarEditable(id){
	$('.edit-able[pk='+id+']').addClass('editable-click');
	$('.edit-able[pk='+id+']').editable({
	    send: 'never',
	    success: function(respon, newValue) {
	    	$.ajax({
	    		url: 'actualizarRegistro',
				type: 'POST',
				dataType: 'json',
				data: {'pk':id, 'newValue':newValue, entorno: 'Asignaturas'},
				success: function(res){
					if(res.mensaje){
						alertify.success('El registro ha sido actualizado');
					}else{
						alertify.error('No se pudo actualizar el registro');
					}
					$('.edit-able[pk='+id+']').removeClass('editable-click').css({
						'cursor':'default',
						'text-decoration':'none',
					});
				}
	    	});
	    }        
	});
}

$("#nuevoRegistro").click(function(){
	$("#asignaturas").modal({
		fadeDuration:500,
		fadeDelay:.5
	});
	$("#cerrar").text('Guardar');
});

$("#cerrar").click(function(){
	var cantAsignaturas = $("#cantAsignaturas").val();
	var asignaturas = $("#asig").val().split(',');

	if(asignaturas == 0){
		alertify.error('Debe Ingresar Al Menos Una Asignatura');
		return false;
	}
	if(asignaturas.length != cantAsignaturas){
		alertify.error('Número de Asignaturas y Cantidad de Asignaturas Ingresadas son Distintas');
		return false;
	}

	$.ajax({
		url: 'guardarSettings',
		data: {'asignaturas': asignaturas},
		type: 'POST',
		dataType: 'json',
		success: function(res){
			if(res.guardado == true){
				alertify.success("Registro Creado");
				cargarTabla();
			}else{
				alertify.error("Error Al Guardar El Registro");
			}
		}
	});
});
$(document).ready(function(){
	cargarTabla();
});

function cargarTabla(){
	var html = '';
	var contenedor = $("#Turnos-tbody");
	contenedor.empty();
	$.ajax({
		url: 'getDatosTable',
		type: 'POST',
		dataType: 'json',
		data: {'entorno':'Turnos'},
		success: function(turnos){
			$.each(turnos, function(index, value){
				if(!isNaN(index)){
					html += '<tr><td>'+index+'</td><td><a pk='+index+' class="edit-able" href="">'+value+'</a></td><td><a class="remove-'+index+'" onclick=eliminarRegistro('+index+'); href="#"><img title="eliminar" class="image" src="/bundles/eesn2backend/images/delete.png" /></a></td>';
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
			data: {'id':id, entorno: 'Turnos'},
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
	if($("#Turnos-table_wrapper").length == 0){
		$("#Turnos-table").dataTable({
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
	
	$("select[name=Turnos-table_length]").css({
			'width':'50px', 
		});

	$('.edit-able').editable({
	    send: 'never',
	    success: function(respon, newValue) {
	    	var pk = traerPK();
	    	$.ajax({
	    		url: 'actualizarRegistro',
				type: 'POST',
				dataType: 'json',
				data: {'pk':pk, 'newValue':newValue, entorno: 'Turnos'},
				success: function(res){
					if(res.mensaje){
						alertify.success('El registro ha sido actualizado');
					}else{
						alertify.error('No se pudo actualizar el registro');
					}
				}
	    	});
	    }        
	});

	var paginador = $("#Turnos-table_paginate");
	paginador.addClass('pagination pagination-small');
}

function traerPK(){
	return $('.editable-open').attr('pk');
}
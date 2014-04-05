confirmPassHide();
loadingHide();

if($("#confirmpass").val() == ''){
	buttonDisabled();
}

$("#passvieja").change(function(){
	if($("#passnueva").val() != "" && $("#passvieja").val() != ""){
		confirmPassShow();
	}else{
		noValid();
	}
	return true;
});

$("#passnueva").change(function(){
	if($("#passnueva").val() != "" && $("#passvieja").val() != ""){
		confirmPassShow();
	}else{
		noValid();
	}

	return true;
});

$("#confirmpass").change(function(){
	if($("#confirmpass").val() != ""){
		buttonEnabled();
	}else{
		buttonDisabled();
	}
	return true;
});

$("#button-guardar").click(function(){
	if(!validarMin($("#user").val())){
		alertify.error("El Usuario Debe Tener Minimo 6 Caracteres");
	}else if( !validarMin($("#passnueva").val()) ){
		alertify.error("La Password Nueva Debe Tener Al Menos 6 Caracteres");
	}else if( !validarMin($("#confirmpass").val()) ){
		alertify.error("La Password de Confirmacion Debe Tener Al Menos 6 Caracteres");
	}else if( $("#passnueva").val() != $("#confirmpass").val() ){
		alertify.error("La password Nueva y La Confirmacion deben ser iguales");
	}else{
		var user = $.base64.encode($("#user").val());
		var passVieja = $.base64.encode($("#passvieja").val());
		var passNueva = $.base64.encode($("#passnueva").val());
		var passConfirm = $.base64.encode($("#confirmpass").val());
		var data = {'user':user, 'passVieja': passVieja, 'passNueva':passNueva,'passConfirm':passConfirm};
		loadingShow();
		buttonDisabled();
		$.ajax({
			url: 'cambiarDatos',
			type: 'POST',
			dataType: 'json',
			data: data,
			success: function(response){
				buttonEnabled();
				loadingHide();

				if(response.update == 'Actualizado'){
					alertify.success("Datos Actualizados Correctamente");
				}else{
					alertify.error(response.update);
				}
			}	
		});
	}

	return false;
});

function loadingHide(){
	$("#loading").hide();
}

function loadingShow(){
	$("#loading").show();
}

function confirmPassHide(){
	$("#confirm-pass").hide();
}

function buttonDisabled(){
	$("#button-guardar").attr("disabled","disabled");
}

function buttonEnabled(){
	$("#button-guardar").removeAttr("disabled");
}

function confirmPassShow(){
	$("#confirm-pass").show();
}

function noValid(){
	$("#confirmpass").val("");
	confirmPassHide();
	buttonDisabled();
}

function validarMin(string){
	if( string.length < 6 ){
		return false;
	}else{
		return true;
	}
}
function validate(e,t){
	if(e.length==0||t.length==0){
		return false
	}else{
		return true
	}
}
var user=$("#user").val();
var pass=$("#pass").val();

$("#user").change(function(){
	user=$("#user").val()
});

$("#pass").change(function(){
	pass=$("#pass").val()
});

$("#ingresar").click(function(){
	var e=validate(user,pass);
	if(e){
		$.ajax({
			url:"getLogin",
			type:"POST",
			dataType:"json",
			data:{user:$.base64.encode(user),pass:$.base64.encode(pass)},
			success:function(e){
				if(e.logger=="ok"){
					$(location).attr("href","index")
				}else{
					alertify.error("Usuario o Contraseña Incorrecto")
				}
			}
		})
	}else{
		alertify.error("Los Campos Son Obligatorios")
	}
});
$("#settings-welcome").hide();
$("#settings").hide();
$("#asignaturas").hide();
$("#cargos").hide();
$("#cursos").hide();
$("#divisiones").hide();
$("#normas").hide();
$("#t-estudiantes").hide();
$("#t-examenes").hide();
$("#turnos").hide();
$("#loading").hide();

$("#settings-welcome").modal({
	fadeDuration:500,
	fadeDelay:.5
});

$("#cerrar").click(function(){
	$("#settings").show();
});

$("#button1").click(function(){
	$("#asignaturas").modal({
		fadeDuration: 500,
		fadeDelay: .5
	});
});

$("#button2").click(function(){
	$("#cargos").modal({
		fadeDuration: 500,
		fadeDelay: .5
	});
});

$("#button3").click(function(){
	$("#cursos").modal({
		fadeDuration: 500,
		fadeDelay: .5
	});
});

$("#button4").click(function(){
	$("#divisiones").modal({
		fadeDuration: 500,
		fadeDelay: .5
	});
});

$("#button5").click(function(){
	$("#normas").modal({
		fadeDuration: 500,
		fadeDelay: .5
	});
});

$("#button6").click(function(){
	$("#t-estudiantes").modal({
		fadeDuration: 500,
		fadeDelay: .5
	});
});

$("#button7").click(function(){
	$("#t-examenes").modal({
		fadeDuration: 500,
		fadeDelay: .5
	});
});

$("#button8").click(function(){
	$("#turnos").modal({
		fadeDuration: 500,
		fadeDelay: .5
	});
});
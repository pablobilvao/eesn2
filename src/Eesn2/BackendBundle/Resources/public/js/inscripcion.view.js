//$("#form-inscripcion").hide();
$("#alumno").hide();
$("#cantidad-materias").hide();
$("#select-materias").hide();
$("#m-previas").hide();
$("#padre").hide();
$("#madre").hide();
$("#tutor").hide();
$(".Pvive-si").hide();
$("#Mvive-si").hide();

var debe_materia=$("#cuantas").val();
var vive=$("#vive").val();
var option_no = $("#debe-materia").find('option[value=0]');
var option_si = $("#debe-materia").find('option[value=1]');

var PviveNo = $("#Pvive").find("option[value=0]");
var PviveSi = $("#Pvive").find("option[value=1]");

var MviveNo = $("#Mvive").find("option[value=0]");
var MviveSi = $("#Mvive").find("option[value=1]");

$("#Pvive").change(function(){
	if(this.value == '1'){
		PviveSi.attr('selected','true');
		PviveNo.attr('selected',false);
	}
	if(this.value == '0'){
		PviveNo.attr('selected','true');
		PviveSi.attr('selected',false);
	}
});

$("#Mvive").change(function(){
	if(this.value == '1'){
		MviveSi.attr('selected','true');
		MviveNo.attr('selected',false);
	}
	if(this.value == '0'){
		MviveNo.attr('selected','true');
		MviveSi.attr('selected',false);
	}
});

$("#debe-materia").change(function(){
	if(this.value == '1'){
		option_si.attr('selected','true');
		option_no.attr('selected',false);
	}
	if(this.value == '0'){
		option_no.attr('selected','true');
		option_si.attr('selected',false);
	}
});

$("#button").click(function(){
	$("#form-inscripcion").modal({
		fadeDuration:500,
		fadeDelay:.5})
	});

$("#button1").click(function(){

	$.ajax({
		url: 'getCursos',
		type: 'POST',
		success: function(cursos){
			var html = '';
			var contenedor = $("#cursos-matricula");
			$.each(cursos, function(index, value){
				html += "<option value='"+index+"'>"+value+"</option>";
			});

			contenedor.html(html);
		}
	});

	$.ajax({
		url: 'getDivisiones',
		type: 'POST',
		success: function(divisiones){
			var html = '';
			var contenedor = $("#divisiones-matricula");
			$.each(divisiones, function(index, value){
				html += "<option value='"+index+"'>"+value+"</option>";
			});

			contenedor.html(html);
		}
	});
	
	$("#alumno").modal({
		fadeDuration:500,
		fadeDelay:.5 
	});

});

$("#button-padre").click(function(){$("#padre").modal({fadeDuration:500,fadeDelay:.5})});$("#button-madre").click(function(){$("#madre").modal({fadeDuration:500,fadeDelay:.5})});$(".button4").click(function(){$("#button").click()});$("#debe-materia").change(function(){debe_materia=this.value;if(debe_materia=="1"){$("#cantidad-materias").show()}else{$("#cantidad-materias").hide();$("#m-previas").hide()}});$("#Pvive").change(function(){vive=this.value;if(vive=="1"){$(".Pvive-si").show()}else{$("#Pvive-si").hide()}});$("#Mvive").change(function(){vive=this.value;if(vive=="1"){$("#Mvive-si").show()}else{$("#Mvive-si").hide()}});$("#cuantas").change(function(){var e=this.value;if(e>0){$("#m-previas").show()}else{$("#m-previas").hide()}});$("#button3").click(function(){$("#tutor").modal({fadeDuration:500,fadeDelay:.5})})
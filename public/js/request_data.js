//funcion para subir scroll en elemento asignado
$.fn.scrollView = function () {
	return this.each(function () {
		$('html, body').animate({ scrollTop: $(this).offset().top - 150 }, 1000);
	});
}

//funcion para cerrar mensaje de respuesta del servidor
$(document).on('click','.response__close',function(e) {
	e.preventDefault();
	let element = $(this);
	let response = element.closest(".response");
	response.html("");
	response.removeClass("response--error response--success");
});

//funcion para mandar llamar validar datos y despues enviar formulario a servidor
$(document).on('click','.send-form',function(e) {
	e.preventDefault();
	let form = $(this.form);
	let url = form.attr("action");
	let response = form.find(".response");

    if(form_validations(form)){
        send_form(form,url,response);
    }
});

//funcion para enviar formulario a servidor
function send_form(form,url,response){
	
	let formData = new FormData($(form)[0]);
	response.removeClass("response--error response--success response--proccess");
	var close = "<span class='response__close'><i class='fa fa-times'></i></span>";
	$.ajax({
        type: "POST",
        url : url,
        datatype:'json',
        data : formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function(){
        	let string = "&nbsp;&nbsp;Espere un momento, procesando datos...";
        	response.html("<i class='fa fa-spinner fa-pulse'></i><span>"+string+"</span>");
        	form.find("button").prop('disabled', true);
        	form.find("input").prop('disabled', true);
        	form.find('select').prop('disabled', true);
        	response.addClass("response--process");
        	response.scrollView();
        },
        success : function(data){
        	response.removeClass("response--process");
        	form.find("input").prop('disabled', false);
        	form.find('select').prop('disabled', false);
        	form.find('button').prop('disabled', false);
        	if(data.status){
        		response.addClass("response--success");
        		response.html(close+data.message);
        		reset_controls(form);
        	}else{
        		response.addClass("response--error");
        		response.html(close+data.message);
				if(data.exception){
					console.log(data.exception);
				}
        	}
        },
        error: function(data, xhr, desc, err) {
        	response.removeClass("response--process");
        	form.find("button").prop('disabled', false);
        	form.find("input").prop('disabled', false);
        	form.find('select').prop('disabled', false);
        	response.addClass("response--error");
			let error = data.responseText;
        	console.log(error);
        	let string = "Error de sistema, intente de nuevo o reportelo al área de sistemas.";
        	response.html(close+string);
		}
    });
}

// funcion para limpiar inputs de formulario
function reset_controls(form){
	$(form)[0].reset();
}


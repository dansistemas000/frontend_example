var errors;
function form_validations(form){
	errors = 0;
    text_input_validations(form);
    file_input_validations(form);

	if(errors == 0){
		return true;
	}else{
		return false;
	}

}

function text_input_validations(form){
    if(form.find(".validate-text").length > 0){
		$(form.find(".validate-text")).each(function(){
			let element = $(this);
			let required = element.attr("required");
			let value = element.val();
			let container = element.closest(".input-container");
			let visible = element.is(":visible");
			container.find(".error-message").remove();
			if(required == "required" && value == "" && visible){
				container.append( "<label class='error-message'>*Dato requerido</label>");
                errors++;
			}
		});
	}
}

function file_input_validations(form){
    if(form.find(".validate-file").length > 0){
		$(form.find(".validate-file")).each(function(){
			let element = $(this);
			let required = element.attr("required");
			let value = element.val();
			let container = element.closest(".input-container");
			let visible = element.is(":visible");
			container.find(".error-message").remove();
			
			if(required == "required" && visible){
				if(value == ""){
					container.append( "<label class='error-message'>*Debe cargar un archivo</label>");
                    errors++;
				}else{
					let ext = value.split(".");
					let len_ext = ext.length;
					ext = ext[ len_ext -1 ];
					let accept = element.attr("accept");
					accept = accept.split(",");
					if(accept.indexOf("."+ext.toLowerCase()) == -1){
						let message = "";
						accept.forEach(function(value){
							message = message + " "+value;
						});
						container.append( "<label class='error-message'>*Debe cargar un archivo con extensión valida: ("+message+")<label>");
                        errors++;
					}
				}
			}
		});
	}
}

$(document).on('change','input',function(e) {
	let element = $(this);
	let container = element.closest(".input-container");
	container.find(".error-message").remove();

});

// function form_validations(form){
	
	


// 	if(form.find(".validate-time").length > 0){
// 		$(form.find(".validate-time")).each(function(){
// 			let element = $(this);
// 			let required = element.attr("required");
// 			let value = element.val();
// 			let container = element.closest(".input-container");
// 			let visible = element.is(":visible");
// 			container.find(".input-error-message").remove();
// 			if(required == "required" && value == "" && visible){
// 				empty_value++;
// 				container.append( "<label class='input-error-message'>*Dato requerido<label>");
// 				return false;
// 			}

// 			if(Number(value) == 0 && visible){
// 				empty_value++;
// 				container.append( "<label class='input-error-message'>*Este dato no puede ser igual a 0<label>");
// 				return false;
// 			}

// 			if(Number(value) > 24 && visible){
// 				empty_value++;
// 				container.append( "<label class='input-error-message'>*Este dato no puede ser mayor a 24<label>");
// 			}
// 		});
// 	}

// 	if($(".validate-fee").length > 0 && $(".validate-fee").is(":visible")){

// 		let fee_0 = 0;
// 		let fee_1 = 0;
// 		let fee_2 = 0;

// 		$(".validate-fee").each(function(){
// 			let element = $(this);
// 			let first = Number(element.find(".first").val());
// 			let second = Number(element.find(".second").val());
// 			let third = Number(element.find(".third").val());
// 			let required = element.attr("required");
// 			let fee = element.attr("fee");

// 			let total = first + second + third;

// 			switch(fee){
// 				case "0":
// 					fee_0 = total;
// 				break;
// 				case "1":
// 					fee_1 = total;
// 				break;
// 				case "2":
// 					fee_2 = total;
// 				break;
// 			}

// 			element.find(".input-error-message").remove();

			

// 			if(first < 5 && second > 0){
// 				empty_value++;
// 				element.append( "<label class='input-error-message'>*El % primero no puede ser menor a 5<label>");
// 				return false;
// 			}

// 			if(first > 0 && second < 5 && third > 0){
// 				empty_value++;
// 				element.append( "<label class='input-error-message'>*El % segundo no puede ser menor a 5<label>");
// 				return false;
// 			}

// 			if(first < 5 && second < 5 && third > 0){
// 				empty_value++;
// 				element.append( "<label class='input-error-message'>*El % primero y % segundo no puede ser menor a 5<label>");
// 				return false;
// 			}

// 			if(first < 5 && required == "required"){
// 				empty_value++;
// 				element.append( "<label class='input-error-message'>*La cuota 0 debe ser mayor a 0<label>");
// 				return false;
// 			}

// 			if(total > 100){
// 				empty_value++;
// 				element.append( "<label class='input-error-message'>*Los porcentajes no pueden ser mayor a 100<label>");
// 				return false;
// 			}
// 		});


// 		if(fee_2 > 0 && fee_1 == 0){
// 			empty_value++;
// 			$(".fee-2").append( "<label class='input-error-message'>*Los porcentajes de la cuota 2 no pueden ser mayor a 0 si los porcentajes de la cuota 1 son iguales a 0<label>");
// 		}
// 	}

// 	if(form.find(".validate-num").length > 0){
// 		$(form.find(".validate-num")).each(function(){
// 			let element = $(this);
// 			let required = element.attr("required");
// 			let value = element.val();
// 			let container = element.closest(".input-container");
// 			let visible = element.is(":visible");
// 			container.find(".input-error-message").remove();
// 			if(required == "required" && value == "" && visible){
// 				empty_value++;
// 				container.append( "<label class='input-error-message'>*Dato requerido<label>");
// 			}
// 		});
// 	}

// 	if(form.find(".validate-select").length > 0){

// 		$(form.find(".validate-select")).each(function(){
// 			let element = $(this);
// 			let required = element.attr("required");
// 			let value = element.val();
// 			let container = element.closest(".input-container");
// 			let visible = element.is(":visible");
// 			container.find(".input-error-message").remove();
// 			if(required == "required" && value == "" && visible){
// 				empty_value++;
// 				container.append( "<label class='input-error-message'>*Dato requerido<label>");
// 			}
// 		});
// 	}

// 	if(form.find(".scheduled-date-2").length > 0){
// 		$(form.find(".scheduled-date-2")).each(function(){
// 			let element = $(this);
// 			let value = element.val();
// 			let scheduled_date_2 = Number(value.replace(/-/gi,""));
// 			let container = element.closest(".input-container");
// 			let visible = element.is(":visible");
// 			let scheduled_date_1 = $(".scheduled-date-1").val();
// 			scheduled_date_1 = Number(scheduled_date_1.replace(/-/gi,""));
// 			container.find(".input-error-message").remove();

// 			if(value != "" && visible){
// 				if(scheduled_date_1 > scheduled_date_2){
// 					empty_value++;
// 					container.append( "<label class='input-error-message'>*Esta fecha no puede ser menor a la fecha 1<label>");
// 				}
				
// 			}
// 		});

// 	}

// 	if(empty_value == 0){
// 		return true;
// 	}else{
// 		return false;
// 	}
// }
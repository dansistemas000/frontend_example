// funcion para colocar la extencion que se acepta para carcar el archivo
$(document).on('click','.ext-radio',function() {

	let name = $(this).attr("name");
    let form = $(this.form);
    let value = $('input:radio[name='+name+']:checked').val();
    let file = form.find('input:file');

    file.val("");
    
    if(value == "excel"){
        file.attr("accept",".xlsx,.xls");
    }else{
        file.attr("accept",".txt");
    }
});
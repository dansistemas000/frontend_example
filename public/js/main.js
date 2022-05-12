$(document).ready(function() {
	initialize_tooltip();
	initializeTable();
});

function initializeTable(){

	if($('#table').length > 0 ){
		let table = $('#table').DataTable({
			scrollCollapse: true,
			scrollX: true,
			scroller: true
		});
	}
	
}

function initialize_tooltip(){
	$('[data-toggle="tooltip"]').tooltip();
}


$(document).on('click','.show-modal-posts',function(e) {
    e.preventDefault();
    let userId = $(this).attr("user-id");
    let url = "showPosts/"+userId;
	let title = $(".modal-title");
    let container = $(".modal-body");
	requestsGet(url,container);
	title.text("PUBLICACIONES");
    $('.modal').modal('toggle');

});

$(document).on('click','.show-modal-photos',function(e) {
    e.preventDefault();
    let userId = $(this).attr("user-id");
    let url = "showAlbums/"+userId;
	let title = $(".modal-title");
    let container = $(".modal-body");
	requestsGet(url,container);
	title.text("FOTOS");
    $('.modal').modal('toggle');
});

$(document).on('click','.show-photos',function(e) {
    e.preventDefault();
	let type = $(this).attr("type");
	let father = $(this).closest(".album-container");
	let container = father.find(".photos-container");
	if(type == "close"){
		let albumId = $(this).attr("album-id");
		let url = "showPhotos/"+albumId;
		container.removeClass("d-none");
		requestsGet(url,container);
		$(this).attr("type","open");
	}else{
		container.html("");
		container.addClass("d-none");
		$(this).attr("type","close");
	}
   
});


function requestsGet(url,container){
    $.ajax({
        url: url,
        type: 'GET',
        // async:false,
		beforeSend: function(){
        	let string = "&nbsp;&nbsp;Espere un momento, procesando datos...";
        	container.html("<i class='fa fa-spinner fa-pulse'></i><span>"+string+"</span>");
        },
        success: function(result){
            	container.html(result);
        },
        error: function(data , xhr, desc, err) {
            let MessageResponse = data.responseText;
			alert(MessageResponse);
        }
    });
}


(function($) {

$(document).ready(function(){
	
	//check if there is an about to expired course
	if( $('#has_expiration').length  && $('#has_expiration').html() == "1") {
		$("#expired_courses_modal").modal("show");
	}
	
});
	
	
})( jQuery );

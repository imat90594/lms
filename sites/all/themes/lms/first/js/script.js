(function($) {

$(document).ready(function(){
	
	//check if there is an about to expired course
	if( $('#has_expiration').length ) {
		$("#expired_courses_modal").modal("show");
	}
	
});
	
	
})( jQuery );

(function($) {

$(document).ready(function(){
	
	//check if there is an about to expired course
	if( $('#has_expiration').length  && $('#has_expiration').html() == "1") {
		$("#expired_courses_modal").modal("show");
	}
	
	 $("input[name=email-login], input[name=email-login-2]").change(function(){
		  $("#user-login-form #edit-name").val($(this).val());
	  });
	  
	  $("input[name=password-login], input[name=password-login-2]").change(function(){
		  $("#user-login-form #edit-pass").val($(this).val());
	  });
	  
	  $(".login-btn").click(function(e){
		  e.preventDefault();
		  $("#user-login-form").submit();
	  });

	
	//Added row off canvas for theme
	$('[data-toggle=offcanvas]').click(function() {
		$('.row-offcanvas').toggleClass('active');
	});
	
});
	
	
})( jQuery );

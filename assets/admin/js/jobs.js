

$('#start_date, #start_date_u, #deadline_date, #deadline_date_u').datepicker();

$(document).ready(function(){

	$('#loginForm').submit(function(e){
		e.preventDefault();
		$.ajax({
			url : global.base_url + "admin/login/validate",
			type : "POST",
			data : { 
				email : $('#email').val() ,
				password : $('#password').val() 
			},
			success : function(response){
				if(response==1){
					location.href = global.base_url + 'admin/home';								
				}else
					$('#errors').html(response).fadeOut().fadeIn();
			}
		});
	}); // Submit function
					
});
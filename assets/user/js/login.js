
$(document).ready(function(){
        $('#btn-login').click(function(){
            alert(1);
        });
	$('#loginForm').submit(function(e){
		e.preventDefault();
		$.ajax({
			url : global.base_url + "login/validate",
			type : "POST",
			data : { 
				email : $('#email').val() ,
				password : $('#password').val() 
			},
			success : function(response){
				if(response==1){
					location.href = global.base_url + 'jobs';								
				}else
					$('#errors').html(response).fadeOut().fadeIn();
			}
		});
	}); // Submit function
					
});
$.fn.goTo = function() {
    $('html, body').animate({
		scrollTop: $(this).offset().top + 'px'
    }, 'fast');
    return this; // for chaining...
}
function changeStatus(url,job_id,user_id)
{
    $.ajax({
            type: "POST",
            async: false,
            url: url,
            data:{job_id: job_id,user_id:user_id},
            success: function(response) {
                    response = JSON.parse(response);
                    if(response.success){
                            notify_n_hide('success_message',response.message,1);

                    }else
                            notify_n_hide('error_message',response.message,1);
            },
            error : function(response){alert(response.responseText)}
	});
	return false;
}
function wait_n_hide(id){
	setTimeout(function(){
		$('#'+id).hide("slow");
	},5000);
}

function notify_n_hide(id, msg, path){
    path = typeof path !== 'undefined' ? path : '';
	$('#'+id).html(msg).show("slow");
	setTimeout(function(){
		$('#'+id).hide("slow");
		if(path != '')
		{
                    window.location.reload();
		}
	},5000);
	$('body').goTo();
}


function close_n_refresh(id,ref)
{
	$("#"+ref).css('opacity','0.3');
	setTimeout(function(){
		window.location.reload();
	},2000);
}

function add_request(){
	$('#add_form_holder form')[0].reset();
	$('#searched_content').html('');
	$("#update_form_holder").hide();
	$("#add_form_holder").toggle('slow');
}

function close_it(id){
	$("#"+id).hide('slow');
}

function add_item(URL){
       $('#submit').attr('disabled','disabled');
	$.ajax({
		type: "POST",
		async: false,
		url: URL,
		data:$('#add_form').serialize(),
		success: function(response) {
			response = JSON.parse(response);
			if(response.success){
				notify_n_hide('success_message',response.message);
				close_n_refresh('add_form_holder','content');
			}else
				notify_n_hide('error_message',response.message);
                                $('#submit').removeAttr('disabled','disabled');
		},
		error : function(response){alert(response.responseText)}
	});
	return false;
}

function edit_item(record_id, URL){
	$.ajax({
		url : URL,
		type: "POST",
		async: false,
		data : {
			record_id : record_id
		},
		success: function(response){
			response = JSON.parse(response);
			if(response.success){
				var indexes = response.data;
				for(x in indexes){
					console.log(x);
					$('#'+x).val(indexes[x]);
				}
				$("#update_form_holder").toggle('slow');
			}else
				notify_n_hide('error_message',response.message);
		},
		error: function(response){alert(response.responseText)}
	});	
	return false;
}

function update_item(URL){
	var values = $('#update_form').serialize()+'&update='+ true;
	$.ajax({
		url : URL,
		type: "POST",
		async: false,
		data : values,
		success: function(response){
			response = JSON.parse(response);
			if(response.success){
				notify_n_hide('success_message',response.message);
				close_n_refresh('update_form_holder','content');
			}else
				notify_n_hide('error_message',response.message);
		}
	});	
	return false;
}

function delete_item(id,URL){
	if ( !confirm('Are you sure that you want to delete this record permanently?') )
		return false;
	$.ajax({
		url : URL,
		type: "POST",
		async: false,
		data : {
			record_id : id
		},
		success: function(response){
			response = JSON.parse(response);
			if(response.success){
				notify_n_hide('success_message',response.message);
				close_n_refresh('','content');
			}else
				notify_n_hide('error_message',response.message);
		}
	});
	return false;
}

/* Upload custom funcs */
$(document).ready(function(){
        getJobsAppliedCount();
	$(".uploadTrigger").click(function(){
	   $( $(this).data('trigger') ).trigger('click');	   
	});
			
	$('input[type=file]').change(function(){
		$(this).siblings('.attachment-details').html('<small class="attachment-name"><small>'+$(this).val()+'</small></small><i class="fa fa-times remove-attachment"></i>').show();
	});
			
	$(document.body).on('click','.remove-attachment',function(){
		$(this).parent('.attachment-details').siblings('input[type=file]').val('');
		$(this).parent('.attachment-details').html('');
	});
});

setInterval(function(){ getJobsAppliedCount(); }, 10000);

function getJobsAppliedCount()
{
    $.ajax({
        url : global.base_url+'admin/User_Jobs/getUserAppliedCount',
        type: "POST",
        async: true,
        success: function(response){
                response = JSON.parse(response);
                if(response.success)
                {
                    $('.jobs_count').html(response.data.jobs_applied_count);
                }else
                        console.log('Some error Occured');
            },
            error: function(response){alert(response.responseText)}
    });	
    return false;
}
<div class="content-page">
		<!-- Start content -->
		<div class="content">
			<div class="container">
				<!-- Page-Title -->
				<div class="row">
					<div class="col-sm-12">
						<h4 class="pull-left page-title"><?=$page_title?></h4>
						<ol class="breadcrumb pull-right">
							<li><a href="#"><?=SITE_TITLE?></a></li>
							<li class="active">Chat</li>
						</ol>
					</div>
				</div>
			<div class="col-xlg-10 col-md-10">
			<div class="panel panel-default">
				
				<div class="panel-body">
					<div id="message"></div>
					<br/>

					<div id="conversation">
					<?php
					if(count($chats) > 0)
					foreach($chats as $chat): ?>
					<div class="row">
						<div class="col-xs-12">
							<strong><?php echo (!$chat->is_admin) ? $chat->fname . ' ' . $chat->lname : 'Admin' ?>: </strong>
							<span class="pull-right"><?php echo date('d-m-Y h:i A', strtotime($chat->message_time)); ?></span>
							<span style="word-break: break-word;"><?php echo $chat->message; ?></span>
						</div>
					</div>
					<?php endforeach;
					else {
						echo '<div class="alert alert-danger">No conversation found.</div>';
					} ?>
					</div>
					<br />
					
					<form id="chat_form" role="form" method="POST">
						<div class="form-group">
							<label for="chat-message">Message</label>
							<textarea class="form-control" id="msg" rows="10" placeholder="Enter your message" name="message" type="password"  required></textarea>
							<input type="hidden" name="user_id" value="<?php echo $this->uri->segment(4); ?>">
						</div>                                            
						<button id="send" name="send_message" type="submit" class="btn btn-purple waves-effect waves-light">Send Message</button>
						<input type="reset" value="Reset" class="btn btn-primary">
					</form>
				</div><!-- panel-body -->
			</div> <!-- panel -->
		</div>
	</div>
</div>

<script type="text/javascript">
	$("#send").on('click', function(e) {
		e.preventDefault();
		$.ajax({
			url: '<?php echo base_url('admin/chats/send'); ?>',
			type: 'POST',
			data: $("#chat_form").serialize(),
			success: function(response) {
				var response = JSON.parse(response);
				alert(response.message);
				if(response.success) {
					var message = $("#msg").val();
					$("#conversation").html($("#conversation").html() + '<div class="row"><div class="col-xs-12"><strong>Admin: </strong><span class="pull-right">Just Now</span><span style="word-break:break-word;">'+ message +'</span></div></div>');
					$("#msg").val("");
				}
			},
			error: function(response) {
				alert(response.status + ": " + response.statusText);
			}
		});
	});
	setInterval(function(){ if($('#msg').val() == ''){location.reload();} }, 20000);
</script>
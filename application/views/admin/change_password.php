<div id="page-wrapper" >
<br/>
	<!-- /.row -->
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-xlg-10 col-md-10">
			<div class="panel panel-info">
				<div class="panel-heading">
					Change Admin Password
				</div>
				<div class="panel-body">
					<div class="row">
						<br/>								
						<div class="col-md-1"></div>
						<div class="col-md-3">
							<div class="alert well well-sm">
								<i class="fa fa-arrow-left"></i> &nbsp;<a href="<?=base_url('admin/home')?>" class="">Go to Dashboard</a>
							</div>
						</div>								
						<div class="col-md-4">
							<div id="message"><?=$message; ?></div>									
							<form role="form" method="POST">
								<fieldset>
									<div class="form-group">
										<input class="form-control" placeholder="Current Password" name="current_password" type="password" required autofocus />
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="New Password" name="new_password" type="password" required />
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="Confirm New Password" name="re_new_password" type="password"  required />
									</div>
									<div class="form-group" style="margin-top:15px;">   
										<input name="changeprofile" type="submit" value="Update Profile" class="btn btn-primary">
										<input type="reset" value="Reset" class="btn btn-primary">
									</div>
								 </fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
function getScripts()
{
    ob_start();
?>
<script>
	setTimeout(function(){
		$('#message').hide(1000);
	},5000);
</script>
<?php

    $content = ob_get_contents();
    ob_end_clean();
    echo $content;
}
?>
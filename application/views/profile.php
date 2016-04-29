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
						<li class="active">Profile</li>
					</ol>
				</div>
			</div>
		<div class="col-xlg-10 col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						Change User profile [ <?php echo $this->session->userdata('user_name')?> ]
					</h3>
				</div>
				<div class="panel-body">
					<div id="message"><?=$message; ?></div>
					<hr/>
					<form role="form" method="POST">
						<div class="form-group">
							<label for="admin_fname">First Name</label>
							<input class="form-control" required placeholder="First Name" name="user_fname" type="text" value="<?=$this->session->userdata('fname')?>" autofocus />
						</div>
						<div class="form-group">
							<label for="admin_lname">Last Name</label>
							<input class="form-control" placeholder="Last Name" name="user_lname" type="text" value="<?=$this->session->userdata('lname')?>" />
						</div>
						<div class="form-group">
							<label for="admin_lname">Email</label>
							<input class="form-control" placeholder="Email" name="user_email" type="email" value="<?=$this->session->userdata('email')?>" required />
						</div>
						<button name="changeprofile" type="submit" class="btn btn-purple waves-effect waves-light">Update Profile</button>
					</form>
				</div><!-- panel-body -->
			</div> <!-- panel -->
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
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
                                    <li class="active">Settings</li>
                                </ol>
                            </div>
                        </div>
                	<div class="col-xlg-10 col-md-10">
                				<div class="panel panel-default">
                                    
                                    <div class="panel-body">
                                    	<div id="message"><?=$message; ?></div>
                                    	<br/>
                                        <form role="form" method="POST">
                                            <div class="form-group">
                                                <label for="admin_fname">Current Password</label>
                                                <input class="form-control" placeholder="Current Password" name="current_password" type="password" required autofocus />
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_lname">New Password</label>
                                                <input class="form-control" placeholder="New Password" name="new_password" type="password" required />
                                            </div>
                                            <div class="form-group">
                                            	<label for="admin_lname">Confirm New Password</label>
                                                <input class="form-control" placeholder="Confirm New Password" name="re_new_password" type="password"  required />
                                            </div>                                            
                                            <button name="changeprofile" type="submit" class="btn btn-purple waves-effect waves-light">Update Password</button>
                                            <input type="reset" value="Reset" class="btn btn-primary">
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                    
				</div>
			</div>
			<script>
				setTimeout(function(){
					$('#message').hide(1000);
				},5000);
			</script>
		</div>
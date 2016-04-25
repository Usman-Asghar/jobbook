 <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        
		<div class="navbar-header">
			<a href="<?=base_url()?>" id="logo" ><img src="<?=assets_url('img/site_logo.jpg')?>" class="img-responsive" alt="Logo"></a>
        </div>
               <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right" style="margin-left:100px;">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" title="Click to expand">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
							<a href="<?php echo site_url('home/profile');?>"><i class="fa fa-user fa-fw"></i> Manage Profile</a>
                        </li>
                        <li>
							<a href="<?php echo site_url('home/change-password');?>"><i class="glyphicon glyphicon-retweet" style="color:#F00;"></i> Change Password</a>
						</li>                        
						<li class="divider"></li>                        
                        <li><a href="<?php echo site_url('home/logout');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

        </nav>
        <!-- /.navbar-static-top -->
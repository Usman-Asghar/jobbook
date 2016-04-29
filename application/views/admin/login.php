<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="Concept One Studios, changing the way events are celebrated">
        <meta name="author" content="Techvando">

        <link rel="shortcut icon" href="<?=assets_url('images/favicon_1.ico');?>">

        <title>Admin Login</title>

        <?=link_tag('admin/css/bootstrap.min.css');?>
        <?=link_tag('admin/css/core.css');?>
        <?=link_tag('admin/css/icons.css');?>
        <?=link_tag('admin/css/components.css');?>
        <?=link_tag('admin/css/pages.css');?>
        <?=link_tag('admin/css/menu.css');?>
        <?=link_tag('admin/css/responsive.css');?>
		
        <?=script_tag('admin/js/modernizr.min.js');?>
		
        <script type="text/javascript">
            var global = { base_url : "<?=base_url(); ?>" }
        </script>
    </head>
    <body>
        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> Sign In to <strong>Jobs Book</strong> </h3>
					<h3 class="text-center m-t-10 text-white"><strong>Admin login</strong> </h3>
                </div> 
				
                <div class="panel-body">
                <div id="errors"></div>
                <form class="form-horizontal m-t-20" method="POST" id="loginForm">                    
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="email" required="" id="email" placeholder="Login Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="password" required="" id="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                    <div class="form-group m-t-30">
                        <div class="col-sm-7">
                            <a href="#"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                        </div>                        
                    </div>
                </form> 
                </div>
            </div>
        </div>
        <!-- Main  -->
        <?=script_tag('admin/js/jquery.min.js');?>
        <?=script_tag('admin/js/bootstrap.min.js');?>
        <?=script_tag('admin/js/waves.js');?>
        <?=script_tag('admin/js/login.js');?>
	</body>
</html>
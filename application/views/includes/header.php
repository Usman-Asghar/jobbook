<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title><?=$page_title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!--[if lt IE 9]> <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="shortcut icon" href="img/favicon.html">
    <?=link_tag('user/css/bootstrap.css');?>
    <?=link_tag('user/font-awesome/css/font-awesome.min.css');?>
    <?=link_tag('user/foundation-icons/foundation-icons.css');?>
    <?=link_tag('user/css/animate.min.css');?>
    <?=link_tag('user/css/slidebars.css');?>
    <?=link_tag('user/css/fancySelect.css');?>
    <?=link_tag('user/css/style.css');?>
    <?=link_tag('user/css/facebox.css');?>
    
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:700italic,700,500italic,500,400italic,400,300italic,300' rel='stylesheet' type='text/css'>
    <script type="text/javascript">
        var global = { base_url : "<?=base_url(); ?>" }
    </script>
</head>
<?php  ?>
<body>
    <div id="mask">
        <div id="loader"> </div>
    </div>
    <header class="sb-slidebar sb-left">
        <nav class="main-menu">
            <ul>
                <li><a href="<?=  base_url('main')?>" <?php if(isset($status)){if($status==1){echo "class='active'";}} ?>>HOME</a>
                </li>
                <!--<li><a href="<?=  base_url('main/about')?>" <?php if(isset($status)){if($status==2){echo "class='active'";}} ?>>ABOUT</a>
                </li>
                <li><a href="<?=  base_url('main/contact')?>" <?php if(isset($status)){if($status==3){echo "class='active'";}} ?>>Contact</a>
                </li>-->
                <?php
                if($this->session->userdata('user_logged_in'))
                {
                ?>
                    <li><a href="<?=  base_url('jobs')?>" <?php if(isset($status)){if($status==4){echo "class='active'";}} ?>>Open Jobs</a>
                    </li>
                    <li><a href="<?=  base_url('jobs/applied_jobs')?>" <?php if(isset($status)){if($status==5){echo "class='active'";}} ?>>Applied Jobs</a>
                    </li>
                    <li><a href="<?=  base_url('chats')?>" <?php if(isset($status)){if($status==6){echo "class='active'";}} ?>>Chat</a>
                    </li>
                    <!--<li><a href="<?=  base_url('main/profile')?>" >Profile</a>
                    </li>-->
                    <li><a href="<?=  base_url('main/logout')?>">Logout</a>
                    </li>
                <?php
                }
                else
                {
                ?>
                <li><a href="<?=  base_url('main/login')?>" data-popup="facebox">Login</a>
                </li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </header>
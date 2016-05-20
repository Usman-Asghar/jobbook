<div class="wrapper" id="sb-site">
    <section class="header-area-inner">
        <div class="container">
            <div class="navigation-area clearfix">
                <a class="sb-toggle-left inner-page"> <span></span> <span></span> <span></span> </a>
                <div class="inner-logo-area">
                    <a href="index.html"><img src="<?=assets_url('user/img/logo.png');?>" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="inner-headings">
        <div class="container text-center">
            <h3 class="animated" data-animation="fadeInUp" data-animation-delay="100">Login</h3>
            <h5 class="uppercase animated" data-animation="fadeInUp" data-animation-delay="200">You can login here for jobs</h5>
            <hr class="animated" data-animation="fadeInUp" data-animation-delay="300"> </div>
    </section>
    <section class="inner-full-cont">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12 full-width-area">
                    <div class="job-submission-form">
                        <div id="errors"></div>
                        <form method="POST" id="loginForm">
                            <p>
                                <label>Email</label>
                                <input type="text" class="input-area"  type="email" required="" id="email" placeholder="Login Email"> </p>
                            <p>
                                <label>Password</label>
                                <input class="input-area" type="password" required="" id="password" placeholder="Password"> </p>
                            <p>
                                <label></label>
                                <input type="submit" value="Login" class="input-button"> </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
function getScripts()
{
ob_start();
?>
<?=script_tag('user/js/login.js');?>
<?php
    $content = ob_get_contents();
    ob_end_clean();
    echo $content;
}
?>
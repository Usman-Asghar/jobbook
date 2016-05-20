<div class="wrapper" id="sb-site">
    <section class="header-area-inner">
        <div class="container">
            <div class="navigation-area clearfix">
                <a class="sb-toggle-left inner-page"> <span></span> <span></span> <span></span> </a>
                <div class="inner-logo-area">
                    <a href="index.html"><img src="<?=assets_url('user/img/logo.png');?>" alt="">
                    </a>
                </div>
                <div class="right-navigation-inner clearfix">
                    <div class="top-inner-prof">
                        <a href="#" class="profile-link clearfix"> <span class="prof-img"><img src="<?=assets_url('user/img/prof-01.jpg');?>" alt=""></span> <span class="prof-name">ResponsiveExperts</span> </a>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
    <section class="inner-headings">
        <div class="container">
            <h3 class="animated" data-animation="fadeInUp" data-animation-delay="100">Contact</h3>
            <h5 class="uppercase animated" data-animation="fadeInUp" data-animation-delay="200">Lorem ipsum dolor sit amet, consectetur adipisicing</h5>
            <hr class="animated" data-animation="fadeInUp" data-animation-delay="300"> </div>
    </section>
    <section id="map"></section>
    <section class="inner-main-cont">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-6">
                    <h5 class="uppercase animated" data-animation="fadeInUp" data-animation-delay="100">Lorem ipsum dolor sit amet, consecteturelit,</h5>
                    <form class="contact-form">
                        <p class="animated" data-animation="fadeInUp" data-animation-delay="100">
                            <label>Email</label>
                            <input type="text" class="input-area"> </p>
                        <p class="animated" data-animation="fadeInUp" data-animation-delay="200">
                            <label>Title</label>
                            <input type="text" class="input-area"> </p>
                        <p class="animated" data-animation="fadeInUp" data-animation-delay="300">
                            <label>Message</label>
                            <textarea cols="10" rows="15" class="text-area"></textarea>
                        </p>
                        <p class="animated" data-animation="fadeInUp" data-animation-delay="400">
                            <input type="button" value="Send" class="input-button"> </p>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="contact-address">
                        <h3 class="animated" data-animation="fadeInUp" data-animation-delay="100">Location</h3>
                        <h5 class="animated" data-animation="fadeInUp" data-animation-delay="200">Lorem ipsum dolor sit amet,</h5> <address class="animated" data-animation="fadeInUp" data-animation-delay="300"> <p> <i class="fi-marker"></i> <span>1234 Heaven Stress, Beverly Hill OldYork- <br>United State</span> </p><p> <i class="fi-telephone"></i> <span>(800) 0123 4567 890</span> </p><p> <i class="fi-mail"></i> <span>boutique@email.com</span> </p></address> </div>
                </div>
            </div>
        </div>
    </section>
    <section class="got-a-question">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-3 call-us-head animated" data-animation="fadeInLeft" data-animation-delay="200">
                    <h3>Got a Question?</h3>
                </div>
                <div class="col-md-6 call-us-txt animated" data-animation="fadeInUp" data-animation-delay="300">
                    <p>Send us an email or call us at 1 800 555 5555</p>
                </div>
                <div class="col-md-3 call-us-link animated" data-animation="fadeInRight" data-animation-delay="200"><a href="contact.html" class="call-us-btn">CONTACT NOW</a>
                </div>
            </div>
        </div>
    </section>
    <section class="app-download-main">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-8 down-txt-cont animated" data-animation="fadeInLeft" data-animation-delay="200">
                    <h3>Get JobHunt Applications</h3>
                    <h5 class="uppercase">Available on everything you use every day.</h5>
                    <hr>
                    <div class="download-txt">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in </p><a href="#" class="lined-btns"><i class="fi-social-apple"></i>IOS APP</a> <a href="#" class="lined-btns"><i class="fi-social-android"></i>ANDROID</a> </div>
                </div>
                <div class="col-md-4 down-img-cont animated" data-animation="fadeInRight" data-animation-delay="200">
                    <div class="image-outer"><img src="<?=assets_url('user/img/iphone.png');?>" alt="">
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
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<?=script_tag('user/js/map-settings.js');?>
<?php
    $content = ob_get_contents();
    ob_end_clean();
    echo $content;
}
?>
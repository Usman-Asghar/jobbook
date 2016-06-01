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
        <div class="container text-left">
            <div class="alert alert-success alert-dismissable" id="success_message"></div>
            <div class="alert alert-danger alert-dismissable" id="error_message"></div>
            <div class="row clearfix">
                <div class="profile-head-area clearfix">
                    <div class="profile-photo"><img src="<?=assets_url('user/img/Job-Description.jpg');?>" alt="">
                    </div>
                    <div class="prof-headings">
                        <h3 class="animated" data-animation="fadeInUp" data-animation-delay="100"><?php echo $jobs->job_title;?></h3>
                        <h5 class="uppercase animated" data-animation="fadeInUp" data-animation-delay="200"><i class="fi-mountains"></i> <?php echo $jobs->grade_name;?></h5>
                        <hr class="animated" data-animation="fadeInUp" data-animation-delay="300"> </div>
                </div>
                <?php if($jobs->assigned_to == 0): ?>
                    <div class="profile-btns-main"> <a class="apply-btn" href="javascript:;" onclick="add_by_get_method('<?=base_url('jobs/apply_for_job');?>',<?=$jobs->job_id;?>)">Apply</a></div>
                <?php endif; ?>
                
            </div>
        </div>
    </section>
    <section class="inner-full-cont">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12 full-width-area">
                    <div id="tab-container" class="tab-container animated" data-animation="fadeInUp" data-animation-delay="100">
                        <div class="panel-container">
                            <div class="tab-cont">
                                <ul class="info-list clearfix">
                                    <li>
                                        <label><i class="fi-calendar"></i> Posted on</label> <span><?=date('M-d-Y', strtotime(str_replace('-','/', $jobs->date_entered)));?></span>
                                    </li>
                                    <li>
                                        <label><i class="fi-database"></i> Status</label> <?php if($jobs->job_status == 1){ echo '<span class="info-btn">Active</span>'; } else { echo '<span class="info-btn">Inactive</span>'; }?>
                                    </li>
                                    <li>
                                        <label><i class="fi-calendar"></i> Deadline</label> <span><?=date('M-d-Y', strtotime(str_replace('-','/', $jobs->deadline_date)));?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <p><a class="lined-tab overview-btn animated" data-animation="fadeInUp" data-animation-delay="100">Overview</a>
                    </p>
                    <div class="overview-detail animated" data-animation="fadeInUp" data-animation-delay="200">
                        <?php echo $jobs->job_desc;?>
                    </div>
                </div>
                <div class="col-md-12 job-listing-full">
                    <div class="job-list-head clearfix animated" data-animation="fadeInUp" data-animation-delay="100">
                        <div class="title-big">relate jobs</div>
                    </div>
                    <ul class="job-listings">
                        <li class="animated" data-animation="fadeInUp" data-animation-delay="100">
                            <div class="title"> <span class="prof-photo"><a href="#"><img src="<?=assets_url('user/img/prof-01.jpg');?>" alt=""></a></span> <span class="designation"> <a href="#">GRAPHIC DESIGNER</a><br>5Goat Corporation </span> </div>
                            <div class="location">California, USA</div>
                            <div class="create">10 mins ago</div>
                        </li>
                        <li class="animated" data-animation="fadeInUp" data-animation-delay="100">
                            <div class="title"> <span class="prof-photo"><a href="#"><img src="<?=assets_url('user/img/prof-02.jpg');?>" alt=""></a></span> <span class="designation"> <a href="#">wordpress developer</a><br>Behance </span> </div>
                            <div class="location">New York, USA</div>
                            <div class="create">2 days ago</div>
                        </li>
                        <li class="animated" data-animation="fadeInUp" data-animation-delay="100">
                            <div class="title"> <span class="prof-photo"><a href="#"><img src="<?=assets_url('user/img/prof-03.jpg');?>" alt=""></a></span> <span class="designation"> <a href="#">web designer</a><br>Dribbble </span> </div>
                            <div class="location">California, USA</div>
                            <div class="create">3 days ago</div>
                        </li>
                        <li class="animated" data-animation="fadeInUp" data-animation-delay="100">
                            <div class="title"> <span class="prof-photo"><a href="#"><img src="<?=assets_url('user/img/prof-04.jpg');?>" alt=""></a></span> <span class="designation"> <a href="#">MEAN developer</a><br>Themeforest </span> </div>
                            <div class="location">New York, USA</div>
                            <div class="create">05-02-2015</div>
                        </li>
                        <li class="animated" data-animation="fadeInUp" data-animation-delay="100">
                            <div class="title"> <span class="prof-photo"><a href="#"><img src="<?=assets_url('user/img/prof-05.jpg');?>" alt=""></a></span> <span class="designation"> <a href="#">print designer</a><br>Themeforest </span> </div>
                            <div class="location">New York, USA</div>
                            <div class="create">05-02-2015</div>
                        </li>
                    </ul>
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
<?=script_tag('user/js/jquery.easytabs.min.js');?>
<?=script_tag('user/js/common.js');?>
<?php
    $content = ob_get_contents();
    ob_end_clean();
    echo $content;
}
?>
<div class="wrapper" id="sb-site">
    <section class="header-area-inner">
        <div class="container">
            <div class="navigation-area clearfix">
                <a class="sb-toggle-left inner-page"> <span></span> <span></span> <span></span> </a>
                <div class="inner-logo-area">
                    <a href="index.html"><img src="<?=assets_url('user/img/logo.png');?>" alt="">
                    </a>
                </div>
                <div class="right-navigation">
                    <ul>
                        <?php
                        if($this->session->userdata('user_logged_in'))
                        {
                        ?>
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
                </div>
            </div>
        </div>
    </section>
    <section class="jobs-area">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="headings-area">
                    <div class="alert alert-success alert-dismissable" id="success_message"></div>
                    <div class="alert alert-danger alert-dismissable" id="error_message"></div>
                    <div class="job-list-head clearfix animated" data-animation="fadeInUp" data-animation-delay="100">
                        <div class="title">job title</div>
                        <div class="location">Create at</div>
                        <div class="create">Deadline</div>
                        <div class="actions"> Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Actions</div>
                    </div>
                    <?php if(!$jobs): ?>
                        <ul class="job-listings">
                            <li style="color:#a94442;font-size: 24px;">No Jobs Available!</li>
                        </ul>
                    <?php endif; ?>
                    <?php foreach($jobs as $job): ?>
                        <ul class="job-listings">
                            <li class="animated" data-animation="fadeInUp" data-animation-delay="100">
                                <div class="title"> <span class="prof-photo"><a href="single.html"><img src="<?=assets_url('user/img/job.png');?>" alt=""></a></span> <span class="designation"> <a href="single.html"><?=$job->job_title?></a><br><?=$job->grade_name?></span> </div>
                                <div class="location"><?=date('M-d-Y', strtotime(str_replace('-','/', $job->date_entered)));?></div>
                                <div class="create"><?=date('M-d-Y', strtotime(str_replace('-','/', $job->deadline_date)));?></div>
                                <div class="actions"><?php if($job->approved == 0 && $job->rejected == 0){ ?> <span class="btn btn-primary">Pending </span><?php } else if($job->approved == 1 && $job->rejected == 0){ ?> <span class="btn btn-success">Approved </span><?php } else if($job->approved == 0 && $job->rejected == 1){ ?> <span class="btn btn-danger">Rejected </span><?php } ?> <a style="margin-left: 30px;" class="btn btn-primary" href="<?=base_url('jobs/job_apply/'.$job->job_id.'')?>">Job Details</a></div>
                            </li>
                        </ul>
                    <?php endforeach; ?>
                </div>
                <div class="col-md-12 job-breadcrumbs animated" data-animation="fadeInUp" data-animation-delay="100">
                    <ul class="breadcrumbs">
                        <?=$pagination;?>
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
<?=script_tag('user/js/common.js');?>
<?php

    $content = ob_get_contents();
    ob_end_clean();
    echo $content;
}
?>
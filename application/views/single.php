<?=link_tag('admin/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');?>
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
            <div class="row clearfix">
                <div class="profile-head-area clearfix">
                    <div class="profile-photo"><img src="<?=assets_url('user/img/Job-Description.jpg');?>" alt="">
                    </div>
                    <div class="prof-headings">
                        <h3 class="animated" data-animation="fadeInUp" data-animation-delay="100"><?php echo $jobs->job_title;?></h3>
                        <h5 class="uppercase animated" data-animation="fadeInUp" data-animation-delay="200"><i class="fi-mountains"></i> <?php echo $jobs->grade_name;?></h5>
                        <hr class="animated" data-animation="fadeInUp" data-animation-delay="300"> </div>
                </div>
                <?php if(!isset($jobs->approved)): ?>
                    <div class="profile-btns-main"> <a href="#" class="apply-btn" id="job_apply_button" data-toggle="modal" data-target="#jobApplyModal" data-job_id="<?=$jobs->job_id;?>">Apply</a></div>
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
                        <div class="title-big">Public Attachments</div>
                    </div>                    
                    <ul class="job-listings">
                        <?php if(!$public_attachments): ?>
                            <li style="color:#a94442;font-size: 24px;">No Jobs Available!</li>
                        <?php endif; ?>
                        <?php foreach($public_attachments as $public_files): ?>
                        <li class="animated" data-animation="fadeInUp" data-animation-delay="100">
                            <div class="title"> <span class="prof-photo"><a href="#"><img src="<?=assets_url('user/img/file.png');?>" alt=""></a></span> <span class="designation"><?=$public_files->file_name;?><br></span> </div>
                            <div class="location"></div>
                            <div class="create"></div>
                            <div class="create"><a href="<?=base_url('jobs/download/'.$public_files->file_address.'')?>">Download</a></div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php if(isset($jobs->approved) && $jobs->approved==1): ?>
                <div class="col-md-12 job-listing-full">
                    <div class="job-list-head clearfix animated" data-animation="fadeInUp" data-animation-delay="100">
                        <div class="title-big">Private Attachments</div>
                    </div>                    
                    <ul class="job-listings">
                        <?php if(!$private_attachments): ?>
                            <li style="color:#a94442;font-size: 24px;">No Jobs Available!</li>
                        <?php endif; ?>
                        <?php foreach($private_attachments as $private_files): ?>
                        <li class="animated" data-animation="fadeInUp" data-animation-delay="100">
                            <div class="title"> <span class="prof-photo"><a href="#"><img src="<?=assets_url('user/img/file.png');?>" alt=""></a></span> <span class="designation"><?=$private_files->file_name;?></span> </div>
                            <div class="location"></div>
                            <div class="create"></div>
                            <div class="create"><a href="<?=base_url('jobs/download/'.$private_files->file_address.'')?>">Download</a></div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
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
<?=script_tag('admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');?>
<?=script_tag('user/js/jquery.easytabs.min.js');?>
<?=script_tag('user/js/common.js');?>
<div class="modal fade" id="jobApplyModal" tabindex="-1" role="dialog" aria-labelledby="jobApplyModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Apply for Job</h4>
      </div>
    <div class="alert alert-success alert-dismissable" id="success_message"></div>
    <div class="alert alert-danger alert-dismissable" id="error_message"></div>
    <form name="add_form" id="add_form" onsubmit="return add_item('<?=base_url('jobs/apply_for_job');?>');" >
      <div class="modal-body">
          <input type="hidden" class="form-control" id="jobId" name="jobId">
          <div class="form-group">
            <label for="start_date" class="control-label">Start Date</label>
            <input type="text" class="form-control" id="start_date" name="start_date" required="required">
          </div>
          <div class="form-group">
            <label for="end_date" class="control-label">End Date</label>
            <input type="text" class="form-control" id="end_date" name="end_date" required="required">
          </div>
          <div class="form-group">
            <label for="no_of_hours" class="control-label">No of Hous</label>
            <input type="number" class="form-control" id="no_of_hours" name="no_of_hours" required="required">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" name="submit" class="btn btn-primary" id="submit" value="Submit"/>
      </div>
    </form>
    </div>
  </div>
</div>
<script>
$('#start_date, #end_date').datepicker();
$('#job_apply_button').on('click', function() 
{
  var button = $('#job_apply_button');
  var job_id = button.data('job_id');
   $('#jobId').val(job_id);
});

</script>
<?php
    $content = ob_get_contents();
    ob_end_clean();
    echo $content;
}
?>
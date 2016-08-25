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
                    <div id="conversation">
                        <?php
                        if(count($chats) > 0)
                        foreach($chats as $chat): ?>
                        <div class="row">
                            <div class="col-xs-12">
                                <strong><?php echo (!$chat->is_admin) ? $chat->fname . ' ' . $chat->lname : 'Admin' ?>: </strong>
                                <span class="pull-right"><?php echo date('d-m-Y h:i A', strtotime($chat->message_time)); ?></span>
                                <span style="word-break: break-word;"><?php echo $chat->message; ?></span>
                            </div>
                        </div>
                        <?php endforeach;
                        else {
                            echo '<div class="alert alert-danger">No conversation found.</div>';
                        } ?>
                        </div>
                        <br />
                        
                        <form id="chat_form" role="form" method="POST">
                            <div class="form-group">
                                <label for="chat-message">Message</label>
                                <textarea class="form-control" id="msg" rows="10" placeholder="Enter your message" name="message" type="password"  required></textarea>
                            </div>                                            
                            <button id="send" name="send_message" type="submit" class="btn btn-purple waves-effect waves-light">Send Message</button>
                            <input type="reset" value="Reset" class="btn btn-primary">
                        </form>
                    </div>
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
    $ci = &get_instance();
?>
<?=script_tag('user/js/common.js');?>
<?php
    echo '
<script type="text/javascript">
    $("#send").on("click", function(e) {
        e.preventDefault();
        $.ajax({
            url: "'.base_url('chats/send').'",
            type: "POST",
            data: $("#chat_form").serialize(),
            success: function(response) {
                var response = JSON.parse(response);
                alert(response.message);
                if(response.success) {
                    var message = $("#msg").val();
                    $("#conversation").html($("#conversation").html() + \'<div class="row"><div class="col-xs-12"><strong>'.$ci->session->userdata('name').': </strong><span class="pull-right">Just Now</span><span style="word-break: break-word;">\'+ message +\'</span></div></div>\');
                    $("#msg").val("");
                }
            },
            error: function(response) {
                alert(response.status + ": " + response.statusText);
            }
        });
    });
    setInterval(function(){ if($("#msg").val() == ""){location.reload();} }, 20000);
</script>';

    $content = ob_get_contents();
    ob_end_clean();
    echo $content;
}
?>
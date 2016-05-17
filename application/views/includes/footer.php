<footer class="footer-main">
       <div class="container">
           <div class="row clearfix">
               <div class="col-md-2 social-area animated" data-animation="fadeInUp" data-animation-delay="100">
                   <ul class="social-main">
                       <li><a href="#"><i class="fi-social-facebook"></i></a>
                       </li>
                       <li><a href="#"><i class="fi-social-linkedin"></i></a>
                       </li>
                       <li><a href="#"><i class="fi-social-pinterest"></i></a>
                       </li>
                   </ul>
               </div>
               <div class="col-md-10 footer-conts">
                   <h3 class="animated" data-animation="fadeInUp" data-animation-delay="100">JobHunt is currently free!</h3>
                   <h5 class="uppercase animated" data-animation="fadeInUp" data-animation-delay="200">All job listings will be free of charge until further notice.</h5>
                   <hr class="animated" data-animation="fadeInUp" data-animation-delay="300">
                   <br>
                   <div class="subscribe-form clearfix animated" data-animation="fadeInUp" data-animation-delay="200">
                       <form>
                           <input type="text" class="subscribe-input" placeholder="Subscribe to get lastest news..">
                           <button type="button" class="subscribe-btn"><i class="fi-arrow-right"></i>
                           </button>
                       </form>
                   </div>
                   <ul class="footer-menu animated" data-animation="fadeInUp" data-animation-delay="200">
                       <li><a href="#">FIND A JOB</a>
                       </li>
                       <li><a href="#">POST A JOB</a>
                       </li>
                       <li><a href="#">ABOUT</a>
                       </li>
                       <li><a href="#">SUPPORT</a>
                       </li>
                       <li><a href="#">POLICY</a>
                       </li>
                   </ul>
                   <p class="animated" data-animation="fadeInUp" data-animation-delay="200">&copy; 2015 <a href="#">JobHunt</a>. All Rights Reserved </p>
               </div>
           </div>
       </div>
   </footer>
</div>
<?=script_tag('user/js/jquery.js');?>
<?=script_tag('user/js/bootstrap.js');?>
<?=script_tag('user/js/slidebars.js');?>
<?=script_tag('user/js/fancySelect.js');?>
<?=script_tag('user/js/jquery.appear.js');?>
<?=script_tag('user/js/settings.js');?>
<?=script_tag('user/js/facebox.js');?>
<script type="text/javascript">
   jQuery(document).ready(function($) {
       $('a[data-popup*=facebox]').facebox({
           opacity: 0.9,
           loadingImage: 'assets/user/img/loading.gif',
           closeImage: 'assets/user/img/closelabel.png'
       });
   });
</script>
<?=script_tag('user/js/jquery.flexslider.js');?>
<script type="text/javascript">
   $('.banner-slider').flexslider({
       animation: "fade",
       start: function(slider) {
           $('body').removeClass('loading');
       }
   });
</script>
<?=script_tag('user/js/styleswitcher.js');?>
<?php
    if(function_exists('getScripts'))
    {
            $scripts = getScripts();
    }
?>
</body>
<!-- Mirrored from responsiveexpert.com/themes/jobhunt/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 May 2016 15:49:23 GMT -->

</html>
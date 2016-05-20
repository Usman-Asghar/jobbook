
      <div class="wrapper" id="sb-site">
         <section class="header-area about-banner">
            <div class="container">
               <div class="navigation-area clearfix">
                  <a class="sb-toggle-left"> <span></span> <span></span> <span></span> </a> 
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
                            <li><a href="<?=  base_url('main/register')?>">Register</a>
                            </li>
                            <?php
                            }
                        ?>
                    </ul>
                  </div>
               </div>
               <div class="logo-area"><a href="index.html"><img src="<?=assets_url('user/img/logo.png');?>" alt=""></a></div>
               <div class="banner-conts">
                  <h1>We are professionals</h1>
                  <div class="post-job"><a href="submit-job.html" class="post-job-btn">POST A JOB</a></div>
               </div>
            </div>
            <div id="login-box">
               <h3>Login</h3>
               <hr>
               <form>
                  <p> <label>Email</label> <input type="text" class="input-area"> </p>
                  <p> <label>Password</label> <input type="password" class="input-area"> </p>
                  <p class="check-box"> <input id="checkbox1" type="checkbox" name="checkbox" value=""><label for="checkbox1"><span></span>Remember me</label> </p>
                  <p> <input type="button" value="Login" class="input-button"> <span>Not member? </span><a href="#">Sign Up</a> </p>
               </form>
            </div>
         </section>
         <section class="inner-headings">
            <div class="container text-center">
               <h3 class="animated" data-animation="fadeInUp" data-animation-delay="100">About JobHunt</h3>
               <h5 class="uppercase animated" data-animation="fadeInUp" data-animation-delay="200">A Perfect Job Listing Theme</h5>
               <hr class="animated" data-animation="fadeInUp" data-animation-delay="300">
            </div>
         </section>
         <section class="inner-full-cont">
            <div class="container">
               <div class="row clearfix">
                  <div class="col-md-12 full-width-area text-center">
                     <h2><br>Who We Are ?</h2>
                     <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h5>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Lorem ipsum dolor sit amet. </p>
                     <div class="col-conts clearfix">
                        <div class="col-md-4">
                           <i class="fa fa-cogs"></i> 
                           <h5>Easy to Handle</h5>
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div class="col-md-4">
                           <i class="fa fa-gift"></i> 
                           <h5>Perfect Gift For You</h5>
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div class="col-md-4">
                           <i class="fa fa-pie-chart"></i> 
                           <h5>User Friendly</h5>
                           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="how-it-works">
            <div class="container">
               <h3 class="animated" data-animation="fadeInUp" data-animation-delay="100">How JobHunt Work?</h3>
               <h5 class="uppercase animated" data-animation="fadeInUp" data-animation-delay="200">if you purchase this psd you will get happy &amp; hurry up</h5>
               <hr class="animated" data-animation="fadeInUp" data-animation-delay="300">
               <br>
               <p class="animated" data-animation="fadeInLeft" data-animation-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit.</p>
               <div class="laptop-img animated" data-animation="fadeInRight" data-animation-delay="100"><img src="<?=assets_url('user/img/laptop-img.png');?>" alt=""></div>
            </div>
         </section>
         <section class="happy-campers-main">
            <div class="container">
               <h3 class="animated" data-animation="fadeInUp" data-animation-delay="100">Happy Campers</h3>
               <h5 class="uppercase animated" data-animation="fadeInUp" data-animation-delay="200">What other people thought about the service provided by jobhunt</h5>
               <hr>
               <div class="testimonial-main">
                  <div id="test1" class="testimonial-single animated" data-animation="fadeInUp" data-animation-delay="100">
                     <div class="txt-cont-qu">
                        <p>&quot; Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore ex ea commodo consequat. &quot;</p>
                     </div>
                     <h6>KIDESIGNER - 5GOAT CORP</h6>
                  </div>
                  <div id="test2" class="testimonial-single animated" data-animation="fadeInUp" data-animation-delay="100">
                     <div class="txt-cont-qu">
                        <p>&quot; Excellent service offering a personal touch, if I had an issue they were no longer than a phone call away and were always quick to respond. &quot;</p>
                     </div>
                     <h6>Responsive Expert - Reowix Technologies</h6>
                  </div>
                  <div id="test3" class="testimonial-single animated" data-animation="fadeInUp" data-animation-delay="100">
                     <div class="txt-cont-qu">
                        <p>&quot; At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores. &quot;</p>
                     </div>
                     <h6>MarksMom - Sea Corp</h6>
                  </div>
                  <div id="test4" class="testimonial-single animated" data-animation="fadeInUp" data-animation-delay="100">
                     <div class="txt-cont-qu">
                        <p>&quot; Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore ex ea commodo consequat. &quot;</p>
                     </div>
                     <h6>KIDESIGNER - 5GOAT CORP</h6>
                  </div>
                  <div id="test5" class="testimonial-single animated" data-animation="fadeInUp" data-animation-delay="100">
                     <div class="txt-cont-qu">
                        <p>&quot; Excellent service offering a personal touch, if I had an issue they were no longer than a phone call away and were always quick to respond. &quot;</p>
                     </div>
                     <h6>Responsive Expert - Reowix Technologies</h6>
                  </div>
                  <div id="test6" class="testimonial-single active animated" data-animation="fadeInUp" data-animation-delay="100">
                     <div class="txt-cont-qu">
                        <p>&quot; At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores. &quot;</p>
                     </div>
                     <h6>MarksMom - Sea Corp</h6>
                  </div>
                  <div id="test7" class="testimonial-single animated" data-animation="fadeInUp" data-animation-delay="100">
                     <div class="txt-cont-qu">
                        <p>&quot; Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore ex ea commodo consequat. &quot;</p>
                     </div>
                     <h6>KIDESIGNER - 5GOAT CORP</h6>
                  </div>
                  <div id="test8" class="testimonial-single animated" data-animation="fadeInUp" data-animation-delay="100">
                     <div class="txt-cont-qu">
                        <p>&quot; Excellent service offering a personal touch, if I had an issue they were no longer than a phone call away and were always quick to respond. &quot;</p>
                     </div>
                     <h6>Responsive Expert - Reowix Technologies</h6>
                  </div>
                  <div id="test9" class="testimonial-single animated" data-animation="fadeInUp" data-animation-delay="100">
                     <div class="txt-cont-qu">
                        <p>&quot; At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores. &quot;</p>
                     </div>
                     <h6>MarksMom - Sea Corp</h6>
                  </div>
                  <div id="test10" class="testimonial-single animated" data-animation="fadeInUp" data-animation-delay="100">
                     <div class="txt-cont-qu">
                        <p>&quot; Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore ex ea commodo consequat. &quot;</p>
                     </div>
                     <h6>KIDESIGNER - 5GOAT CORP</h6>
                  </div>
                  <div id="test11" class="testimonial-single animated" data-animation="fadeInUp" data-animation-delay="100">
                     <div class="txt-cont-qu">
                        <p>&quot; Excellent service offering a personal touch, if I had an issue they were no longer than a phone call away and were always quick to respond. &quot;</p>
                     </div>
                     <h6>Responsive Expert - Reowix Technologies</h6>
                  </div>
               </div>
               <ul class="campers-all">
                  <li class="animated" data-animation="flipInY" data-animation-delay="100"><a href="#test1"><img src="<?=assets_url('user/img/prof-01.jpg');?>" alt=""></a></li>
                  <li class="animated" data-animation="flipInY" data-animation-delay="200"><a href="#test2"><img src="<?=assets_url('user/img/prof-02.jpg');?>" alt=""></a></li>
                  <li class="animated" data-animation="flipInY" data-animation-delay="300"><a href="#test3"><img src="<?=assets_url('user/img/prof-03.jpg');?>" alt=""></a></li>
                  <li class="animated" data-animation="flipInY" data-animation-delay="400"><a href="#test4"><img src="<?=assets_url('user/img/prof-04.jpg');?>" alt=""></a></li>
                  <li class="animated" data-animation="flipInY" data-animation-delay="500"><a href="#test5"><img src="<?=assets_url('user/img/prof-05.jpg');?>" alt=""></a></li>
                  <li class="animated" data-animation="flipInY" data-animation-delay="600"><a href="#test6" class="active"><img src="<?=assets_url('user/img/prof-06.jpg');?>" alt=""></a></li>
                  <li class="animated" data-animation="flipInY" data-animation-delay="700"><a href="#test7"><img src="<?=assets_url('user/img/prof-07.jpg');?>" alt=""></a></li>
                  <li class="animated" data-animation="flipInY" data-animation-delay="800"><a href="#test8"><img src="<?=assets_url('user/img/prof-08.jpg');?>" alt=""></a></li>
                  <li class="animated" data-animation="flipInY" data-animation-delay="900"><a href="#test9"><img src="<?=assets_url('user/img/prof-01.jpg');?>" alt=""></a></li>
                  <li class="animated" data-animation="flipInY" data-animation-delay="1000"><a href="#test10"><img src="<?=assets_url('user/img/prof-02.jpg');?>" alt=""></a></li>
                  <li class="animated" data-animation="flipInY" data-animation-delay="1100"><a href="#test11"><img src="<?=assets_url('user/img/prof-03.jpg');?>" alt=""></a></li>
               </ul>
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
                  <div class="col-md-3 call-us-link animated" data-animation="fadeInRight" data-animation-delay="200"><a href="contact.html" class="call-us-btn">CONTACT NOW</a></div>
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
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in </p>
                        <a href="#" class="lined-btns"><i class="fi-social-apple"></i>IOS APP</a> <a href="#" class="lined-btns"><i class="fi-social-android"></i>ANDROID</a> 
                     </div>
                  </div>
                  <div class="col-md-4 down-img-cont animated" data-animation="fadeInRight" data-animation-delay="200">
                     <div class="image-outer"><img src="<?=assets_url('user/img/iphone.png');?>" alt=""></div>
                  </div>
               </div>
            </div>
         </section>

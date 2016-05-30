
    <div class="wrapper" id="sb-site">
        <section class="header-area">
            <div class="banner-slider">
                <ul class="slides clearfix">
                    <li><img src="<?=assets_url('user/img/banner-01.jpg');?>" alt="">
                    </li>
                    <li><img src="<?=assets_url('user/img/banner-01.jpg');?>" alt="">
                    </li>
                    <li><img src="<?=assets_url('user/img/banner-03.jpg');?>" alt="">
                    </li>
                </ul>
            </div>
            <div class="banner-cont-wrapper">
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
                                    <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="logo-area">
                        <a href="index.html"><img src="<?=assets_url('user/img/logo.png');?>" alt="">
                        </a>
                    </div>
                    <div class="banner-conts">
                        <h1>DreamJobs</h1>
                        <h2>creative professionals</h2>
                        <p class="medium">Posting a job is a fantastic, simple way to reach talented web and creative professionals and until further notice it's entirely free! </p>
                       
                    </div>
                </div>
            </div>
            
        </section>
        
        <section class="job-statistics-main">
            <div class="container">
                <h3 class="animated" data-animation="fadeInUp" data-animation-delay="100">Jobs Statistics</h3>
                <h5 class="uppercase animated" data-animation="fadeInUp" data-animation-delay="200">you will get awesome jobs psd &amp; easy convert to wordpress</h5>
                <hr>
                <ul class="statistic-val">
                    <li class="animated" data-animation="flipInY" data-animation-delay="200">
                        <div class="stastic-single">
                            <div class="ico-conts"> <span>364</span> <i class="fi-heart"></i> </div>
                            <h6>JOB FILLED</h6> </div>
                    </li>
                    <li class="animated" data-animation="flipInY" data-animation-delay="400">
                        <div class="stastic-single">
                            <div class="ico-conts"> <span>99</span> <i class="fi-address-book"></i> </div>
                            <h6>resumes</h6> </div>
                    </li>
                    <li class="animated" data-animation="flipInY" data-animation-delay="600">
                        <div class="stastic-single">
                            <div class="ico-conts"> <span>999</span> <i class="fi-star"></i> </div>
                            <h6>Jobs</h6> </div>
                    </li>
                    <li class="animated" data-animation="flipInY" data-animation-delay="800">
                        <div class="stastic-single">
                            <div class="ico-conts"> <span>88</span> <i class="fi-marker"></i> </div>
                            <h6>company</h6> </div>
                    </li>
                    <li class="animated" data-animation="flipInY" data-animation-delay="1000">
                        <div class="stastic-single">
                            <div class="ico-conts"> <span>5,864</span> <i class="fi-torso-business"></i> </div>
                            <h6>member</h6> </div>
                    </li>
                </ul>
            </div>
        </section>
        <section class="how-it-works">
            <div class="container">
                <h3 class="animated" data-animation="fadeInUp" data-animation-delay="100">How JobHunt Work?</h3>
                <h5 class="uppercase animated" data-animation="fadeInUp" data-animation-delay="200">if you purchase this psd you will get happy &amp; hurry up</h5>
                <hr class="animated" data-animation="fadeInUp" data-animation-delay="300">
                <br>
                <p class="animated" data-animation="fadeInLeft" data-animation-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit.</p>
                <div class="laptop-img animated" data-animation="fadeInRight" data-animation-delay="100"><img src="<?=assets_url('user/img/laptop-img.png');?>" alt="">
                </div>
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
                        <h6>KIDESIGNER - 5GOAT CORP</h6> </div>
                    <div id="test2" class="testimonial-single animated" data-animation="fadeInUp" data-animation-delay="100">
                        <div class="txt-cont-qu">
                            <p>&quot; Excellent service offering a personal touch, if I had an issue they were no longer than a phone call away and were always quick to respond. &quot;</p>
                        </div>
                        <h6>Responsive Expert - Reowix Technologies</h6> </div>
                    <div id="test3" class="testimonial-single animated" data-animation="fadeInUp" data-animation-delay="100">
                        <div class="txt-cont-qu">
                            <p>&quot; At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores. &quot;</p>
                        </div>
                        <h6>MarksMom - Sea Corp</h6> </div>
                    <div id="test4" class="testimonial-single animated" data-animation="fadeInUp" data-animation-delay="100">
                        <div class="txt-cont-qu">
                            <p>&quot; Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore ex ea commodo consequat. &quot;</p>
                        </div>
                        <h6>KIDESIGNER - 5GOAT CORP</h6> </div>
                    <div id="test5" class="testimonial-single animated" data-animation="fadeInUp" data-animation-delay="100">
                        <div class="txt-cont-qu">
                            <p>&quot; Excellent service offering a personal touch, if I had an issue they were no longer than a phone call away and were always quick to respond. &quot;</p>
                        </div>
                        <h6>Responsive Expert - Reowix Technologies</h6> </div>
                    <div id="test6" class="testimonial-single active animated" data-animation="fadeInUp" data-animation-delay="100">
                        <div class="txt-cont-qu">
                            <p>&quot; At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores. &quot;</p>
                        </div>
                        <h6>MarksMom - Sea Corp</h6> </div>
                    <div id="test7" class="testimonial-single animated" data-animation="fadeInUp" data-animation-delay="100">
                        <div class="txt-cont-qu">
                            <p>&quot; Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore ex ea commodo consequat. &quot;</p>
                        </div>
                        <h6>KIDESIGNER - 5GOAT CORP</h6> </div>
                    <div id="test8" class="testimonial-single animated" data-animation="fadeInUp" data-animation-delay="100">
                        <div class="txt-cont-qu">
                            <p>&quot; Excellent service offering a personal touch, if I had an issue they were no longer than a phone call away and were always quick to respond. &quot;</p>
                        </div>
                        <h6>Responsive Expert - Reowix Technologies</h6> </div>
                    <div id="test9" class="testimonial-single animated" data-animation="fadeInUp" data-animation-delay="100">
                        <div class="txt-cont-qu">
                            <p>&quot; At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores. &quot;</p>
                        </div>
                        <h6>MarksMom - Sea Corp</h6> </div>
                    <div id="test10" class="testimonial-single animated" data-animation="fadeInUp" data-animation-delay="100">
                        <div class="txt-cont-qu">
                            <p>&quot; Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore ex ea commodo consequat. &quot;</p>
                        </div>
                        <h6>KIDESIGNER - 5GOAT CORP</h6> </div>
                    <div id="test11" class="testimonial-single animated" data-animation="fadeInUp" data-animation-delay="100">
                        <div class="txt-cont-qu">
                            <p>&quot; Excellent service offering a personal touch, if I had an issue they were no longer than a phone call away and were always quick to respond. &quot;</p>
                        </div>
                        <h6>Responsive Expert - Reowix Technologies</h6> </div>
                </div>
                <ul class="campers-all">
                    <li class="animated" data-animation="flipInY" data-animation-delay="100">
                        <a href="#test1"><img src="<?=assets_url('user/img/laptop-img.png');?>" alt="">
                        </a>
                    </li>
                    <li class="animated" data-animation="flipInY" data-animation-delay="200">
                        <a href="#test2"><img src="<?=assets_url('user/img/prof-02.jpg');?>" alt="">
                        </a>
                    </li>
                    <li class="animated" data-animation="flipInY" data-animation-delay="300">
                        <a href="#test3"><img src="<?=assets_url('user/img/prof-03.jpg');?>" alt="">
                        </a>
                    </li>
                    <li class="animated" data-animation="flipInY" data-animation-delay="400">
                        <a href="#test4"><img src="<?=assets_url('user/img/prof-04.jpg');?>" alt="">
                        </a>
                    </li>
                    <li class="animated" data-animation="flipInY" data-animation-delay="500">
                        <a href="#test5"><img src="<?=assets_url('user/img/prof-05.jpg');?>" alt="">
                        </a>
                    </li>
                    <li class="animated" data-animation="flipInY" data-animation-delay="600">
                        <a href="#test6" class="active"><img src="<?=assets_url('user/img/prof-06.jpg');?>" alt="">
                        </a>
                    </li>
                    <li class="animated" data-animation="flipInY" data-animation-delay="700">
                        <a href="#test7"><img src="<?=assets_url('user/img/prof-07.jpg');?>" alt="">
                        </a>
                    </li>
                    <li class="animated" data-animation="flipInY" data-animation-delay="800">
                        <a href="#test8"><img src="<?=assets_url('user/img/prof-08.jpg');?>" alt="">
                        </a>
                    </li>
                    <li class="animated" data-animation="flipInY" data-animation-delay="900">
                        <a href="#test9"><img src="<?=assets_url('user/img/prof-01.jpg');?>" alt="">
                        </a>
                    </li>
                    <li class="animated" data-animation="flipInY" data-animation-delay="1000">
                        <a href="#test10"><img src="<?=assets_url('user/img/prof-02.jpg');?>" alt="">
                        </a>
                    </li>
                    <li class="animated" data-animation="flipInY" data-animation-delay="1100">
                        <a href="#test11"><img src="<?=assets_url('user/img/prof-03.jpg');?>" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </section>
   
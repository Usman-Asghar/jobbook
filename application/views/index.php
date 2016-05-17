
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
                                <li><a href="#login-box" data-popup="facebox">Login</a>
                                </li>
                                <li><a href="register.html">Register</a>
                                </li>
                                <li>
                                    <div class="search-top">
                                        <form> <span class="search-form"> <input class="search-txt-top" type="text" placeholder="Search Here..."> <button type="button" class="search-btn-top" onClick="parent.location='search-fixed.html'"><i class="fi-magnifying-glass"></i></button> </span> </form>
                                    </div>
                                </li>
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
                        <div class="post-job"><a href="submit-job.html" class="post-job-btn">POST A JOB</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="login-box">
                <h3>Login</h3>
                <hr>
                <form>
                    <p>
                        <label>Email</label>
                        <input type="text" class="input-area"> </p>
                    <p>
                        <label>Password</label>
                        <input type="password" class="input-area"> </p>
                    <p class="check-box">
                        <input id="checkbox1" type="checkbox" name="checkbox" value="">
                        <label for="checkbox1"><span></span>Remember me</label>
                    </p>
                    <p>
                        <input type="button" value="Login" class="input-button"> <span>Not member? </span><a href="#">Sign Up</a> </p>
                </form>
            </div>
        </section>
        <section class="jobs-area">
            <div class="container">
                <div class="jobs-search-area clearfix animated" data-animation="fadeInUp" data-animation-delay="100">
                    <div class="search-bx">
                        <input type="text" class="search-job-field" placeholder="Search a Job..">
                    </div>
                    <div class="location-picker"><a href="#" class="picker">Pick a Location</a>
                    </div>
                    <div class="job-selecter">
                        <select id="basic-selecter">
                            <option value="">Select job type</option>
                            <option>Full Time</option>
                            <option>Freelancer</option>
                            <option>Temporary</option>
                            <option>Intership</option>
                        </select>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-8">
                        <div class="job-list-head clearfix animated" data-animation="fadeInUp" data-animation-delay="100">
                            <div class="title">job title</div>
                            <div class="location">Location</div>
                            <div class="create">Create at</div>
                        </div>
                        <ul class="job-listings">
                            <li class="animated" data-animation="fadeInUp" data-animation-delay="100">
                                <div class="title"> <span class="prof-photo"><a href="single.html"><img src="<?=assets_url('user/img/prof-01.jpg');?>" alt=""></a></span> <span class="designation"> <a href="single.html">GRAPHIC DESIGNER</a><br>5Goat Corporation </span> </div>
                                <div class="location">California, USA</div>
                                <div class="create">10 mins ago</div>
                            </li>
                            <li class="animated" data-animation="fadeInUp" data-animation-delay="100">
                                <div class="title"> <span class="prof-photo"><a href="single.html"><img src="<?=assets_url('user/img/prof-02.jpg');?>" alt=""></a></span> <span class="designation"> <a href="single.html">wordpress developer</a><br>Behance </span> </div>
                                <div class="location">New York, USA</div>
                                <div class="create">2 days ago</div>
                            </li>
                            <li class="animated" data-animation="fadeInUp" data-animation-delay="100">
                                <div class="title"> <span class="prof-photo"><a href="single.html"><img src="<?=assets_url('user/img/prof-03.jpg');?>" alt=""></a></span> <span class="designation"> <a href="single.html">web designer</a><br>Dribbble </span> </div>
                                <div class="location">California, USA</div>
                                <div class="create">3 days ago</div>
                            </li>
                            <li class="animated" data-animation="fadeInUp" data-animation-delay="100">
                                <div class="title"> <span class="prof-photo"><a href="single.html"><img src="<?=assets_url('user/img/prof-04.jpg');?>" alt=""></a></span> <span class="designation"> <a href="single.html">MEAN developer</a><br>Themeforest </span> </div>
                                <div class="location">New York, USA</div>
                                <div class="create">05-02-2015</div>
                            </li>
                            <li class="animated" data-animation="fadeInUp" data-animation-delay="100">
                                <div class="title"> <span class="prof-photo"><a href="single.html"><img src="<?=assets_url('user/img/prof-05.jpg');?>" alt=""></a></span> <span class="designation"> <a href="single.html">print designer</a><br>Themeforest </span> </div>
                                <div class="location">New York, USA</div>
                                <div class="create">05-02-2015</div>
                            </li>
                            <li class="animated" data-animation="fadeInUp" data-animation-delay="100">
                                <div class="title"> <span class="prof-photo"><a href="single.html"><img src="<?=assets_url('user/img/prof-06.jpg');?>" alt=""></a></span> <span class="designation"> <a href="single.html">java developer</a><br>Codecanyon Labs </span> </div>
                                <div class="location">Canada</div>
                                <div class="create">05-02-2015</div>
                            </li>
                        </ul> <a href="#" class="load-more-jobs animated" data-animation="fadeInUp" data-animation-delay="100">Load More Jobs</a> </div>
                    <div class="col-md-4">
                        <ul class="featured-jobs">
                            <li class="animated" data-animation="fadeInUp" data-animation-delay="200">
                                <a href="single.html" class="featured-single"> <span class="image-cont"><img src="<?=assets_url('user/img/featured-01.jpg');?>" alt=""></span> <span class="featured-data"> <span class="prof-photo"><img src="<?=assets_url('user/img/prof-07.jpg');?>" alt=""></span> <span class="designation"> <span>frontend developer</span>
                                    <br>Codecanyon Labs </span>
                                    </span>
                                </a>
                            </li>
                            <li class="animated" data-animation="fadeInUp" data-animation-delay="200">
                                <a href="single.html" class="featured-single"> <span class="image-cont"><img src="<?=assets_url('user/img/featured-02.jpg');?>" alt=""></span> <span class="featured-data"> <span class="prof-photo"><img src="<?=assets_url('user/img/prof-08.jpg');?>" alt=""></span> <span class="designation"> <span>theme supporter</span>
                                    <br>Codecanyon Labs </span>
                                    </span>
                                </a>
                            </li>
                        </ul>
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
        <section class="plan-and-pricing">
            <div class="container">
                <h3 class="animated" data-animation="fadeInUp" data-animation-delay="100">Plan &amp; Pricing</h3>
                <h5 class="uppercase animated" data-animation="fadeInUp" data-animation-delay="200">if you purchase this template you will get happy &amp; hurry up</h5>
                <hr>
                <ul class="price-tables">
                    <li class="col-md-4 price-main animated" data-animation="fadeInLeft" data-animation-delay="200">
                        <div class="price-single">
                            <div class="price-head">
                                <h6>START UP</h6> </div>
                            <div class="price-pricing"> <span class="price">$29</span>
                                <hr> <span class="description">$29 for 1 job listed for 30 days</span> </div>
                            <div class="price-features">
                                <ul>
                                    <li><strong>One Time</strong> Fee</li>
                                    <li><strong>Allows 1 Job</strong> Posting</li>
                                    <li><strong>Non-Highlighted</strong> Post</li>
                                </ul>
                            </div>
                            <div class="choose-a-plan"><a href="#" class="plan-choose-btn">CHOOSE PLAN</a>
                            </div>
                        </div>
                    </li>
                    <li class="col-md-4 price-main active animated" data-animation="fadeInUp" data-animation-delay="300">
                        <div class="price-single">
                            <div class="price-head">
                                <h6>START UP</h6> </div>
                            <div class="price-pricing"> <span class="price">$29</span>
                                <hr> <span class="description">$29 for 1 job listed for 30 days</span> </div>
                            <div class="price-features">
                                <ul>
                                    <li><strong>One Time</strong> Fee</li>
                                    <li><strong>Allows 1 Job</strong> Posting</li>
                                    <li><strong>Non-Highlighted</strong> Post</li>
                                    <li><strong>Non-Highlighted</strong> Post</li>
                                </ul>
                            </div>
                            <div class="choose-a-plan"><a href="#" class="plan-choose-btn">CHOOSE PLAN</a>
                            </div>
                        </div>
                    </li>
                    <li class="col-md-4 price-main animated" data-animation="fadeInRight" data-animation-delay="200">
                        <div class="price-single">
                            <div class="price-head">
                                <h6>START UP</h6> </div>
                            <div class="price-pricing"> <span class="price">$29</span>
                                <hr> <span class="description">$29 for 1 job listed for 30 days</span> </div>
                            <div class="price-features">
                                <ul>
                                    <li><strong>One Time</strong> Fee</li>
                                    <li><strong>Allows 1 Job</strong> Posting</li>
                                    <li><strong>Non-Highlighted</strong> Post</li>
                                </ul>
                            </div>
                            <div class="choose-a-plan"><a href="#" class="plan-choose-btn">CHOOSE PLAN</a>
                            </div>
                        </div>
                    </li>
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in </p><a href="#" class="lined-btns"><i class="fi-social-apple"></i> IOS APP</a> <a href="#" class="lined-btns"><i class="fi-social-android"></i> ANDROID</a> </div>
                    </div>
                    <div class="col-md-4 down-img-cont animated" data-animation="fadeInRight" data-animation-delay="200">
                        <div class="image-outer"><img src="<?=assets_url('user/img/iphone.png');?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
   
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title><?=$page_title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!--[if lt IE 9]> <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="shortcut icon" href="img/favicon.html">
    <?=link_tag('user/css/bootstrap.css');?>
    <?=link_tag('user/font-awesome/css/font-awesome.min.css');?>
    <?=link_tag('user/foundation-icons/foundation-icons.css');?>
    <?=link_tag('user/css/animate.min.css');?>
    <?=link_tag('user/css/slidebars.css');?>
    <?=link_tag('user/css/fancySelect.css');?>
    <?=link_tag('user/css/style.css');?>
    <?=link_tag('user/css/facebox.css');?>

    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:700italic,700,500italic,500,400italic,400,300italic,300' rel='stylesheet' type='text/css'>
</head>

<body>
    <div id="mask">
        <div id="loader"> </div>
    </div>
    <header class="sb-slidebar sb-left">
        <nav class="main-menu">
            <ul>
                <li><a href="index.html" class="active">HOME</a>
                </li>
                <li><a href="about.html">ABOUT</a>
                </li>
                <li><a href="#">FIND A JOB</a>
                    <ul class="sub-menu">
                        <li><a href="search-fixed.html">Search 1</a>
                        </li>
                        <li><a href="search.html">Search 2</a>
                        </li>
                    </ul>
                </li>
                <li><a href="#">Job</a>
                    <ul class="sub-menu">
                        <li><a href="single.html">Job profile</a>
                        </li>
                        <li><a href="jobs.html">Jobs Listings</a>
                        </li>
                    </ul>
                </li>
                <li><a href="profile.html">Candidate</a>
                </li>
                <li><a href="submit-job.html">POST A JOB</a>
                </li>
                <li><a href="contact.html">Contact</a>
                </li>
            </ul>
        </nav>
    </header>
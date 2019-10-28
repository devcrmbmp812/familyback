<?php
session_start();
require_once '../config/config.php';
require_once BASE_PATH.'/includes/auth_validate.php';
$db = getDbInstance();
$db->join('tbl_notes', 'tbl_notes.user_id = tbl_users.id')->join('tbl_categories','tbl_notes.cat_id = tbl_categories.id');
$db->where('tbl_users.id', $_GET['user']);
$db->orderBy('tbl_notes.id');

$rows = $db->get('tbl_users');

$userdb = getDbInstance();
$userdb->where('id', $_GET['user']);
$userrow = $userdb->getOne('tbl_users');
//echo '<pre>';
//print_r($rows);
//echo '</pre>';
//exit;
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ==== Document Title ==== -->
    <title>SociFly - Multipurpose Social Network HTML5 Template</title>
    
    <!-- ==== Document Meta ==== -->
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- ==== Favicon ==== -->
    <link rel="icon" href="favicon.png" type="image/png">

    <!-- ==== Google Font ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700%7CRoboto:300,400,400i,500,700">

    <!-- ==== Plugins Bundle ==== -->
    <link rel="stylesheet" href="css/plugins.min.css">
    
    <!-- ==== Main Stylesheet ==== -->
    <link rel="stylesheet" href="style.css">
    
    <!-- ==== Responsive Stylesheet ==== -->
    <link rel="stylesheet" href="css/responsive-style.css">
    
    <!-- ==== Color Scheme Stylesheet ==== -->
    <link rel="stylesheet" href="css/colors/color-1.css" id="changeColorScheme">
    
    <!-- ==== Custom Stylesheet ==== -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- ==== HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries ==== -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <!-- Preloader Start -->
    <div id="preloader">
        <div class="preloader--inner"></div>
    </div>
    <!-- Preloader End -->

    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Header Section Start -->
        <header class="header--section style--1">
            <!-- Header Topbar Start -->
            <div class="header--topbar bg-black">
                <div class="container">
                    <!-- Header Topbar Links Start -->
                    <ul class="header--topbar-links nav ff--primary float--left">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span>En</span>
                                <i class="fa fa-caret-down"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <li class="active"><a href="#">En</a></li>
                                <li><a href="#">Bn</a></li>
                                <li><a href="#">In</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- Header Topbar Links End -->

                    <!-- Header Topbar Social Start -->
                    <ul class="header--topbar-social nav float--left hidden-xs">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                    <!-- Header Topbar Social End -->

                    <!-- Header Topbar Links Start -->
                    <ul class="header--topbar-links nav ff--primary float--right">
                        <li>
                            <a href="../cart.html" title="Cart" data-toggle="tooltip" data-placement="bottom">
                                <i class="fa fa-shopping-basket"></i>
                                <span class="badge">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn-link">
                                <i class="fa mr--8 fa-user-o"></i>
                                <span>My Account</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Header Topbar Links End -->
                </div>
            </div>
            <!-- Header Topbar End -->

            <!-- Header Navbar Start -->
            <div class="header--navbar navbar bg-black" data-trigger="sticky">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#headerNav">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Header Navbar Logo Start -->
                        <div class="header--navbar-logo navbar-brand">
                            <a href="home.html">
                                <img src="img/logo-white.png" class="normal" alt="">
                                <img src="img/logo-black.png" class="sticky" alt="">
                            </a>
                        </div>
                        <!-- Header Navbar Logo End -->
                    </div>

                    <div id="headerNav" class="navbar-collapse collapse float--right">
                        <!-- Header Nav Links Start -->
                        <ul class="header--nav-links style--1 nav ff--primary">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span>Home</span>
                                    <i class="fa fa-caret-down"></i>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="home-1.html"><span>Home Version 1</span></a></li>
                                    <li><a href="home-2.html"><span>Home Version 2</span></a></li>
                                    <li><a href="home-3.html"><span>Home Version 3</span></a></li>
                                    <li><a href="home-4.html"><span>Home Version 4</span></a></li>
                                </ul>
                            </li>
                            <li class="dropdown active">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span>Community</span>
                                    <i class="fa fa-caret-down"></i>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="activity.html"><span>Activity</span></a></li>
                                    <li class="active"><a href="members.php"><span>Members</span></a></li>
                                    <li><a href="groups.html"><span>Groups</span></a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span>BBPress</span>
                                    <i class="fa fa-caret-down"></i>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="forums.html">Forums</a></li>
                                    <li><a href="sub-forums.html">Sub Forums</a></li>
                                    <li><a href="topics.html">Topics</a></li>
                                    <li><a href="topic-replies.html">Topic Replies</a></li>
                                </ul>
                            </li>
                            <li class="dropdown megamenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span>Pages</span>
                                    <i class="fa fa-caret-down"></i>
                                </a>

                                <div class="dropdown-menu">
                                    <div class="row">
                                        <ul class="col-md-2">
                                            <li><a href="members.php">Members</a></li>
                                            <li><a href="groups.html">Groups</a></li>
                                            <li><a href="activity.html">Site Wide Activity</a></li>
                                            <li><a href="member-activity-personal.php">Member Activity</a></li>
                                            <li><a href="group-home.html">Group Activity</a></li>
                                        </ul>

                                        <ul class="col-md-2">
                                            <li><a href="member-profile.html">Member Profile</a></li>
                                            <li><a href="member-forum-topics.html">Member Forum</a></li>
                                            <li><a href="member-media-all.html">Member Media</a></li>
                                            <li><a href="group-forum.html">Group Forum</a></li>
                                            <li><a href="group-media.html">Group Media</a></li>
                                        </ul>
                                        
                                        <ul class="col-md-2">
                                            <li><a href="forums.html">Forums</a></li>
                                            <li><a href="sub-forums.html">Sub Forums</a></li>
                                            <li><a href="topics.html">Topics</a></li>
                                            <li><a href="topic-replies.html">Topic Replies</a></li>
                                            <li><a href="#">Dummy</a></li>
                                        </ul>
                                        
                                        <ul class="col-md-2">
                                            <li><a href="products.html">Products</a></li>
                                            <li><a href="product-details.html">Product Details</a></li>
                                            <li><a href="../cart.html">Cart</a></li>
                                            <li><a href="../checkout.html">Checkout</a></li>
                                            <li><a href="#">Dummy</a></li>
                                        </ul>
                                        
                                        <ul class="col-md-2">
                                            <li><a href="blog-sidebar-right.html">Blog Sidebar Right</a></li>
                                            <li><a href="blog-sidebar-left.html">Blog Sidebar Left</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                            <li><a href="#">Dummy</a></li>
                                            <li><a href="#">Dummy</a></li>
                                        </ul>
                                        
                                        <ul class="col-md-2">
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="faq.html">FAQ</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="coming-soon.html">Coming Soon</a></li>
                                            <li><a href="404.html">404</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span>Products</span>
                                    <i class="fa fa-caret-down"></i>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="products.html">Products</a></li>
                                    <li><a href="product-details.html">Product Details</a></li>
                                    <li><a href="../cart.html">Cart</a></li>
                                    <li><a href="../checkout.html">Checkout</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span>Blog</span>
                                    <i class="fa fa-caret-down"></i>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="blog-sidebar-right.html">Blog Sidebar Right</a></li>
                                    <li><a href="blog-sidebar-left.html">Blog Sidebar Left</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html"><span>Contact</span></a></li>
                        </ul>
                        <!-- Header Nav Links End -->
                    </div>
                </div>
            </div>
            <!-- Header Navbar End -->
        </header>
        <!-- Header Section End -->

        <!-- Cover Header Start -->
        <div class="cover--header pt--80 text-center" data-bg-img="img/cover-header-img/bg-01.jpg" data-overlay="0.6" data-overlay-color="white">
            <div class="container">
                <div class="cover--avatar online" data-overlay="0.3" data-overlay-color="primary">
                    <img src="img/cover-header-img/avatar-01.jpg" alt="">
                </div>

                <div class="cover--user-name">
                    <h2 class="h3 fw--600"><?php echo $userrow['first_name'].' '. $userrow['last_name'];?></h2>
                </div>

                <div class="cover--user-activity">
                    <p><i class="fa mr--8 fa-clock-o"></i>Active 1 year 9 monts ago</p>
                </div>

                <div class="cover--user-desc fw--400 fs--18 fstyle--i text-darkest">
                    <p>Hello everyone ! There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
                </div>
            </div>
        </div>
        <!-- Cover Header End -->

        <!-- Page Wrapper Start -->
        <section class="page--wrapper pt--80 pb--20">
            <div class="container">
                <div class="row">
                    <!-- Main Content Start -->
                    <div class="main--content col-md-8 pb--60" data-trigger="stickyScroll">
                        <div class="main--content-inner drop--shadow">
                            <!-- Content Nav Start -->
                            <div class="content--nav pb--30">
                                <ul class="nav ff--primary fs--14 fw--500 bg-lighter">
                                    <li class="active"><a href="member-activity-personal.php">Activity</a></li>
                                    <li><a href="member-profile.html">Profile</a></li>
                                    <li><a href="member-friends.html">Friends</a></li>
                                    <li><a href="member-groups.html">Groups</a></li>
                                    <li><a href="member-forum-topics.html">Forum</a></li>
                                    <li><a href="member-media-all.html">Media</a></li>
                                </ul>
                            </div>
                            <!-- Content Nav End -->

                            <!-- Filter Nav Start -->
                            <div class="filter--nav pb--60 clearfix">
                                <div class="filter--links float--left">
                                    <ul class="nav ff--primary">
                                        <li class="active"><a href="member-activity-persoanl.html">Personal</a></li>
                                        <li><a href="member-activity-mentions.html">Mentions</a></li>
                                        <li><a href="member-activity-favorites.html">Favorites</a></li>
                                        <li><a href="member-activity-friends.html">Friends</a></li>
                                        <li><a href="member-activity-groups.html">Groups</a></li>
                                    </ul>
                                </div>

                                <div class="filter--options float--right">
                                    <label>
                                        <span class="fs--14 ff--primary fw--500 text-darker">Show By :</span>

                                        <select name="activityfilter" class="form-control form-sm" data-trigger="selectmenu">
                                            <option value="updates" selected>Updates</option>
                                            <option value="friendships">Friendships</option>
                                            <option value="group-updates">Group Updats</option>
                                            <option value="membership">Membership</option>
                                            <option value="topics">Topics</option>
                                            <option value="replies">Replies</option>
                                            <option value="posts">Posts</option>
                                            <option value="comments">Comments</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <!-- Filter Nav End -->

                            <!-- Activity List Start -->
                            <div class="activity--list">
                                <!-- Activity Items Start -->
                                <ul class="activity--items nav">
                                    <?php foreach ($rows as $row):?>
                                        <li>
                                            <!-- Activity Item Start -->
                                            <div class="activity--item">
                                                <div class="activity--avatar">
                                                    <a href="member-activity-personal.php">
                                                        <img src="img/activity-img/avatar-01.jpg" alt="">
                                                    </a>
                                                </div>

                                                <div class="activity--info fs--14">
                                                    <div class="activity--header">
                                                        <p><a href="member-activity-personal.php"><?php echo $row['first_name'].$row['last_name']?></a> posted an <?php echo $row['note_media'];?> on <?php echo $row['cat_name']?></p>
                                                    </div>

                                                    <div class="activity--meta fs--12">
                                                        <p><i class="fa mr--8 fa-clock-o"></i><?php echo $row['note_date']?></p>
                                                    </div>

                                                    <div class="activity--content">
                                                        <?php if ($row['note_media'] == 'text'):?>
                                                            <p><?php echo $row['note_value']?></p>
                                                        <?php elseif ($row['note_media'] == 'photo'):?>
                                                            <img src="<?php echo $row['note_value']; ?>">
                                                        <?php elseif ($row['note_media'] == 'video'):?>
                                                            <iframe width="100%" height="100%"
                                                                    src="<?php echo $row['note_value']?>">
                                                            </iframe>
                                                        <?php endif;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Activity Item End -->
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                                <!-- Activity Items End -->
                            </div>
                            <!-- Activity List End -->
                        </div>

                        <!-- Load More Button Start -->
                        <div class="load-more--btn pt--30 text-center">
                            <a href="#" class="btn btn-animate">
                                <span>See More Activities<i class="fa ml--10 fa-caret-right"></i></span>
                            </a>
                        </div>
                        <!-- Load More Button End -->
                    </div>
                    <!-- Main Content End -->

                    <!-- Main Sidebar Start -->
                    <div class="main--sidebar col-md-4 pb--60" data-trigger="stickyScroll">
                        <!-- Widget Start -->
                        <div class="widget">
                            <h2 class="h4 fw--700 widget--title">Find A Buddy</h2>

                            <!-- Buddy Finder Widget Start -->
                            <div class="buddy-finder--widget">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-xs-6 col-xxs-12">
                                            <div class="form-group">
                                                <label>
                                                    <span class="text-darker ff--primary fw--500">I Am</span>

                                                    <select name="gender" class="form-control form-sm" data-trigger="selectmenu">
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-xxs-12">
                                            <div class="form-group">
                                                <label>
                                                    <span class="text-darker ff--primary fw--500">Looking For</span>

                                                    <select name="lookingfor" class="form-control form-sm" data-trigger="selectmenu">
                                                        <option value="female">Female</option>
                                                        <option value="male">Male</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-xxs-12">
                                            <div class="form-group">
                                                <label>
                                                    <span class="text-darker ff--primary fw--500">Age</span>

                                                    <select name="age" class="form-control form-sm" data-trigger="selectmenu">
                                                        <option value="18to25">18 to 25</option>
                                                        <option value="25to30">25 to 30</option>
                                                        <option value="30to35">30 to 35</option>
                                                        <option value="35to40">35 to 40</option>
                                                        <option value="40plus">40+</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-xxs-12">
                                            <div class="form-group">
                                                <label>
                                                    <span class="text-darker ff--primary fw--500">City</span>

                                                    <select name="city" class="form-control form-sm" data-trigger="selectmenu">
                                                        <option value="newyork">New York</option>
                                                        <option value="California">California</option>
                                                        <option value="Atlanta">Atlanta</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label>
                                                    <span class="text-darker ff--primary fw--500">Filter Country</span>

                                                    <select name="city" class="form-control form-sm" data-trigger="selectmenu">
                                                        <option value="unitedstates">United States</option>
                                                        <option value="australia">Australia</option>
                                                        <option value="turkey">Turkey</option>
                                                        <option value="vietnam">Vietnam</option>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-xs-12">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Buddy Finder Widget End -->
                        </div>
                        <!-- Widget End -->

                        <!-- Widget Start -->
                        <div class="widget">
                            <h2 class="h4 fw--700 widget--title">Notice</h2>

                            <!-- Text Widget Start -->
                            <div class="text--widget">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some  look even slightly believable.</p>
                            </div>
                            <!-- Text Widget End -->
                        </div>
                        <!-- Widget End -->

                        <!-- Widget Start -->
                        <div class="widget">
                            <h2 class="h4 fw--700 widget--title">Forums</h2>

                            <!-- Links Widget Start -->
                            <div class="links--widget">
                                <ul class="nav">
                                    <li><a href="sub-forums.html">User Interface Design<span>(12)</span></a></li>
                                    <li><a href="sub-forums.html">Front-End Engineering<span>(07)</span></a></li>
                                    <li><a href="sub-forums.html">Web Development<span>(37)</span></a></li>
                                    <li><a href="sub-forums.html">Social Media Marketing<span>(13)</span></a></li>
                                    <li><a href="sub-forums.html">Content Marketing<span>(28)</span></a></li>
                                </ul>
                            </div>
                            <!-- Links Widget End -->
                        </div>
                        <!-- Widget End -->

                        <!-- Widget Start -->
                        <div class="widget">
                            <h2 class="h4 fw--700 widget--title">Archives</h2>

                            <!-- Nav Widget Start -->
                            <div class="nav--widget">
                                <ul class="nav">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-calendar-o"></i>
                                            <span class="text">Jan - July 2017</span>
                                            <span class="count">(86)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-calendar-o"></i>
                                            <span class="text">Jan - Dce 2016</span>
                                            <span class="count">(328)</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-calendar-o"></i>
                                            <span class="text">Jan - Dec 2015</span>
                                            <span class="count">(427)</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Nav Widget End -->
                        </div>
                        <!-- Widget End -->

                        <!-- Widget Start -->
                        <div class="widget">
                            <h2 class="h4 fw--700 widget--title">Advertisements</h2>

                            <!-- Ad Widget Start -->
                            <div class="ad--widget">
                                <a href="#">
                                    <img src="img/widgets-img/ad.jpg" alt="" class="center-block">
                                </a>
                            </div>
                            <!-- Ad Widget End -->
                        </div>
                        <!-- Widget End -->
                    </div>
                    <!-- Main Sidebar End -->
                </div>
            </div>
        </section>
        <!-- Page Wrapper End -->

        <!-- Footer Section Start -->
        <footer class="footer--section">
            <!-- Footer Widgets Start -->
            <div class="footer--widgets pt--70 pb--20 bg-lightdark" data-bg-img="img/footer-img/footer-widgets-bg.png">
                <div class="container">
                    <div class="row AdjustRow">
                        <div class="col-md-3 col-xs-6 col-xxs-12 pb--60">
                            <!-- Widget Start -->
                            <div class="widget">
                                <h2 class="h4 fw--700 widget--title">About Us</h2>

                                <!-- Text Widget Start -->
                                <div class="text--widget">
                                    <p>Ipsum is simply dummy text of the printing indusLorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                                </div>
                                <!-- Text Widget End -->
                            </div>
                            <!-- Widget End -->

                            <!-- Widget Start -->
                            <div class="widget">
                                <h2 class="h4 fw--700 widget--title">Subscribe To Our Newsletter</h2>

                                <!-- Newsletter Widget Start -->
                                <div class="newsletter--widget style--1" data-form="validate">
                                    <form action="https://themelooks.us13.list-manage.com/subscribe/post?u=79f0b132ec25ee223bb41835f&id=f4e0e93d1d" method="post" name="mc-embedded-subscribe-form" target="_blank">
                                        <div class="input-group">
                                            <input type="email" name="EMAIL" placeholder="Enter your emil address" class="form-control" autocomplete="off" required>

                                            <div class="input-group-btn">
                                                <button type="submit" class="btn-link"><i class="fa fa-send-o"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- Newsletter Widget End -->
                            </div>
                            <!-- Widget End -->
                        </div>

                        <div class="col-md-3 col-xs-6 col-xxs-12 pb--60">
                            <!-- Widget Start -->
                            <div class="widget">
                                <h2 class="h4 fw--700 widget--title">Recent Post</h2>

                                <!-- Recent Posts Widget Start -->
                                <div class="recent-posts--widget">
                                    <ul class="nav">
                                        <li>
                                            <p class="date fw--300">
                                                <a href="#"><i class="fa mr--8 fa-file-text-o"></i>19 Jan 2017</a>
                                            </p>
                                            <p class="title fw--700">
                                                <a href="blog-details.html">I look at you and see the rest of my life in front</a>
                                            </p>
                                        </li>
                                        <li>
                                            <p class="date fw--300">
                                                <a href="#"><i class="fa mr--8 fa-file-text-o"></i>19 Jan 2017</a>
                                            </p>
                                            <p class="title fw--700">
                                                <a href="blog-details.html">If I know what love is, it is because of you</a>
                                            </p>
                                        </li>
                                        <li>
                                            <p class="date fw--300">
                                                <a href="#"><i class="fa mr--8 fa-file-text-o"></i>19 Jan 2017</a>
                                            </p>
                                            <p class="title fw--700">
                                                <a href="blog-details.html">At the touch of love everyone becomes a poet</a>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Recent Posts Widget End -->
                            </div>
                            <!-- Widget End -->

                            <!-- Widget Start -->
                            <div class="widget">
                                <h2 class="h4 fw--700 widget--title">Tags</h2>

                                <!-- Tags Widget Start -->
                                <div class="tags--widget">
                                    <ul class="nav">
                                        <li><a href="#">BuddyPress</a></li>
                                        <li><a href="#">HTML</a></li>
                                        <li><a href="#">Music</a></li>
                                        <li><a href="#">Technology</a></li>
                                        <li><a href="#">Movies</a></li>
                                        <li><a href="#">Photography</a></li>
                                        <li><a href="#">WordPress</a></li>
                                    </ul>
                                </div>
                                <!-- Tags Widget End -->
                            </div>
                            <!-- Widget End -->
                        </div>

                        <div class="col-md-3 col-xs-6 col-xxs-12 pb--60">
                            <!-- Widget Start -->
                            <div class="widget">
                                <h2 class="h4 fw--700 widget--title">Some of Catagories</h2>

                                <!-- Nav Widget Start -->
                                <div class="nav--widget">
                                    <ul class="nav">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-folder-o"></i>
                                                <span class="text">Social Media</span>
                                                <span class="count">(26)</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-folder-o"></i>
                                                <span class="text">Business Studies</span>
                                                <span class="count">(06)</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-folder-o"></i>
                                                <span class="text">Technology</span>
                                                <span class="count">(34)</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Nav Widget End -->
                            </div>
                            <!-- Widget End -->

                            <!-- Widget Start -->
                            <div class="widget">
                                <h2 class="h4 fw--700 widget--title">From Archives</h2>

                                <!-- Nav Widget Start -->
                                <div class="nav--widget">
                                    <ul class="nav">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-calendar-o"></i>
                                                <span class="text">Jan - July 2017</span>
                                                <span class="count">(86)</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-calendar-o"></i>
                                                <span class="text">Jan - Dce 2016</span>
                                                <span class="count">(328)</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-calendar-o"></i>
                                                <span class="text">Jan - Dec 2015</span>
                                                <span class="count">(427)</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Nav Widget End -->
                            </div>
                            <!-- Widget End -->
                        </div>

                        <div class="col-md-3 col-xs-6 col-xxs-12 pb--60">
                            <!-- Widget Start -->
                            <div class="widget">
                                <h2 class="h4 fw--700 widget--title">Forums</h2>

                                <!-- Links Widget Start -->
                                <div class="links--widget">
                                    <ul class="nav">
                                        <li><a href="sub-forums.html">User Interface Design</a></li>
                                        <li><a href="sub-forums.html">Front-End Engineering</a></li>
                                        <li><a href="sub-forums.html">Web Development</a></li>
                                        <li><a href="sub-forums.html">Social Media Marketing</a></li>
                                        <li><a href="sub-forums.html">Content Marketing</a></li>
                                    </ul>
                                </div>
                                <!-- Links Widget End -->
                            </div>
                            <!-- Widget End -->

                            <!-- Widget Start -->
                            <div class="widget">
                                <h2 class="h4 fw--700 widget--title">Useful Links</h2>

                                <!-- Links Widget Start -->
                                <div class="links--widget">
                                    <ul class="nav">
                                        <li><a href="#">Register</a></li>
                                        <li><a href="#">Login</a></li>
                                        <li><a href="#">Membership Levels</a></li>
                                        <li><a href="#">Shop</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </div>
                                <!-- Links Widget End -->
                            </div>
                            <!-- Widget End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Widgets End -->

            <!-- Footer Extra Start -->
            <div class="footer--extra bg-darker pt--30 pb--40 text-center">
                <div class="container">
                    <!-- Widget Start -->
                    <div class="widget">
                        <h2 class="h4 fw--700 widget--title">Recent Active Members</h2>

                        <!-- Recent Active Members Widget Start -->
                        <div class="recent-active-members--widget style--2">
                            <div class="owl-carousel" data-owl-items="12" data-owl-nav="true" data-owl-speed="1200" data-owl-responsive='{"0": {"items": "3"}, "481": {"items": "6"}, "768": {"items": "8"}, "992": {"items": "12"}}'>
                                <div class="img">
                                    <a href="member-activity-personal.php"><img src="img/widgets-img/recent-active-members/01.jpg" alt=""></a>
                                </div>

                                <div class="img">
                                    <a href="member-activity-personal.php"><img src="img/widgets-img/recent-active-members/02.jpg" alt=""></a>
                                </div>

                                <div class="img">
                                    <a href="member-activity-personal.php"><img src="img/widgets-img/recent-active-members/03.jpg" alt=""></a>
                                </div>

                                <div class="img">
                                    <a href="member-activity-personal.php"><img src="img/widgets-img/recent-active-members/04.jpg" alt=""></a>
                                </div>

                                <div class="img">
                                    <a href="member-activity-personal.php"><img src="img/widgets-img/recent-active-members/05.jpg" alt=""></a>
                                </div>

                                <div class="img">
                                    <a href="member-activity-personal.php"><img src="img/widgets-img/recent-active-members/06.jpg" alt=""></a>
                                </div>

                                <div class="img">
                                    <a href="member-activity-personal.php"><img src="img/widgets-img/recent-active-members/07.jpg" alt=""></a>
                                </div>

                                <div class="img">
                                    <a href="member-activity-personal.php"><img src="img/widgets-img/recent-active-members/08.jpg" alt=""></a>
                                </div>

                                <div class="img">
                                    <a href="member-activity-personal.php"><img src="img/widgets-img/recent-active-members/09.jpg" alt=""></a>
                                </div>

                                <div class="img">
                                    <a href="member-activity-personal.php"><img src="img/widgets-img/recent-active-members/10.jpg" alt=""></a>
                                </div>

                                <div class="img">
                                    <a href="member-activity-personal.php"><img src="img/widgets-img/recent-active-members/11.jpg" alt=""></a>
                                </div>

                                <div class="img">
                                    <a href="member-activity-personal.php"><img src="img/widgets-img/recent-active-members/12.jpg" alt=""></a>
                                </div>

                                <div class="img">
                                    <a href="member-activity-personal.php"><img src="img/widgets-img/recent-active-members/13.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <!-- Recent Active Members Widget End -->
                    </div>
                    <!-- Widget End -->
                </div>
            </div>
            <!-- Footer Extra End -->

            <!-- Footer Copyright Start -->
            <div class="footer--copyright pt--30 pb--30 bg-darkest">
                <div class="container">
                    <div class="text fw--500 fs--14 text-center">
                        <p>Copyright &copy; Soci<span>fly</span>. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
            <!-- Footer Copyright End -->
        </footer>
        <!-- Footer Section End -->
    </div>
    <!-- Wrapper End -->

    <!-- Back To Top Button Start -->
    <div id="backToTop">
        <a href="#" class="btn"><i class="fa fa-caret-up"></i></a>
    </div>
    <!-- Back To Top Button End -->

    <!-- ==== Plugins Bundle ==== -->
    <script src="js/plugins.min.js"></script>

    <!-- ==== Main Script ==== -->
    <script src="js/main.js"></script>

</body>
</html>
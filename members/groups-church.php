<?php
session_start();
require_once '../config/config.php';
require_once BASE_PATH.'/includes/auth_validate.php';
$db = getDbInstance();
$db->join('tbl_recipes', 'tbl_users.id = tbl_recipes.rec_submit_by');
$rows = $db->get('tbl_users');
?>


<?php include BASE_PATH.'/members/includes/header.php'?>

    <!-- Page Header Start -->
    <div class="page--header pt--60 pb--60 text-center" data-bg-img="img/page-header-img/bg.jpg" data-overlay="0.85">
        <div class="container">
            <div class="title">
                <h2 class="h1 text-white">Church Activities &amp; Fun</h2>
            </div>

            <ul class="breadcrumb text-gray ff--primary">
                <li><a href="home-1.html" class="btn-link">Notes</a></li>
                <li class="active"><span class="text-primary">Groups</span></li>
            </ul>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Page Wrapper Start -->
    <section class="page--wrapper pt--80 pb--20">
        <div class="container">
            <div class="row">
                <!-- Main Content Start -->
                <div class="main--content col-md-12 pb--60">
                    <div class="main--content-inner">
                        <!-- Filter Nav Start -->
                        <div class="filter--nav pb--30 clearfix">

                            <div class="filter--link float--left">
                                <h2 class="h4"><a href="group-church-add.php">Add a Church (+)</a></h2>
                            </div>

                            <div class="filter--options float--right">
                                <label>
                                    <span class="fs--14 ff--primary fw--500 text-darker">Show By :</span>

                                    <select name="membersfilter" class="form-control form-sm" data-trigger="selectmenu">
                                        <option value="last-active" selected>Last Active</option>
                                        <option value="most-members">Most Members</option>
                                        <option value="newly-created">Newly Created</option>
                                        <option value="alphabetical">Alphabetical</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <!-- Filter Nav End -->

                        <!-- Box Items Start -->
                        <div class="box--items">
                            <div class="row gutter--15 AdjustRow">
                                <div class="col-md-3 col-xs-6 col-xxs-12">
                                    <!-- Box Item Start -->
                                    <div class="box--item text-center">
                                        <a href="group-home.html" class="img" data-overlay="0.1">
                                            <img src="img/group-img/01.jpg" alt="">
                                        </a>

                                        <div class="info">
                                            <div class="icon fs--18 text-lightest bg-primary">
                                                <i class="fa fa-plane"></i>
                                            </div>

                                            <div class="title">
                                                <h2 class="h6"><a href="group-home.html">Travel ( Just Take A Tour )</a></h2>
                                            </div>

                                            <div class="meta">
                                                <p><i class="fa mr--8 fa-clock-o"></i>Active 8 days ago</p>
                                                <p><i class="fa mr--8 fa-user-o"></i>Public Group / 2500 Members</p>
                                            </div>

                                            <div class="desc text-darker">
                                                <p>Lorem Ipsum is simply dummy text of the printing &amp; typesetting.</p>
                                            </div>

                                            <div class="action">
                                                <a href="group-home.html">Group Details<i class="fa ml--10 fa-caret-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Box Item End -->
                                </div>

                            </div>
                        </div>
                        <!-- Box Items End -->

                        <!-- Page Count Start -->
                        <div class="page--count pt--30">
                            <label class="ff--primary fs--14 fw--500 text-darker">
                                <span>Viewing</span>

                                <a href="#" class="btn-link"><i class="fa fa-caret-left"></i></a>
                                <input type="number" name="page-count" value="01" class="form-control form-sm">
                                <a href="#" class="btn-link"><i class="fa fa-caret-right"></i></a>

                                <span>of 28</span>
                            </label>
                        </div>
                        <!-- Page Count End -->
                    </div>
                </div>
                <!-- Main Content End -->
            </div>
        </div>
    </section>
    <!-- Page Wrapper End -->

<?php include BASE_PATH.'/members/includes/footer.php'?>
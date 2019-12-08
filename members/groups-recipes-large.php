<?php
session_start();
require_once '../config/config.php';
require_once BASE_PATH.'/includes/auth_validate.php';
$db = getDbInstance();
//$db->where('tbl_recipes.id', $_GET['recipe']);
$db->where('tbl_recipes.rec_submit_by', $_GET['userid']);
$recipes = $db->get('tbl_recipes');
$db = getDbInstance();
$db->where('tbl_users.id', $_GET['userid']);
$user = $db->get('tbl_users');
//print_r($user[0]['first_name']);
//exit;
?>

<?php include BASE_PATH.'/members/includes/header.php'?>

<!-- Page Header Start -->
<div class="page--header pt--60 pb--60 text-center" data-bg-img="img/page-header-img/bg.jpg" data-overlay="0.85">
    <div class="container">
        <div class="title">
            <h2 class="h1 text-white">Favorite Recipes</h2>
        </div>

        <ul class="breadcrumb text-gray ff--primary">
            <li><a href="../members/home.php" class="btn-link">Home</a></li>
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
                    <!--<div class="filter--nav pb--30 clearfix">
                        <div class="filter--link float--left">
                            <h2 class="h4">Add a Receipt (+)</h2>
                        </div>

                        <div class="filter--options float--right">
                            <label>
                                <span class="fs--14 ff--primary fw--500 text-darker">Receipt Type :</span>

                                <select name="membersfilter" class="form-control form-sm" data-trigger="selectmenu">
                                  <option value="last-active" selected>Most Current Added</option>
                                    <option value="most-members">Breakfast</option>
                                    <option value="newly-created">Lunch</option>
                                    <option value="alphabetical">Dinner</option>
                                    <option value="alphabetical">Desserts</option>
                                    <option value="alphabetical">Family Favorite</option>
                                    <option value="alphabetical">Gluten Free</option>
                                    <option value="alphabetical">Vegetarian</option>

                                </select>
                            </label>
                        </div>
                    </div>-->
                    <!-- Filter Nav End -->

                    <!-- Box Items Start -->
                    <div class="box--items-h">
                        <div class="row gutter--15 AdjustRow">

                            <div class="myslideshow-container col-md-12 col-xs-12 col-xxs-12">

                                <?php foreach ($recipes as $row):?>
                                <div class="mySlides myslidefade">

                                    <div class="col-md-12 col-xs-12 col-xxs-12">
                                        <!-- Box Item Start -->
                                        <div class="box--item text-center">
                                            <a href="group-home.html" class="img" data-overlay="0.1">
                                                <img src="<?php echo $row['rec_photo'];?>" width="800px" height="418px">
                                            </a>

                                            <div class="info">
                                                <div class="icon fs--18 text-lightest bg-primary">
                                                    <i class="fa fa-cutlery"></i>
                                                </div>

                                                <div class="title">
                                                    <h2 class="h2"><a href="group-home.html"><?php echo $row['rec_title'];?></a></h2>
                                                    <p><h4>Recipe Type: <?php echo $row['rec_type'];?></h4></p>
                                                </div>

                                                <div class="desc text-darker">
                                                    <p>Date: <?php echo $row['rec_date'];?> &nbsp;&nbsp;&nbsp;&nbsp;Created by: <?php echo $row['rec_create_by'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Submitted by: <?php echo $user[0]['first_name'].' '.$user[0]['last_name'];?></p>
                                                </div>


                                                <p class="float--left"><h4>Recipe Ingredients</h4></p>
                                                <p class="float--left"><h6><?php echo $row['rec_ingredient'];?></h6></p>

                                                <p class="float--left"><h4>Recipe Instructions</h4></p>
                                                <p class="float--left"><h6><?php echo $row['rec_instruction'];?></h6></p>

                                            </div>
                                        </div>
                                        <!-- Box Item End -->
                                    </div>

                                </div>
                                <?php endforeach;?>

                                <a class="myprev" onclick="plusSlides(-1)">&#10094;</a>
                                <a class="mynext" onclick="plusSlides(1)">&#10095;</a>

                            </div>
                            <br>

                    </div>
            </div>
            <!-- Main Content End -->
        </div>
    </div>
</section>

<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex-1].style.display = "block";
    }
</script>


<!-- Page Wrapper End -->
<?php include BASE_PATH.'/members/includes/footer.php'?>

<?php
session_start();
require_once '../config/config.php';
require_once BASE_PATH.'/includes/auth_validate.php';

$db = getDbInstance();
$rows = $db->get('tbl_users');
$submitted_by_id = $_SESSION['user_id'];
$db->where('id', $submitted_by_id);
$submitted_by_user = $db->getOne('tbl_users')['first_name'].' '.$db->getOne('tbl_users')['last_name'];

$criteria_photos = 5;
$db = getDbInstance();
$query = 'SELECT COUNT(rec_submit_by) cnt FROM tbl_recipes WHERE rec_submit_by = '.$submitted_by_id.' GROUP BY rec_submit_by';
$available_photo = $db->rawQuery($query);
$remain = $criteria_photos-$available_photo[0]['cnt'];
//print_r($available_photo[0]['cnt']);
//exit;

//Array ( [rec_title] => [rec_date] => 2019-10-21 [rec_submit_by] => 1 [rec_create_by] => [rec_type] => Array ( [0] => Breakfast [1] => Lunch [2] => Dinner ) [rec_ingredient] => [rec_instruction] => )
if(isset($_POST) && isset($_POST['rec_date']) && $_POST['rec_date'] != '') {
    $data_to_db = $_POST;
    $data_to_db['rec_type'] = '';
    if(isset($_POST['rec_type'])) {
        foreach ($_POST['rec_type'] as $key => $item) {
            if($key == 0) {
                $data_to_db['rec_type'] .= $item;
            } else {
                $data_to_db['rec_type'] .= ','.$item;
            }
        }
    }
    if(isset($_POST) && isset($_FILES["upfile"]["name"])) {
        $target_dir = "./uploads/".$_SESSION['user_id']."/"."recipes/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);  //create directory if not exist
        }
        $target_file = $target_dir . basename($_FILES["upfile"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["upfile"]["tmp_name"]);
        if($check !== false) {
//                echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
//                echo "File is not an image.";
            $uploadOk = 0;
        }
        // Check if file already exists
        if (file_exists($target_file)) {
//            echo "Sorry, file already exists.";
            $_SESSION['failure'] = "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["upfile"]["size"] > 500000) {
//            echo "Sorry, your file is too large.";
            $_SESSION['failure'] = "Sorry, your file is too large.";
            $uploadOk = 0;
        }
//         Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
//            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $_SESSION['failure'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an failure
        if ($uploadOk == 0) {
//            echo "Sorry, your file was not uploaded.";
//            $_SESSION['failure'] = "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["upfile"]["tmp_name"], $target_file)) {
//                echo "The file ". basename( $_FILES["upfile"]["name"]). " has been uploaded.";
                $data_to_db['rec_photo'] = $target_file;

            } else {
//                echo "Sorry, there was an failure uploading your file.";
                $_SESSION['failure'] = "Sorry, your file was not uploaded.";
            }
        }
    }
    $db = getDbInstance();
    $last_id = $db->insert('tbl_recipes', $data_to_db);

    if ($last_id)
    {
        $_SESSION['success'] = 'User added successfully!';
        // Redirect to the Members page
        header('Location: '. BASE_URL .'/members/groups-recipes.php');
        // Important! Don't execute the rest put the exit/die.
    }
    else
    {
        $_SESSION['failure'] = 'Inert DB error'.$db->getLastError();
    }
}
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
                        <div><h2>Add Your Recipe to the Group</h2></div>
                        <form name="recipe-add-form" action="" method="post" enctype="multipart/form-data">
                            <div class="box--items-h">
                                <div class="row gutter--15 AdjustRow">
                                    <div class="box--item text-center">
                                        <div class="col-md-12 col-xs-12">
                                            <div class="box--item text-left">
                                                <div><label><h3>Recipe Title:&nbsp;&nbsp;&nbsp;<input type="text" name="rec_title"></h3></label></div></div>

                                            <div class="box--item text-left">
                                                <div><label><h6>Date:&nbsp;&nbsp;&nbsp;<?php echo date('Y-m-d');?></h6></label></div></div>
                                            <input type="hidden" name="rec_date" value="<?php echo date('Y-m-d');?>">

                                            <div class="box--item text-left">
                                                <div><label><h6>Submitted by:&nbsp;&nbsp;&nbsp;<?php echo $submitted_by_user;?></h6></label></div></div>
                                            <input type="hidden" name="rec_submit_by" value="<?php echo $submitted_by_id;?>">

                                            <div class="box--item text-left">
                                                <p><h6>Enter the name of the person who created the recipe in the <strong>"Created by"</strong> box.</h6></p>
                                                <div><label><h6>Created by:&nbsp;&nbsp;&nbsp;<input type="text" name="rec_create_by">&nbsp;&nbsp;&nbsp;</h6></label></div></div>

                                            <div class="box--item text-left">
                                                <p><label><h6>Select the applicable checkbox(es) for the type of recipe you are adding.</h6></label>

                                                    <label>
                                                        <input type="checkbox" name="rec_type[]" value="Breakfast" id="RecipeType_0">Breakfast
                                                        <input type="checkbox" name="rec_type[]" value="Lunch" id="RecipeType_1">Lunch
                                                        <input type="checkbox" name="rec_type[]" value="Dinner" id="RecipeType_2">Dinner
                                                        <input type="checkbox" name="rec_type[]" value="Dessert" id="RecipeType_3">Dessert
                                                        <input type="checkbox" name="rec_type[]" value="Family Favorite" id="RecipeType_4">Family Favorite
                                                        <input type="checkbox" name="rec_type[]" value="Gluten Free" id="RecipeType_5">Gluten Free
                                                        <input type="checkbox" name="rec_type[]" value="Vegetarian" id="RecipeType_6">Vegetarian
                                                        <br>
                                                    </label>

                                                <div class="box--item text-left">

                                                    <?php
                                                    if($remain == 0) { ?>
                                                        <span style="color:red;">Users can upload a maximum of 10 pictures</span>
                                                        <div><label><h6>Add a photo of your recipe.&nbsp;&nbsp;&nbsp;</h6>
                                                                <input name="upfile" type="file" class="form-control" id="upfile" required disabled>
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <span>You can upload <?php echo $remain; ?> more photos</span>
                                                        <div><label><h6>Add a photo of your recipe.&nbsp;&nbsp;&nbsp;</h6>
                                                                <input name="upfile" type="file" class="form-control" id="upfile" required>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                                <div class="box--item text-left textareaw">
                                                    <div><label><h6>Add the recipe ingredients.&nbsp;&nbsp;&nbsp;</h6></label>
                                                        <textarea rows="4" cols="100%" name="rec_ingredient" placeholder="Enter text here..."></textarea>
                                                    </div>
                                                </div>


                                                <div class="box--item text-left textareaw">
                                                    <div><label><h6>Add the recipe instructions.&nbsp;&nbsp;&nbsp;</h6></label>
                                                        <textarea rows="4" cols="100%" name="rec_instruction" placeholder="Enter text here..."></textarea>
                                                    </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row text-right">
                                <?php
                                if($remain == 0) { ?>
                                    <button type="submit" class="btn btn-primary" disabled>Save</button>
                                <?php } else { ?>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                <?php } ?>
                                <a class="btn btn-primary" href="../members/groups-recipes.php">Cancel</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Wrapper End -->

<?php include BASE_PATH.'/members/includes/footer.php'?>
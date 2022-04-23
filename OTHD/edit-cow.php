<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    // Add Category Code
    if(isset($_POST['update'])){
		
        $update = "UPDATE `tblcow` SET `Cownumber`='".$_POST['category']."',`Gender`='".$_POST['gender']."',`Breed`='".$_POST['type']."',`DateofBirth`='".$_POST['dob']."',`DateAcquired`='".$_POST['dtacq']."',`Status`='".$_POST['status']."',`DateRemoved`='".$_POST['dtrmd']."',`Cause`='".$_POST['cause']."' WHERE `CowNumber` = '".$_POST['category']."' ";
		
		mysqli_query($con, $update);
		
		$msg="Sucessfully Updated a Cow Record !!";
				
		echo "<script type='text/JavaScript'>alert ('$msg');window.location.href='manage-cow.php';</script>";
	
		mysqli_close($con);
	}

    if($_REQUEST['Cownumber']){

		$datashow="SELECT * FROM `tblcow` WHERE Cownumber=".$_REQUEST['Cownumber'];

		$resrow=mysqli_query($con,$datashow);

		$data=mysqli_fetch_array($resrow);		

	}

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Edit Cow</title>
        <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
        <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
        <link href="dist/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>


        <!-- HK Wrapper -->
        <div class="hk-wrapper hk-vertical-nav ml-[300px]">

            <!-- Top Navbar -->
            <?php include_once('includes/navbar.php');
            include_once('includes/sidebar.php');
            ?>
            <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
            <!-- /Vertical Nav -->
            <!-- Main Content -->
            <div class="hk-pg-wrapper ml-0">
                <!-- Breadcrumb -->
                <nav class="hk-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light bg-transparent">
                        <li class="breadcrumb-item"><a href="#">Cow</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <!-- /Breadcrumb -->

                <!-- Container -->
                <div class="container">
                    <!-- Title -->
                    <div class="hk-pg-header">
                        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Edit Cow</h4>
                    </div>
                    <!-- /Title -->

                    <!-- Row -->
                    <div class="row">
                        <div class="col-xl-12">
                            <section class="hk-sec-wrapper">

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="asdasdasdasddasdasdas">
                                        <span class="d-block display-4 text-dark mb-5">
                                        <form class="needs-validation" method="post" novalidate>
                                            
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Cow number</label>
                                                        <input type="text" class="form-control" id="validationCustom03" placeholder="cow number" name="category" value="<?php print strip_tags($data[0]);?>" required>
                                                        <div class="invalid-feedback">Cow Number</div>
                                                    </div>
                                                </div>
                                            
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Gender</label>
                                                        <input type="radio" class="form-control" id="validationCustom03" name="gender" value="Male" <?php if($data[1] == "Male") echo 'checked="checked"'; ?> required>
                                                        <label for="Male">Male</label>
                                                        <input type="radio" class="form-control" id="validationCustom03" name="gender" value="Female" <?php if($data[1] == "Female") echo 'checked="checked"'; ?> required><label for="Female">Female</label>
                                                        <input type="radio" class="form-control" id="validationCustom03" name="gender" value="Other" <?php if($data[1] == "Other") echo 'checked="checked"'; ?> required><label for="Other">Other</label>


                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Cow Type</label>
                                                        <input type="text" class="form-control" id="validationCustom03" placeholder="Cow type" name="type" value="<?php print strip_tags($data[2]);?>" required>
                                                        <div class="invalid-feedback">Please provide a valid cow type.</div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Date of Birth</label>
                                                        <input type="date" class="form-control" id="validationCustom03" placeholder="dob" name="dob" value="<?php print strip_tags($data[3]);?>" required>
                                                        <div class="invalid-feedback">Please provide a valid Date of birth.</div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Date Acquired</label>
                                                        <input type="date" class="form-control" id="validationCustom03" placeholder="dacq" name="dtacq" value="<?php print strip_tags($data[4]);?>" required>
                                                        <div class="invalid-feedback">Please provide a valid Date acquired.</div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Cow Status</label>
                                                        <input type="text" class="form-control" id="validationCustom03" placeholder="status" name="status" value="<?php print strip_tags($data[5]);?>" required>
                                                        <div class="invalid-feedback">Please provide valid Cow Status .</div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Date Removed</label>
                                                        <input type="text" class="form-control" id="validationCustom03" placeholder="drmd" name="dtrmd" value="<?php print strip_tags($data[6]);?>" required>
                                                        <div class="invalid-feedback">Please provide a valid Date removed.</div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Cause</label>
                                                        <input type="text" class="form-control" id="validationCustom03" placeholder="cause" name="cause" value="<?php print strip_tags($data[7]);?>" required>
                                                        <div class="invalid-feedback">Please provide a valid cause.</div>
                                                    </div>
                                                </div>
                                            <button class="btn btn-primary" type="submit" name="update">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
                </div>


                <!-- Footer -->
                <?php include_once('includes/footer.php'); ?>
                <!-- /Footer -->

            </div>
            <!-- /Main Content -->

        </div>

        <script src="vendors/jquery/dist/jquery.min.js"></script>
        <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
        <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
        <script src="dist/js/jquery.slimscroll.js"></script>
        <script src="dist/js/dropdown-bootstrap-extended.js"></script>
        <script src="dist/js/feather.min.js"></script>
        <script src="vendors/jquery-toggles/toggles.min.js"></script>
        <script src="dist/js/toggle-data.js"></script>
        <script src="dist/js/init.js"></script>
        <script src="dist/js/validation-data.js"></script>

    </body>

    </html>
<?php } ?>
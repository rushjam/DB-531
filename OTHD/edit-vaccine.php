<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    // Add Category Code
    if(isset($_POST['update'])){
		
        $update = "UPDATE `tblvaccine` SET `CowNumber`='".$_POST['CowNumber']."',`VaccineDate`='".$_POST['VaccineDate']."',`Remarks`='".$_POST['Remarks']."' WHERE `id`='".$_REQUEST['id']."'";

		mysqli_query($con, $update);
		
		$msg="Sucessfully Updated a Vaccine Record !!";
				
		echo "<script type='text/JavaScript'>alert ('$msg');window.location.href='manage-vaccine.php';</script>";
	
		mysqli_close($con);
	}

    if($_REQUEST['id']){

		$datashow="SELECT * FROM `tblvaccine` WHERE id=".$_REQUEST['id'];

		$resrow=mysqli_query($con,$datashow);

		$data=mysqli_fetch_array($resrow);		

	}


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Edit Vaccine</title>
        <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
        <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
        <link href="dist/css/style.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.tailwindcss.com"></script>

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
                        <li class="breadcrumb-item"><a href="#">Vaccine</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <!-- /Breadcrumb -->

                <!-- Container -->
                <div class="container">
                    <!-- Title -->
                    <div class="hk-pg-header">
                        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Edit vaccine</h4>
                    </div>
                    <!-- /Title -->

                    <!-- Row -->
                    <div class="row">
                        <div class="col-xl-12">
                            <section class="hk-sec-wrapper rounded-xl">

                                <div class="row">
                                    <div class="col-sm">
                                        <form class="needs-validation" method="post" novalidate>
                                        <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Cow Number</label>
                                                        <input type="number" class="form-control" id="validationCustom03" value="<?php print $data['CowNumber']; ?>" name="CowNumber" required>
                                                        <div class="invalid-feedback">Please provide a cow number.</div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Date</label>
                                                        <input type="date" class="form-control" id="validationCustom03" value="<?php print $data['VaccineDate']; ?>" name="VaccineDate" required>
                                                        <div class="invalid-feedback">Please provide a valid date.</div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Remarks</label>
                                                        <input type="text" class="form-control" id="validationCustom03" value="<?php print $data['Remarks']; ?>" name="Remarks" required>
                                                        <div class="invalid-feedback">Please provide a valid number.</div>
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
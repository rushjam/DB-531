<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    // Add Category Code
    if (isset($_POST['submit'])) {
        //Getting Post Values
        $catname = $_POST['category']; //cowid
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $type = $_POST['type']; //breed
        $status = $_POST['status'];
        $dtacq = $_POST['dtacq'];  //date accquired
        $dtrmd = $_POST['dtrmd'];   //date removed
        $cause = $_POST['cause']; //casue of removal


        $query = mysqli_query($con, "insert into tblcow(CowNumber,Gender,Breed,DateofBirth,DateAcquired,Status,DateRemoved,Cause) values('$catname','$gender','$type','$dob','$dtacq','$status','$dtrmd','$cause')");
        if ($query) {
            echo "<script>alert('Cow Record added successfully.');</script>";
            echo "<script>window.location.href='add-cow.php'</script>";
        } else {
            echo "<script>alert('Cow Number already exist.');</script>";
            echo "<script>window.location.href='add-cow.php'</script>";
        }
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Add Cow Information</title>
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
                        <li class="breadcrumb-item"><a href="#">Cow</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Information</li>
                    </ol>
                </nav>
                <!-- /Breadcrumb -->

                <!-- Container -->
                <div class="container">
                    <!-- Title -->
                    <div class="hk-pg-header">
                        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>New Cow Information</h4>
                    </div>
                    <!-- /Title -->

                    <!-- Row -->
                    <div class="row">
                        <div class="col-xl-12">
                            <section class="hk-sec-wrapper">

                                <div class="row">
                                    <div class="col-sm">
                                        <form class="needs-validation" method="post" novalidate>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <label for="validationCustom03">Cow number</label>
                                                    <input type="text" class="form-control input-custom " id="validationCustom03" placeholder="Enter the cow's number" name="category" required>
                                                    <div class="invalid-feedback">Cow Number</div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-10 ">
                                                    <label for="validationCustom03">Gender</label>
                                                    <div class="overflow-hidden box-border m-0 flex mbc">
                                                        <div class="flex items-center mr-12">
                                                            <input type="radio" class="form-control w-[22px] mr-4 accent-[#6e00ff]" id="validationCustom03" name="gender" value="Male" required>
                                                            <label for="Male mb-0">Male</label>
                                                        </div>
                                                        <div class="flex items-center  mr-12">

                                                            <input type="radio" class="form-control  w-[22px] mr-4 accent-[#6e00ff]" id="validationCustom03" name="gender" value="Female" required>
                                                            <label for="Female mb-0">Female</label>
                                                        </div>
                                                        <div class="flex items-center mr-12">

                                                            <input type="radio" class="form-control  w-[22px] mr-4 accent-[#6e00ff]" id="validationCustom03" name="gender" value="Other" required>
                                                            <label for="Other mb-0">Other</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <label for="validationCustom03">Cow Type</label>
                                                    <input type="text" class="form-control input-custom" id="validationCustom03" placeholder="Enter the Cow's type" name="type" required>
                                                    <div class="invalid-feedback">Please provide a valid cow type.</div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <label for="validationCustom03">Date of Birth</label>
                                                    <input type="date" class="form-control input-custom" id="validationCustom03" placeholder="Enter the Cow's DOB" name="dob" required>
                                                    <div class="invalid-feedback">Please provide a valid Date of birth.</div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <label for="validationCustom03">Date Acquired</label>
                                                    <input type="date" class="form-control input-custom" id="validationCustom03" placeholder=" Enter the Cow's dacq" name="dtacq" required>
                                                    <div class="invalid-feedback">Please provide a valid Date acquired.</div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <label for="validationCustom03">Cow Status</label>
                                                    <input type="text" class="form-control input-custom" id="validationCustom03" placeholder="Status" name="status" required>
                                                    <div class="invalid-feedback">Please provide valid Cow Status .</div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <label for="validationCustom03">Date Removed</label>
                                                    <input type="date" class="form-control input-custom" id="validationCustom03" placeholder="drmd" name="dtrmd" required>
                                                    <div class="invalid-feedback">Please provide a valid Date removed.</div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <label for="validationCustom03">Cause</label>
                                                    <input type="text" class="form-control input-custom" id="validationCustom03" placeholder="Enter the cause" name="cause" required>
                                                    <div class="invalid-feedback">Please provide a valid cause.</div>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
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
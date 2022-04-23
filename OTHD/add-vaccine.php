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
        $catname = $_POST['CowNumber'];
        $dob = $_POST['vaccinedate'];
        $type = $_POST['remark'];

        $query = mysqli_query($con, "insert into tblvaccine(CowNumber,VaccineDate,Remarks) values('$catname','$dob','$type')");
        if ($query) {
            echo "<script>alert('Info added successfully.');</script>";
            echo "<script>window.location.href='manage-vaccine.php'</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
            echo "<script>window.location.href='add-vaccine.php'</script>";
        }
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Add Vaccine Information</title>
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
                        <li class="breadcrumb-item active" aria-current="page">Information</li>
                    </ol>
                </nav>
                <!-- /Breadcrumb -->

                <!-- Container -->
                <div class="container">
                    <!-- Title -->
                    <div class="hk-pg-header">
                        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Vaccine Information</h4>
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
                                                    <label for="validationCustom03">Cow number</label>
                                                    <?php 
                                                        $query ="SELECT Cownumber FROM tblcow";
                                                        $result = $con->query($query);
                                                        if($result->num_rows> 0){
                                                            $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                        }
                                                    ?>
                                                    <select name="CowNumber" class="form-control">
                                                    <?php 
                                                        foreach ($options as $option) {
                                                    ?>
                                                        <option value="<?php echo $option['Cownumber']; ?>"><?php echo $option['Cownumber']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <div class="invalid-feedback">Cow Number</div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <label for="validationCustom03">Vaccine Date</label>
                                                    <input type="date" class="form-control" id="validationCustom03" placeholder="date" name="vaccinedate" required>
                                                    <div class="invalid-feedback">Please provide a valid vaccine date.</div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <label for="validationCustom03">Remarks</label>
                                                    <input type="text" class="form-control" id="validationCustom03" placeholder="remarks" name="remark" required>
                                                    <div class="invalid-feedback">Please provide a valid remark.</div>
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
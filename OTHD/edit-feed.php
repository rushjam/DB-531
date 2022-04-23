<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    // Add Category Code
    if (isset($_POST['update'])) {
        $cid = substr(base64_decode($_GET['pid']), 0, -5);
        //Getting Post Values
        $date = $_POST['date'];
        $catname = $_POST['cownumber'];
        $type = $_POST['remark'];
        $fooditem = $_POST['fooditem'];
        $quantity = $_POST['quantity'];
        $feedingtime = $_POST['feedingtime'];
        $query = mysqli_query($con, "update tblfeed set Date='$date',CowNumber='$catname',Remarks='$type',FoodItem='$fooditem',Quantity='$quantity',FeedingTime='$feedingtime' where id='$cid'");
        echo "<script>alert('Category updated successfully.');</script>";
        echo "<script>window.location.href='manage-feed.php'</script>";
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Edit Feed</title>
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
                        <li class="breadcrumb-item"><a href="#">Feed</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <!-- /Breadcrumb -->

                <!-- Container -->
                <div class="container">
                    <!-- Title -->
                    <div class="hk-pg-header">
                        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Edit Feed</h4>
                    </div>
                    <!-- /Title -->

                    <!-- Row -->
                    <div class="row">
                        <div class="col-xl-12">
                            <section class="hk-sec-wrapper">

                                <div class="row">
                                    <div class="col-sm">
                                        <form class="needs-validation" method="post" novalidate>
                                            <?php
                                            $cid = substr(base64_decode($_GET['pid']), 0, -5);
                                            $ret = mysqli_query($con, "select * from tblfeed where ID='$cid'");
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($ret)) {
                                            ?>


                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Date</label>
                                                        <input type="date" class="form-control" id="validationCustom03" value="<?php echo $row['Date']; ?>" name="date" required>
                                                        <div class="invalid-feedback">Please provide a valid date.</div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Cow Number</label>
                                                        <input type="number" class="form-control" id="validationCustom03" value="<?php echo $row['Cow Number']; ?>" name="cowidno" required>
                                                        <div class="invalid-feedback">Please provide a valid ID.</div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Remarks</label>
                                                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $row['Remarks']; ?>" name="remarks" required>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Food Item</label>
                                                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $row['Food Item']; ?>" name="fooditem" required>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Quantity</label>
                                                        <input type="number" class="form-control" id="validationCustom03" value="<?php echo $row['Quantity']; ?>" name="quantity" required>
                                                        <div class="invalid-feedback">Please provide a valid quantity value.</div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Feeding Time</label>
                                                        <input type="time" class="form-control" id="validationCustom03" value="<?php echo $row['Feeding Time']; ?>" name="feedingtime" required>
                                                    </div>
                                                </div>



                                            <?php } ?>
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
<?php error_reporting(E_ALL ^ E_NOTICE); ?>
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
        $invoice = $_POST['invoiceno'];
        $date = $_POST['date'];
        $cownumber = $_POST['cownumber'];
        $amount = $_POST['amount'];
        $name = $_POST['customername'];
        $contact = $_POST['customercontact'];
        $email = $_POST['customeremail'];
        $remarks = $_POST['remarks'];
        $query = mysqli_query($con, "update tblcwsale set InvoiceNo='$invoice',Date='$date',CowNumber='$cownumber',Amount='$amount',Name='$name',Contact='$contact',Email='$email',Remarks='$remarks' where id='$cid'");
        echo "<script>alert('Cow Sale updated successfully.');</script>";
        echo "<script>window.location.href='manage-cowsale.php'</script>";
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Edit Cow Sale</title>
        <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
        <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
        <link href="dist/css/style.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.tailwindcss.com"></script>

    </head>

    <body>


        <!-- HK Wrapper -->
        <div class="hk-wrapper hk-vertical-nav">

            <!-- Top Navbar -->
            <?php include_once('includes/navbar.php');
            include_once('includes/sidebar.php');
            ?>
            <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
            <!-- /Vertical Nav -->
            <!-- Main Content -->
            <div class="hk-pg-wrapper">
                <!-- Breadcrumb -->
                <nav class="hk-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-light bg-transparent">
                        <li class="breadcrumb-item"><a href="#">Cow Sale</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <!-- /Breadcrumb -->

                <!-- Container -->
                <div class="container">
                    <!-- Title -->
                    <div class="hk-pg-header">
                        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Edit Cow Sale</h4>
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
                                            $ret = mysqli_query($con, "select * from tblcwsale where ID='$cid'");
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($ret)) {
                                            ?>


                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Invoice No</label>
                                                        <input type="number" class="form-control" id="validationCustom03" value="<?php echo $row['Invoice No']; ?>" name="invoiceno" required>
                                                        <div class="invalid-feedback">Please provide a valid number.</div>
                                                    </div>
                                                </div>


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
                                                        <input type="number" class="form-control" id="validationCustom03" value="<?php echo $row['Cow Number']; ?>" name="cownumber" required>
                                                        <div class="invalid-feedback">Please provide a cow number.</div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Amount</label>
                                                        <input type="number" class="form-control" id="validationCustom03" value="<?php echo $row['Amount']; ?>" name="amount" required>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Customer Name</label>
                                                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $row['CustomerName']; ?>" name="customername" required>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Customer Contact</label>
                                                        <input type="number" class="form-control" id="validationCustom03" value="<?php echo $row['CustomerContact']; ?>" name="customercontact" required>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Customer Email</label>
                                                        <input type="email" class="form-control" id="validationCustom03" value="<?php echo $row['CustomerEmail']; ?>" name="customeremail" required>
                                                        <div class="invalid-feedback">Please provide a valid emailid.</div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Remarks</label>
                                                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $row['Remarks']; ?>" name="remarks" required>
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
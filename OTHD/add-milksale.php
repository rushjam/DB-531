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
        $cownumber = $_POST['CowNumber'];
        $date = $_POST['Date'];
        $pound = $_POST['Liter'];
        $priceperpound = $_POST['priceperpound'];

        $query = mysqli_query($con, "insert into tblmsale(CowNumber,Date,Liter,priceperpound) values('$cownumber','$date','$pound','$priceperpound')");
        if ($query){
            echo "<script>alert('Milk Sale Record added successfully.');</script>";
            echo "<script>window.location.href='manage-milksale.php'</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
            echo "<script>window.location.href='add-milksale.php'</script>";
        }
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Milk Sale</title>
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
                        <li class="breadcrumb-item"><a href="#">Milk Sale</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add</li>
                    </ol>
                </nav>
                <!-- /Breadcrumb -->

                <!-- Container -->
                <div class="container">
                    <!-- Title -->
                    <div class="hk-pg-header">
                        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="external-link"></i></span></span>Milk Sale</h4>
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
                                                    <label for="validationCustom03">Date</label>
                                                    <input type="date" class="form-control" id="validationCustom03" placeholder="Date" name="Date" required>
                                                    <div class="invalid-feedback">Please provide correct date of birth.</div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6 mb-10">
                                                    <label for="validationCustom03">Quantity</label>
                                                    <input type="text" class="form-control" id="validationCustom03" placeholder="Pound" name="Liter" required>
                                                    <div class="invalid-feedback">Please provide a valid number.</div>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-row">
                                                    <div class="col-md-6 mb-10">
                                                        <label for="validationCustom03">Price per pound</label>
                                                        <input type="text" class="form-control" id="validationCustom03" name="priceperpound" required>
                                                        <div class="invalid-feedback">Please provide a valid price.</div>
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
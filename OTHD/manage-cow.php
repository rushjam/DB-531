<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else {
    // Code for deletion   


    if (isset($_REQUEST['Cownumber'])) {

        $query1 = "DELETE FROM `tblcow` WHERE Cownumber=" . $_REQUEST['Cownumber'];

        mysqli_query($con, $query1);

        $msg = "Cow Record Successfully Deleted !!";

        echo "<script type='text/JavaScript'>alert ('$msg');window.location.href='manage-cow.php';</script>";

        mysqli_close($con);
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Manage Cow Information</title>
        <!-- Data Table CSS -->
        <link href="vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
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
                        <li class="breadcrumb-item active" aria-current="page">Manage</li>
                    </ol>
                </nav>
                <!-- /Breadcrumb -->

                <!-- Container -->
                <div class="container">

                    <!-- Title -->
                    <div class="hk-pg-header">
                        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Manage Cow Information</h4>
                        <a href="add-cow.php"><button class="btn btn-danger ">Add Cow Record</button></a>
                    </div>
                    <!-- /Title -->

                    <!-- Row -->
                    <div class="row" id="invoice">
                        <div class="col-xl-12">
                            <section class="hk-sec-wrapper rounded-xl">
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="table-wrap">
                                            <table id="example" class="table table-hover w-100 display pb-30">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Cow Number</th>
                                                        <th>Gender</th>
                                                        <th>Type</th>
                                                        <th>Date of Birth</th>
                                                        <th>Date Acquired </th>
                                                        <th>Status</th>
                                                        <th>Date Removed </th>
                                                        <th>Cause </th>
                                                        <th>Action </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $rno = mt_rand(10000, 99999);
                                                    $query = mysqli_query($con, "select * from tblcow");
                                                    $cnt = 1;
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $cnt; ?></td>
                                                            <td><?php echo $row['Cownumber']; ?></td>
                                                            <td><?php echo $row['Gender']; ?></td>
                                                            <td><?php echo $row['Breed']; ?></td>
                                                            <td><?php echo $row['DateofBirth']; ?></td>
                                                            <td><?php echo $row['DateAcquired']; ?></td>
                                                            <td><?php echo $row['Status']; ?></td>
                                                            <td><?php echo $row['DateRemoved']; ?></td>
                                                            <td><?php echo $row['Cause']; ?></td>
                                                            <td>
                                                                <a href="edit-cow.php?Cownumber=<?= strip_tags($row['Cownumber']) ?>" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i class="icon-pencil"></i></a>
                                                                <a href="manage-cow.php?Cownumber=<?= strip_tags($row['Cownumber']) ?>" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Do you really want to delete?');"> <i class="icon-trash txt-danger"></i> </a>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                        $cnt++;
                                                    } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
                    <!-- /Row -->

                </div>
                <!-- /Container -->

                <!-- Footer -->
                <?php include_once('includes/footer.php'); ?>
                <!-- /Footer -->
            </div>
            <!-- /Main Content -->
        </div>
        <!-- /HK Wrapper -->

        <script src="vendors/jquery/dist/jquery.min.js"></script>
        <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
        <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="dist/js/jquery.slimscroll.js"></script>
        <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
        <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="vendors/jszip/dist/jszip.min.js"></script>
        <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
        <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
        <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="dist/js/dataTables-data.js"></script>
        <script src="dist/js/feather.min.js"></script>
        <script src="dist/js/dropdown-bootstrap-extended.js"></script>
        <script src="vendors/jquery-toggles/toggles.min.js"></script>
        <script src="dist/js/toggle-data.js"></script>
        <script src="dist/js/init.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js" integrity="sha512-w3u9q/DeneCSwUDjhiMNibTRh/1i/gScBVp2imNVAMCt6cUHIw6xzhzcPFIaL3Q1EbI2l+nu17q2aLJJLo4ZYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });
        </script>
    </body>

    </html>
<?php } ?>
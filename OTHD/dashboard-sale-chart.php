<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid'] == 0)) {
    header('location:logout.php');
} else { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Dashboard</title>
        <link href="vendors/vectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" type="text/css" />
        <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
        <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
        <link href="vendors/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
        <link href="dist/css/style.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body>
        <!-- HK Wrapper -->
        <div class="hk-wrapper hk-vertical-nav ml-[300px]">

            <?php include_once('includes/navbar.php');
            include_once('includes/sidebar.php');
            ?>
            <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
            <!-- /Vertical Nav -->
            <!-- Main Content -->
            <div class="hk-pg-wrapper ml-0">
                <!-- Container -->
                <div class="container-fluid mt-xl-50 mt-sm-30 ">
                    <!-- Row -->
                    <div class="row">
                        <h1 class="text-[36px]">Total  Sale</h1>
                        <div class="col-xl-12 mt-20">
                            <div class="hk-row">
                                <div class="col-md-1">
                                </div>
                                    <div class="col-md-10">
                                        <div class="card card-sm">
                                            <div class="card-body">
                                                <canvas id="myChart"></canvas>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /Container -->

                            <!-- Footer -->
                            <?php include_once('includes/footer.php'); ?>
                            <!-- /Footer -->
                        </div>
                        <!-- /Main Content -->

                    </div>
                    <!-- /HK Wrapper -->

                    <!-- jQuery -->
                    <script src="vendors/jquery/dist/jquery.min.js"></script>
                    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
                    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                    <script src="dist/js/jquery.slimscroll.js"></script>
                    <script src="dist/js/dropdown-bootstrap-extended.js"></script>
                    <script src="dist/js/feather.min.js"></script>
                    <script src="vendors/jquery-toggles/toggles.min.js"></script>
                    <script src="dist/js/toggle-data.js"></script>
                    <script src="vendors/waypoints/lib/jquery.waypoints.min.js"></script>
                    <script src="vendors/jquery.counterup/jquery.counterup.min.js"></script>
                    <script src="vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
                    <script src="vendors/vectormap/jquery-jvectormap-2.0.3.min.js"></script>
                    <script src="vendors/vectormap/jquery-jvectormap-world-mill-en.js"></script>
                    <script src="dist/js/vectormap-data.js"></script>
                    <script src="vendors/owl.carousel/dist/owl.carousel.min.js"></script>
                    <script src="vendors/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
                    <script src="vendors/apexcharts/dist/apexcharts.min.js"></script>
                    <script src="dist/js/irregular-data-series.js"></script>
                    <script src="dist/js/init.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        const ctx = document.getElementById('myChart').getContext('2d');

                        $(document).ready(function() {
                            $.ajax({
                                url: "chart/data1.php",
                                method: "GET",
                                success: function(data) {
                                    console.log(data);
                                    var player = [];
                                    var score = [];

                                    for (var i in data) {
                                        player.push(data[i].Date);
                                        score.push(data[i].Liter);
                                    }

                                    const myChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: player,
                                            datasets: [{
                                                label: 'Total Sale',
                                                data: score,
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)'
                                                ],
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)'
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });

                                }
                            })
                        })
                    </script>

    </body>

    </html>
<?php } ?>
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['login'])) {
    $adminuser = $_POST['username'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        $_SESSION['aid'] = $ret['ID'];
        header('location:add-cow.php');
    } else {
        echo "<script>alert('Incorrect Username or Password. Please try again.');</script>";
        echo "<script>window.location.href='add-cow.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Login Page</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>


    <!-- HK Wrapper -->
    <div class="hk-wrapper ">

        <!-- Main Content -->
        <div class="hk-pg-wrapper hk-auth-wrapper bg-slate-800">
            <!-- <header class="d-flex justify-content-between align-items-center z-0">
                <a class="d-flex auth-brand align-items-center text-black" href="#">
                    <span class="font-black  text‑transparent 	border-solid heading-custom text-10xl">On The Hoof Dairy</span>
                </a>
            </header> -->
            <div class="container-fluid z-50">
                <div class="row">
                <div class="col-xl-7 pa-0">
                        <div class="auth-form-wrap py-xl-0 py-50">
                            <div class="auth-form w-xxl-55 w-xl-75 w-sm-90 w-xs-100">
                                <form method="post">
                                    <h1 class="font-40 font-black mb-20 text-[#6e00ff]">Login</h1>
                                    <p class="font-20 text-[#acacac] text-black">Welcome Back 😊</p>
                                    <p class="font-2 text-[#acacac] font-100 mb-50 text-black">We are here to help! Please enter your credential to continue.</p>

                                    <div class="form-group">
                                        <input class="form-control new-br border-solid h-14 font-bold" placeholder="Username" type="text" name="username" required="true">
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <input class="border-solid form-control new-br h-14 font-bold" placeholder="Password" type="password" name="password" required="true">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><span class="feather-icon"><i data-feather="eye-off"></i></span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn new-br btn-block bg-[#6e00ff] h-14 text-white font-bold" type="submit" name="login">Login</button>
                                    <p class="font-14 text-center mt-15 text-black font-black">Having trouble logging in?</p>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 pa-0">
                        <div id="owl_demo_1" class="owl-carousel dots-on-item owl-theme">
                            <div class="fadeOut item auth-cover-img overlay-wrap" style="background-image:url(dist/img/banner2.jpg);">
                                <div class="auth-cover-info py-xl-0 pt-100 pb-50">
                                    <div class="auth-cover-content text-center w-xxl-75 w-sm-90 w-xs-100">
                                    </div>
                                </div>
                                <div class="bg-overlay bg-trans-dark-50"></div>
                            </div>
                            <div class="fadeOut item auth-cover-img overlay-wrap" style="background-image:url(dist/img/banner1.jpg);">
                                <div class="auth-cover-info py-xl-0 pt-100 pb-50">
                                    <div class="auth-cover-content text-center w-xxl-75 w-sm-90 w-xs-100">
                                    </div>
                                </div>
                                <div class="bg-overlay bg-trans-dark-50"></div>
                            </div>
                            <div class="fadeOut item auth-cover-img overlay-wrap" style="background-image:url(dist/img/banner3.jpg);">
                                <div class="auth-cover-info py-xl-0 pt-100 pb-50">
                                    <div class="auth-cover-content text-center w-xxl-75 w-sm-90 w-xs-100">
                                    </div>
                                </div>
                                <div class="bg-overlay bg-trans-dark-50"></div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="dist/js/jquery.slimscroll.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- Owl JavaScript -->
    <script src="vendors/owl.carousel/dist/owl.carousel.min.js"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="dist/js/feather.min.js"></script>

    <!-- Init JavaScript -->
    <script src="dist/js/init.js"></script>
    <script src="dist/js/login-data.js"></script>
</body>

</html>
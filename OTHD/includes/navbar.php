<nav class="navbar navbar-expand-xl  fixed-top hk-navbar h-[90px] custom-nav left-[300px]">
    <ul class="navbar-nav hk-navbar-content navbar-tital">
        <li class="nav-item dropdown dropdown-authentication">
            <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media">
                    <div class="media-img-wrap">
                        <div class="avatar">
                            <img src="dist/img/user.png" alt="user" class="avatar-img rounded-circle">
                        </div>
                        <span class="badge badge-success badge-indicator"></span>
                    </div>
                    <?php
                    //Getting admin name
                    $adminid = $_SESSION['aid'];
                    $query = mysqli_query($con, "select AdminName from tbladmin where id='$adminid'");
                    $row = mysqli_fetch_array($query);
                    ?>
                    <div class="media-body">
                        <span><?php echo $row['AdminName']; ?><i class="zmdi zmdi-chevron-down"></i></span>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                <a class="dropdown-item" href="profile.php"><i class="dropdown-icon zmdi zmdi-account"></i><span>Profile</span></a>
                <a class="dropdown-item" href="change-password.php"><i class="dropdown-icon zmdi zmdi-settings"></i><span>Settings</span></a>
                <div class="dropdown-divider"></div>
                <div class="sub-dropdown-menu show-on-hover">
                    <a href="#" class="dropdown-toggle dropdown-item no-caret"><i class="zmdi zmdi-check text-success"></i>Online</a>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php"><i class="dropdown-icon zmdi zmdi-power"></i><span>Log out</span></a>
            </div>
        </li>
    </ul>
</nav>
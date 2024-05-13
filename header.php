<header>
    <!--? Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1">
                        <div class="logo">
                            <a href="index.php"><img class="logo" id="logo" src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="menu-main d-flex align-items-center justify-content-end">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="#">About</a></li>
                                        </li>
                                        <li><a href="#">Contact</a></li>
                                    
                                    <?php if($login) {

                                        echo "<a href=" . ($_SESSION['level'] == 0 ? "a/dashboard.php" : ($_SESSION['level'] == 1 ? "h/dashboard.php" : "p/dashboard.php")) . " class='d-lg-none d-md-none'>Dashboard</a>";
                                        echo "<a href='PHP/logout.php' class='d-lg-none d-md-none'>Logout</a>";

                                    } else {

                                    ?>
                                    <div class="d-lg-none"> <!-- Apply d-lg-none to this div -->
                                        <li><a href="login.php" class="mx-2">Sign In</a></li>
                                        <li><a href="signup.php" class="">Sign Up</a></li>
                                    </div>
                                    <?php } ?>
                                    </ul>
                                </nav>
                            </div>
                            <div class="header-right-btn f-right d-none d-lg-block d-lg-flex flex-lg-row ml-1">
                                <?php if($login) {

                                        echo "<li><a href=" . ($_SESSION['level'] == 0 ? "a/dashboard.php" : ($_SESSION['level'] == 1 ? "h/dashboard.php" : "p/dashboard.php")) . " class='btn header-btn mr-3'>Dashboard</a></li>";
                                        echo "<li><a href='PHP/logout.php' class='btn header-btn'>Logout</a></li>";
                                        
                                    } else {

                                    ?>
                                        <li><a href="login.php" class="btn header-btn mx-2">Sign In</a></li>
                                        <li><a href="signup.php" class="btn header-btn">Sign Up</a></li>
                            <?php } ?>
                            </div>
                        </div>
                    </div>   
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
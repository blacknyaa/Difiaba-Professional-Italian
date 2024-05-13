<header class="topbar bg-success">

<nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!-- Light Logo icon -->
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text">
                    <!-- dark Logo text -->
                    <!-- <img src="../assets/img/logo/logo.png" alt="homepage" class="dark-logo" /> -->
                    <!-- Light Logo text -->
                    <!-- <img src="../assets/img/logo/logo.png" style="width: 4rem;" class="light-logo" alt="homepage" /> -->
                </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                    class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse  bg-success" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto float-left">
                <!-- This is  -->
                <li class="nav-item"> <a
                        class="nav-link sidebartoggler d-none d-md-block waves-effect waves-dark"
                        href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                
                
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex justify-content-center align-items-center waves-effect waves-dark" href="" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <div class="d-flex flex-column">
                            <h6 class="text-light" style="padding-top: 10px; margin-left: 5px;" id="userfullname"><?php echo $_SESSION['firstname']." ".$_SESSION['lastname'] ?></h6>
                        </div>
                    </a>
                    <div class="dropdown-menu mailbox dropdown-menu-right scale-up">
                        <ul class="dropdown-user list-style-none">
                            <li class="user-list"><a class="px-3 py-2" href="../backend/logout.php" id="logout2"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </li>
                <li class="d-flex justify-content-center align-items-center" style="padding-top: 10px;">
                    
                </li>
            </ul>
        </div>
    </nav>
    
</header>
<!-- new request modal -->
<div id="primary-header-modal-pro" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="info-header-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-success">
                            <h4 class="modal-title text-white" id="info-header-modalLabel">
                                Profile
                            </h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                        
                            <form class="mt-4" onsubmit="return validateForm()" id="asd">
                                <div class="form-group d-flex justify-content-center align-items-center">
                                    <label for="fileInput">
                                        <img src="" alt="user" width="120" class="profile-pic rounded-circle" id="userdp3" />
                                    </label>
                                    <input type="file" id="fileInput" style="display: none;" accept="image/*" onchange="displayImage(this)">
                                    <input type="hidden" class="form-control" id="filename" name="filename" required>
                                </div>
                                    <input type="hidden" class="form-control" id="uid" name="uid" required>
                                <div class="form-group">
                                    <h6 class="mt-0">First Name:</h6>
                                    <input type="text" class="form-control" id="pfirstname" name="pfirstname" required>
                                </div>
                                <div class="form-group">
                                    <h6 class="mt-0">Last Name:</h6>
                                    <input type="text" class="form-control" id="plastname" name="plastname" required>
                                </div>
                                
                                <div class="form-group">
                                    <h6 class="mt-0">Email</h6>
                                    <input type="text" class="form-control" id="pemail" name="pemail" readonly>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" onclick="uploadImageAndUpdateUser()">Update</button>
                                    <button type="button" class="btn btn-light"
                                        data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                        
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.new request modal -->
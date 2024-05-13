
<?php

  require_once "../backend/session.php";


  if (!$login || $_SESSION['level'] != 'admin') {

    header('Location: login.php');
    exit();
  
  } else {
  
  
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <title>Beauty Salon - Clients</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" />
    <link href="../assets/dashboard/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../dist/js/pages/chartist/chartist-init.css" rel="stylesheet">
    <link href="../assets/dashboard/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="../assets/dashboard/assets/libs/c3/c3.min.css" rel="stylesheet">
    <!-- Vector CSS -->
    <link href="../assets/dashboard/assets/libs/jvectormap/jquery-jvectormap.css" rel="stylesheet" />
    <link href="../assets/dashboard/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <!-- Data Table -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php include('../components/topNavigation.php'); ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include('../components/sideNavigation.php'); ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 col-12 align-self-center">
                    <h3 class="text-themecolor mb-0">Administrator Dashboard</h3>
                    <ol class="breadcrumb mb-0 p-0 bg-transparent">
                        <li class="breadcrumb-item active">Clients</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- Row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body overflow-hidden">
                                <div class="d-flex justify-content-between mb-3"> 
                                    <h4 class="card-title mt-1">Clients</h4>
                                </div>
                                    <div class="table-responsive">
                                    <table id="file_export" class="table table-bordered display w-100">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th class="text-center">First Name</th>
                                                    <th class="text-center">Last Name</th>
                                                    <th class="text-center">Phone Number</th>
                                                    <th class="text-center">Email</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php include('../backend/fetch_user.php'); ?>
                                        <?php foreach ($records as $record): ?>
                                            <tr>
                                                <td class="text-center"><?php 
                                                    echo 
                                                        '<div class="d-flex align-items-center justify-content-center p-1">
                                                            <span class="">'
                                                                .$record['firstname'].
                                                            '</span>
                                                        </div>'?>
                                                </td>
                                                <td class="text-center"><?php 
                                                    echo 
                                                        '<div class="d-flex align-items-center justify-content-center p-1">
                                                            <span class="">'
                                                                .$record['lastname'].
                                                            '</span>
                                                        </div>'?>
                                                </td>
                                                <td class="text-center"><?php 
                                                    echo 
                                                        '<div class="d-flex align-items-center justify-content-center p-1">
                                                            <span class="">'
                                                                .$record['phone'].
                                                            '</span>
                                                        </div>'?>
                                                </td>
                                                <td class="text-center"><?php 
                                                    echo 
                                                        '<div class="d-flex align-items-center justify-content-center p-1">
                                                            <span class="">'
                                                                .$record['email'].
                                                            '</span>
                                                        </div>'?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2024 Beauty Salon Administrator
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/dashboard/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/dashboard/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/dashboard/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="../dist/js/app.min.js"></script>
    <script src="../dist/js/app.init.js"></script>
    <script src="../dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/dashboard/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/dashboard/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- chartist chart -->
    <script src="../assets/dashboard/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/dashboard/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../assets/dashboard/assets/libs/d3/dist/d3.min.js"></script>
    <script src="../assets/dashboard/assets/libs/c3/c3.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/dashboard/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/dashboard/assets/extra-libs/sparkline/sparkline.js"></script>
    <!-- Vector map JavaScript -->
    <script src="../assets/dashboard/assets/libs/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../assets/dashboard/assets/extra-libs/jvector/jquery-jvectormap-us-aea-en.js"></script>
    <!-- Chart JS -->
    <script src="../dist/js/pages/dashboards/dashboard2.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
    <script src="../assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="../assets/extra-libs/sweetalert2/sweet-alert.init.js"></script>
    <!-- DataTables -->
    <script src="../assets/dashboard/assets/libs/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../dist/js/pages/datatable/custom-datatable.js"></script>
    <script src="../dist/js/pages/datatable/datatable-advanced.init.js"></script>

</body>

</html>

<?php 

}

?>